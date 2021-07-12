<?php

namespace App\Http\Controllers\Admin;

use App\HomePageContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function index(){
        $home=HomePageContent::first();
        return view('admin.homepage.edit',compact('home'));
    }


    public function update(Request $request,$id){
        request()->validate([
            'top_section_content' => 'required',
            'slider_title' => 'required',
            'slider_description' => 'required',
        ]);        

        try {
            
            $home=HomePageContent::find($id);
            $home->top_section_content = $request->top_section_content;
            $home->slider_title = $request->slider_title;
            $home->slider_description = $request->slider_description;

            if($home->save()) {
                $request->session()->flash("Success","Updated successfully");
                return redirect()->route('admin.homepage.index');
            }
            else {
                session()->flash("Error","There was an error in updating");
                return redirect()->back();
            }
        }
        catch(\Exception $ex) {
            session()->flash("Error",$ex->getMessage());
            return redirect()->back();

        }
    }
}
