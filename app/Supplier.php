<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    
    protected $fillable = [
        'supplier_code',
        'supplier_businessName',
        'supplier_email',
        'supplier_phone',
        'supplier_address',
        'supplier_address_location',
        'supplier_address_province',
        'supplier_address_postalCode',
        'supplier_web',
    
        'supplier_cuit',
        'supplier_ivaType',
        'supplier_ivaExclusion',
        'supplier_ibRegiment',
        'supplier_ibNumber',
        'supplier_ibProvince',
            
        
        'supplier_delivery_Address',
        'supplier_delivery_AddressLocation',
        'supplier_delivery_AddressProvince',
        'supplier_delivery_AddressPostalCode',

        'supplier_discount',
        'supplier_extra_discount',

    ];


    public function products () {
        return $this->belongsToMany('App\Product')->withTimestamps();
    }
}
