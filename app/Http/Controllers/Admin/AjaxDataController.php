<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Contact;
use \App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;

class AjaxDataController extends Controller
{
    
    public function GetProductsSubCategories(Request $request) 
    {
        $select = $request->select;
        $value = $request->value;
        $dependent =$request->dependent;

        $data = DB::table('pdt_sub_categories')
                ->where($select,$value)
                ->get();

        echo json_encode($data);
    }

    public function GetServicesSubCategories(Request $request) 
    {
        $select = $request->select;
        $value = $request->value;
        $dependent =$request->dependent;

        $data = DB::table('ser_sub_categories')
                ->where($select,$value)
                ->get();

        echo json_encode($data);
    }   
    
    public function SaveContact(Request $request)
    {
        
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->remarks = '';
        $cookie_data = stripslashes(Cookie::get('spaworldCartCookie'));
        $cartData = json_decode($cookie_data, true);
 
        if($contact->save()) {
            $message = "<p>Name: " . $contact->name ."</p>";
            $message .= "<p>Email: " . $contact->email ."</p>";
            $message .= "<p>Phone: " . $contact->phone ."</p>";
            $message .= "<p>Message: " . $contact->message ."</p>";
            if(is_array($cartData) && count($cartData)>0){ 
                $message .= '<h4>Items<h4><ul>';
                foreach($cartData as $item){
                    $message .= '<li>'.$item['item_name'].'</li>';
                }
                $message .= '</ul>';
            }
            try {
                $details =[
                    'from' => 'admin@spaworlduae.com',
                    'subject' => 'Website Contact',
                    'template' => 'Emails.template1',
                    'title' => 'Website Contact',
                    'body' =>  $message
                ];
                if($request->has('friendEmail') && $request->friendEmail!=null){ 
                    Mail::to($request->friendEmail)->send(new SendMail($details));
                }
                Mail::to(config('app.mail_to'))->send(new SendMail($details));
                if($request->has('friendEmail')){
                    Cookie::queue(Cookie::forget('spaworldCartCookie'));
                }
                session()->flash('Success', 'Contact Sent successfully');
                return redirect()->back();
            }
            catch (Exception $ex) {
                session()->flash('Error', $ex->getMessage());
                return redirect()->back();
            }  
        }

    }

}
