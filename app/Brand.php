<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pattern;
use App\Product;

class Brand extends Model
{
    protected $table = 'brands';
    
    protected $fillable = [
        'brand_name', 
    ];
    
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function patterns()
    {
        return $this->hasMany(Pattern::class);
    }
}
