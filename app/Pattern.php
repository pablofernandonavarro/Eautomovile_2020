<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;

class Pattern extends Model
{
    protected $table = 'patterns';
    
    protected $fillable = [
        'pattern_name', 
        'brand_id',
    ];

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
