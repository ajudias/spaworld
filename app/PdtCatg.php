<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PdtCatg extends Model
{
    use Notifiable;

    protected $table = 'pdt_categories';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catg_name', 'url_slug', 'disp_order','image','short_description','long_description'
    ];

    public function product() 
    {
        return $this->hasMany('App\Product','catg_id','id');
    }

    public function sub_category() 
    {
        return $this->hasMany('App\PdtSubCatg','catg_id','id');
    }
}
