<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    protected $table = 'colours';
    
    protected $fillable = [
        'colour_name', 
    ];

}
