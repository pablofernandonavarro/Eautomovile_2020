<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    protected $table = 'products';
    
    protected $fillable = [
        'sku',
        'slug',
        'description_short',
        'description_large',
        'data_interest',
        'spec',
        'brand_id',
        'pattern_id',
        'category_id',
        'colour_id',
        'date_start',
        'date_finish',
        'quantity',
        'price',
        'discount_rate',
        'active',
        'visit',
        'count_sale',
        'slider',
     
    ];
    
    public function pictures()
    {
        return $this->morphMany('App\Picture', 'pictureable');
    }

    // public function colors(){
    //     return $this->belongsToMany('App\Color', 'color_product','color_id','product_id')->withTimestamps();
    // }

    public function colors () {
        return $this->belongsToMany('App\Color')->withTimestamps();
    }
}
