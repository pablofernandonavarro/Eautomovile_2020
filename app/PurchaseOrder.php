<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PurchaseOrderDetail;

class PurchaseOrder extends Model
{
    protected $table = 'purchase_orders';
    
    protected $fillable = [
        'status',
        'product_id',
        'color_id',
        'picture_url',
        'quantity',
        'user_id',
        'guide_number',
        'status',
        'total'
    ];
    public function products()
    {
        return $this->belongsToMany('App\Product')->withTimestamps();
    }
    public function colors()
    {
        return $this->belongsToMany('App\Color')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function purchaseOrderDetails()
    {
        return $this->hasMany('App\PurchaseOrderDetail');
    }
}