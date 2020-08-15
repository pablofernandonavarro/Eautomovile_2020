<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pattern;

class Brand extends Model
{
    protected $table = 'brands';
    
    protected $fillable = [
        'brand_name', 
    ];
    
    public function products()
    {
        return $this->hasMany('App\product');
    }

    public function pattern()
    {
        return $this->belongsTo("App\Pattern");
    }
}
