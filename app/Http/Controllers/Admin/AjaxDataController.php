<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use \App\Mail\SendMail;
use DB;
use App\Contact;
use Exception;

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

        if($contact->save()) {
            $message = "<p>Name: " . $contact->name ."</p>";
            $message .= "<p>Email: " . $contact->email ."</p>";
            $message .= "<p>Phone: " . $contact->phone ."</p>";
            $message .= "<p>Message: " . $contact->message ."</p>";

            try {
                $details =[
                    'from' => 'reontel@gmail.com',
                    'subject' => 'Website Contact',
                    'template' => 'Emails.template1',
                    'title' => 'Website Contact',
                    'body' =>  $message
                ];
    
                Mail::to('reontel@gmail.com')->send(new SendMail($details));
    
                return "Success";
            }
            catch (Exception $ex) {
                return "Failed";
            }  
        }

    }

}
