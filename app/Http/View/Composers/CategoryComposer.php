<?php
namespace App\Http\View\Composers;

use App\PdtCatg;
use APP\PdtSubCatg;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view){
        // $view->with('categories',PdtSubCatg::with('sub_category')->where('status', '=', 1)->orderBy('disp_order')->get());
         $view->with('categoriess',PdtCatg::all());
    }

}