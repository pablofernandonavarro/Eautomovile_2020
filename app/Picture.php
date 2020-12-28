<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'url_picture',
       
    ];
    
    public function pictureable()
    {
        return $this->morphTo();
    }
}
