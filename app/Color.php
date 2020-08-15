<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Color extends Model
{
    protected $table = 'colors';
    
    protected $fillable = [
        'color_name', 
    ];
    
    public function colors(){
        return $this->hasMany('App\Color');
    }

}
