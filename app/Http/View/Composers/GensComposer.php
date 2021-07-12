<?php
namespace App\Http\View\Composers;

use App\Gen;
use Illuminate\View\View;

class GensComposer
{
    public function compose(View $view){
         $view->with('gens',Gen::find(1));
    }

}