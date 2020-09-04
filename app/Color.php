<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use phpDocumentor\Reflection\Types\This;


class Color extends Model
{
    protected $table = 'colors';
    
    protected $fillable = [
        'color_name', 'slug',
    ];
    
  
    public function products(){
        return $this->belongsToMany(Color::class);
    }

}
