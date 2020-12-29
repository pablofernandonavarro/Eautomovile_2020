<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Picture;
use PhpParser\Node\Stmt\Return_;

class Product extends Model
{
    use Sluggable;
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'description_short'
            ]
        ];
    }
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
        'supplier_id',
        'date_start',
        'date_finish',
        'quantity',
        'price',
        'active',
        'visit',
        'count_sale',
        'slider',
        'supplier_price_list',
        'supplier_discount',
        'cost',
        'utility',
        'price_discount',
     
    ];
    
    public function pictures()
    {
        return $this->morphMany('App\Picture', 'pictureable');
    }

    public function colors () {
        return $this->belongsToMany('App\Color')->withTimestamps();
    }

    public function pattern(){
        return $this->belongsTo('App\Pattern');
    }
    public function brand(){
        return $this->belongsTo('App\Brand');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

     public function suppliers() {
        return $this->belongsToMany('App\Supplier')->withTimestamps();
    }

//  ------------------ scopes -------------------------------
    
    public function scopeCategory($query,$category_id){
        dd($category_id);
        if ($category_id)
     return $query->where('category_id', 'LIKE' , "%$category_id%");
    
 }



//  ------------------ /scopes ------------------------------

}
