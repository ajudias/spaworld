<?php

namespace App\Http\Controllers;

use App\Gen;
use App\Blog;
use Exception;
use App\Contact;
use App\Gallery;
use App\PdtCatg;
use App\Product;
use App\PdtSubCatg;
use \App\Mail\SendMail;
use App\HomePageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;

class WebsiteController extends Controller
{
    private $GeneralSettings;
    private $ProductCategories;

    public function __construct()
    {
        $gens = Gen::find(1);
        $this->GeneralSettings = $gens;
        $pdtcatg = PdtCatg::orderBy('disp_order')->get();
        $this->ProductCategories = $pdtcatg;
    }

    public function home()
    {
        $pdtsubcatg = PdtSubCatg::orderBy('disp_order')->get();
        $products = Product::orderBy('disp_order')->take(4)->get();
        $home=HomePageContent::first();

        return view('website.home')->with([
            "gens" => $this->GeneralSettings,
            "pdtcatg" => $this->ProductCategories,
            "pdtsubcatg" => $pdtsubcatg,
            "products" => $products,
            'home' =>$home
        ]);
    }

    public function about()
    {
        return view('website.about')->with([
            "gens" => $this->GeneralSettings,
            "pdtcatg" => $this->ProductCategories,
        ]);
    }

    public function blogs()
    {
        $allblogs = Blog::with('categories')->latest()->get();
        return view('website.blogs')->with([
            "gens" => $this->GeneralSettings,
            "pdtcatg" => $this->ProductCategories,
            "allblogs" => $allblogs
        ]);
    }

    public function gallery()
    {
        $gallerys = Gallery::with('categories')->latest()->get();
        return view('website.gallery')->with([
            "gens" => $this->GeneralSettings,
            "categories" => $this->ProductCategories
        ]);
    }

    public function contactus()
    {
        return view('website.contact')->with([
            "gens" => $this->GeneralSettings,
            "pdtcatg" => $this->ProductCategories,
        ]);
    }

    public function thankyou()
    {
        return view('Emails.thanks')->with([
            "gens" => $this->GeneralSettings,
            "pdtcatg" => $this->ProductCategories,
        ]);
    }

    public function savecontact(Request $request)
    {
        try {

            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->message = $request->message;
            $contact->remarks = '';

            if ($contact->save()) {
                $message  = "<p>Name: " . $contact->name . "</p>";
                $message .= "<p>Email: " . $contact->email . "</p>";
                $message .= "<p>Phone: " . $contact->phone . "</p>";
                $message .= "<p>Message: " . $contact->message . "</p>";

                try {
                    $details = [
                        'from' => 'spa@ringmydoor.com',
                        'from_name' => 'S P A World',
                        'subject' => 'S P A World - New Contact Request',
                        'template' => 'Emails.template1',
                        'title' => 'Website Contact',
                        'body' =>  $message
                    ];

                    // Mail::to('enquiry@spaworlduae.com')->bcc("jayant.jose@reontel.com")->send(new SendMail($details));
                    Mail::to('sales@spaworlduae.com')->send(new SendMail($details));

                    return redirect()->route('thankyou')->with([
                        "gens" => $this->GeneralSettings,
                        "pdtcatg" => $this->ProductCategories,
                    ]);
                } catch (Exception $ex) {
                    $request->session()->flash("Error", "There was an error in sending the email");

                    return redirect()->route('home')->with([
                        "gens" => $this->GeneralSettings,
                        "pdtcatg" => $this->ProductCategories,
                    ]);
                }
            } else {
                $request->session()->flash("Error", "There was an error in sending the email");

                return redirect()->route('home')->with([
                    "gens" => $this->GeneralSettings,
                    "pdtcatg" => $this->ProductCategories,
                ]);
            }
        } catch (Exception $ex) {
            $request->session()->flash("Error", $ex->getMessage());
        }

        return redirect()->route('home')->with([
            "gens" => $this->GeneralSettings,
            "pdtcatg" => $this->ProductCategories,
        ]);
    }

    public function showblog(Request $request, $slug)
    {
        $blog = Blog::where('url_slug', $slug)->first();
        return view('website.single-blog')->with([
            "gens" => $this->GeneralSettings,
            "pdtcatg" => $this->ProductCategories,
            "thisblog" => $blog,
        ]);
    }

    public function showproductcatg(Request $request, $slug)
    {

        $pdtsubcatg = PdtSubCatg::where('url_slug', $slug)->first();
        $category = PdtCatg::where('url_slug', $slug)->first();
        $products = Product::with('categories');
        if($pdtsubcatg){
            $products=$products->where('sub_catg_id', $pdtsubcatg->id);
        }
        if($category){
            $products=$products->orWhere('catg_id',$category->id);
        }
       $products=$products->get();

        return view('website.product-list')->with([
            "gens" => $this->GeneralSettings,
            "subcatg" => $pdtsubcatg,
            "products" => $products,
            "catg" => $category
        ]);
    }

    public function productDetails(Product $product)
    {
        try {
            return view('website.product', compact('product'));
        } catch (\Exception $th) {
            dd($th->getMessage());
        }
    }
    public function cart()
    {
        $cookie_data = stripslashes(Cookie::get('spaworldCartCookie'));
        $cart_data = json_decode($cookie_data, true);
        $products=Product::all();
        return view('website.cart',compact('cart_data','products'));
    }

    
    public function addToCart(Request $request)
    {
        try {
            $prod_id = $request->input('product_id');
            $quantity = $request->input('quantity');
    
            if(Cookie::get('spaworldCartCookie'))
            {
                $cookie_data = stripslashes(Cookie::get('spaworldCartCookie'));
                $cart_data = json_decode($cookie_data, true);
            }
            else
            {
                $cart_data = array();
            }
            $item_id_list = array_column($cart_data, 'item_id');
            $prod_id_is_there = $prod_id;
    
            if(in_array($prod_id_is_there, $item_id_list))
            {
                foreach($cart_data as $keys => $values)
                {
                    if($cart_data[$keys]["item_id"] == $prod_id)
                    {
                        $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                        $item_data = json_encode($cart_data);
                        $minutes = 600;
                        Cookie::queue(Cookie::make('spaworldCartCookie', $item_data, $minutes));
                        return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already in Cart','status_code'=>404]);
                    }
                }
            }
            else
            {
                $products = Product::find($prod_id);
                $prod_name = $products->product_name;
                if($products)
                {
                    $item_array = array(
                        'item_id' => $prod_id,
                        'item_name' => $prod_name,
                        'item_quantity' => $quantity,
                    );
                    $cart_data[] = $item_array;
    
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('spaworldCartCookie', $item_data, $minutes));
                    return response()->json(['status'=>'"'.$prod_name.'" Added to Cart','status_code'=>200]);
                }
            }
        } catch (\Exception $th) {
            return $th->getMessage();
        }
        
    }

    public function cartCount()
    {
        if(Cookie::get('spaworldCartCookie'))
        {
            $cookie_data = stripslashes(Cookie::get('spaworldCartCookie'));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = count($cart_data);

            return response()->json(['count' => $totalcart]); 
        }
        else
        {
            $totalcart = "0";
            return response()->json(['count' => $totalcart]);
        }
    }

    public function removeFromCart(Request $request)
    {
        $prod_id = $request->input('product_id');

        $cookie_data = stripslashes(Cookie::get('spaworldCartCookie'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $prod_id)
                {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('spaworldCartCookie', $item_data, $minutes));
                    return response()->json(['status'=>'Item Removed from Cart']);
                }
            }
        }
    }

}
