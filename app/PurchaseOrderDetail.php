<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PurchaseOrder;

class PurchaseOrderDetail extends Model
{
    protected $table = 'detail_purchase';
    
    protected $fillable = [
        'purchase_orders_id',
        'color',
        'quantity',
        'price_unit',
        
    ];
    public function purchaseOrders(){
        return $this->belongsToMany('App\PurchaseOrder');
    }
}
