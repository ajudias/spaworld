<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use \App\Mail\SendMail;
use Exception;
use App\Gen;
use App\Blog;
use App\Gallery;
use App\PdtCatg;
use App\PdtSubCatg;
use App\Product;
use App\Contact;

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

    public function home() {
        $pdtsubcatg = PdtSubCatg::orderBy('disp_order')->get();
        $products = Product::orderBy('disp_order')->take(4)->get();

        return view('website.home')->with([
            "gens" => $this->GeneralSettings,
            "pdtcatg" => $this->ProductCategories,
            "pdtsubcatg" => $pdtsubcatg,
            "products" => $products
        ]);
    }

    public function about() {
        return view('website.about')->with([
            "gens" => $this->GeneralSettings,
            "pdtcatg" => $this->ProductCategories,
        ]);
    }

    public function blogs() {
        $allblogs = Blog::with('categories')->latest()->get();
        return view('website.blogs')->with([
            "gens" => $this->GeneralSettings,
            "pdtcatg" => $this->ProductCategories,
            "allblogs" => $allblogs
        ]);
    }    

    public function gallery() {
        $gallerys = Gallery::with('categories')->latest()->get();
        return view('website.gallery')->with([
            "gens" => $this->GeneralSettings,
            "pdtcatg" => $this->ProductCategories,
            "gallerys" => $gallerys
        ]);
    }   
     
    public function contactus() {
        return view('website.contact-us')->with([
            "gens" => $this->GeneralSettings,
            "pdtcatg" => $this->ProductCategories,
        ]);
    }    
    
    public function thankyou() {
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

            if($contact->save()) {
                $message  = "<p>Name: " . $contact->name ."</p>";
                $message .= "<p>Email: " . $contact->email ."</p>";
                $message .= "<p>Phone: " . $contact->phone ."</p>";
                $message .= "<p>Message: " . $contact->message ."</p>";

                try {
                    $details =[
                        'from' => 'spa@ringmydoor.com',
                        'from_name' => 'S P A World',
                        'subject' => 'S P A World - New Contact Request',
                        'template' => 'Emails.template1',
                        'title' => 'Website Contact',
                        'body' =>  $message
                    ];
        
                    Mail::to('enquiry@spaworlduae.com')->bcc("jayant.jose@reontel.com")->send(new SendMail($details));
        
                    return redirect()->route('thankyou')->with([
                        "gens" => $this->GeneralSettings,
                        "pdtcatg" => $this->ProductCategories,
                    ]);
                }
                catch (Exception $ex) {
                    $request->session()->flash("Error","There was an error in sending the email");

                    return redirect()->route('home')->with([
                        "gens" => $this->GeneralSettings,
                        "pdtcatg" => $this->ProductCategories,
                    ]);
                }                

            }
            else {
                $request->session()->flash("Error","There was an error in sending the email");

                return redirect()->route('home')->with([
                    "gens" => $this->GeneralSettings,
                    "pdtcatg" => $this->ProductCategories,
                ]);
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

        return redirect()->route('home')->with([
            "gens" => $this->GeneralSettings,
            "pdtcatg" => $this->ProductCategories,
        ]);

    }    

    public function showblog(Request $request, $slug)
    {
        $blog = Blog::where('url_slug',$slug)->first();
        return view('website.single-blog')->with([
            "gens" => $this->GeneralSettings,
            "pdtcatg" => $this->ProductCategories,
            "thisblog" => $blog,
        ]);
    }

    // public function showproductcatg(Request $request, $slug)
    // {
    //     $pdtcatg = PdtCatg::where('url_slug',$slug)->first();
    //     $products = Product::with('categories')->where('catg_id',$pdtcatg->id)->get();

    //     return view('website.product-list')->with([
    //         "gens" => $this->GeneralSettings,
    //         "pdtcatg" => $this->ProductCategories,
    //         "products" => $products,
    //         "catg" => $pdtcatg
    //     ]);
    // }
    public function showproductcatg(Request $request, $slug)
    {
       
        $pdtsubcatg = PdtSubCatg::where('url_slug',$slug)->first();
        $products = Product::with('categories')->where('sub_catg_id',$pdtsubcatg->id)->get();
     
        return view('website.product-list')->with([
            "gens" => $this->GeneralSettings,
            "pdtcatg" => $this->ProductCategories,
            "products" => $products,
            "catg" => $pdtsubcatg
        ]);
    }

}
