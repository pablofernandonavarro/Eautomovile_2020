<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\category;
use Illuminate\Support\Facades\Auth;

class productcontroller extends Controller
{
    public function store(Request $request){

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
         dd($request);
         Product::create($data);
         return ;

    }
    public function create(){
        $user = Auth::user(); 
        $categories = Category::all();
        return view('admin.products.create',compact('categories','user'));
    }
    public function index(){
        return view('admin.product');
    }
}
