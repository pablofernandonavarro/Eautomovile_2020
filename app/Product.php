<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Sluggable;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Picture;
use PhpParser\Node\Stmt\Return_;
use carbon\Carbon;
use DateTime;

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

    public function colors()
    {
        return $this->belongsToMany('App\Color')->withTimestamps();
    }

    public function pattern()
    {
        return $this->belongsTo('App\Pattern');
    }
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function suppliers()
    {
        return $this->belongsToMany('App\Supplier')->withTimestamps();
    }


    public function purchaseOrders()
    {
        return $this->belongsToMany('App\PurchaseOrder')->withTimestamps();
    }



    //   ------------------ scopes -------------------------------

    public function scopeCategorysearch($query, $category_id)
    {
        if ($category_id);

        return $query->where('category_id', 'LIKE', $category_id);
    }
    public function scopePatternsearch($query, $pattern_id)
    {
        if ($pattern_id);

        return $query->where('pattern_id', 'LIKE', $pattern_id);
    }

      public function scopeStartDate($query, $year)
      {
          if ($year) {

            //    dd($year,$query->product);
              return $query->whereDate('date_start', '<', $year);
          }
      }
      public function scopeFinishDate($query, $year){

          if ($year)

          Date('Y-m-d');
          $year = date($year);

              return $query->whereDate('date_finish', '>', $year);





      }


}






//   ------------------ scopes ------------------------------


