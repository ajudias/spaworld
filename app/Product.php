<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catg_id','sub_catg_id','product_code','product_name','keywords','description', 'url_slug', 'disp_order','thump_image','image1','image2','image3','image4','image5',
    ];

    public function categories()
    {
        return $this->belongsTo('App\PdtCatg','catg_id','id');
    }

    public function sub_categories()
    {
        return $this->belongsTo('App\PdtSubCatg','sub_catg_id','id');
    }

}
