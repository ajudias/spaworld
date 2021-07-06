<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use \App\Mail\SendMail;
use App\Gen;
use App\PdtCatg;
use Exception;

class MailSend extends Controller
{
    private $GeneralSettings;

    public function __construct()
    {
        $gens = Gen::find(1);
        $this->GeneralSettings = $gens;
        $pdtcatg = PdtCatg::orderBy('disp_order')->get();
        $this->ProductCategories = $pdtcatg;        
    }    

    public function mailsend() 
    {
        try {

            $details =[
                'from' => 'spaworlduae@gmail.com',
                'subject' => 'Message from Website',
                'template' => 'Emails.template1',
                'title' => 'S P A World',
                'body' => 'This is a test email from Reon Website'
            ];

            Mail::to('spaworlduae@gmail.com')->send(new SendMail($details));

            return view('Emails.thanks')->with([
                "gens" => $this->GeneralSettings,
                "pdtcatg" => $this->ProductCategories,
            ]);
        }
        catch (Exception $ex) {
            return view('Emails.failed')->with([
                "gens" => $this->GeneralSettings,
                "pdtcatg" => $this->ProductCategories,
            ]);
        }

    }
}
