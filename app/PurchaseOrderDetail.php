<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PurchaseOrder;

class PurchaseOrderDetail extends Model
{
    protected $table = 'purchase_order_details';
    
    protected $fillable = [
        'purchase_orders_id',
        'product_id',
        'color',
        'quantity',
        'price_unit',
        
    ];
    public function purchaseOrder(){
        return $this->belongsTo('App\PurchaseOrder');
    }
    public function user() {
        return $this->belongsToMany('App\User');
    }
   
}
