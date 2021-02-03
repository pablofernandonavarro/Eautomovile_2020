<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $table = 'purchase_orders';
    
    protected $fillable = [
        'status', 
        'product_id',
        'quantity',
        'user_id',
        'guide_number',
        'status',
        'total'
    ];
    public function products () {
        return $this->belongsToMany('App\Product')->withTimestamps();
    }

}
