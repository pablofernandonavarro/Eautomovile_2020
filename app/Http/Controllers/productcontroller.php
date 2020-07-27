<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class productcontroller extends Controller
{
    public function store(){

        $data = request()->validate([
            'sku'                  =>'',
            'slug'                 =>'',
            'description_short'    =>'',
            'description_large'    =>'',
            'data_interest'        =>'',
            'spec'                 =>'',
            'brand_id'             =>'',
            'pattern_id'           =>'',
            'category_id'          =>'',
            'colour_id'            =>'',
            'date_start'           =>'',
            'date_finish'          =>'',
            'quantity'             =>'',
            'price'                =>'',
            'discount_rate'        =>'',
            'active'               =>'',
            'visit'                =>'',
            'count_sale'           =>'',
            'slider'               =>'',
         ]);
         Product::create($data);

    }
}
