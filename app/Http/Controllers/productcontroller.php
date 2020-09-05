<?php

namespace App\Http\Controllers;


use App\Product;
use App\category;
use App\Brand;
use App\Color;
use App\Http\Requests\ProductRequest;
use App\Pattern;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Productcontroller extends Controller
{  public function show($id){

    $user = Auth::user(); 
    $categories = Category::all();
    $brands = Brand::all();
    $patterns = Pattern::all();
    $color = Color::find($id);
    $product= Product::find($id);
    

    return view('admin.products.show',compact('product','categories','user','brands','patterns','color'));
}
   

    public function store(ProductRequest $request){
        $colors_id = $request->input('color_id');
        // dd($colors_id);
       
         $product = new Product();

         $product->sku               = $request->input('sku'); 
         $product->slug              = $request->input('slug');
         $product->description_short = $request->input('description_short'); 
         $product->description_large = $request->input('description_large'); 
         $product->data_interest     = $request->input('data_interest'); 
         $product->spec              = $request->input('spec'); 
         $product->brand_id          = $request->input('brand_id'); 
         $product->pattern_id        = $request->input('pattern_id'); 
         $product->category_id       = $request->input('category_id');
         $product->color_id          = $request->input('color_id');
         $product->date_start        = $request->input('date_start');
         $product->date_finish       = $request->input('date_finish');
         $product->quantity          = $request->input('quantity');
         $product->price             = $request->input('price');
         $product->discount_rate     = $request->input('discount_rate');
         $product->active            = $request->input('active');
         $product->visit             = $request->input('visit');
         $product->count_sale        = $request->input('count_sale');
         $product->slider            = $request->input('slider');
         $product->save(); 
         

          $product->colors()->sync($request->get('colors'));
        
      
        
       


      
         
         return redirect('/');

    }
    public function create(){

        $user = Auth::user(); 
        $categories = Category::all();
        $brands = Brand::all();
        $patterns = Pattern::all();
        $colors = Color::all();
       
        return view('admin.products.create',compact('categories','user','brands','patterns','colors'));
    }


    public function index(){

        $user = Auth::user(); 
        $categories = Category::all();
        $brands = Brand::all();
        $patterns = Pattern::all();
        $colors = Color::all();
        $products= Product::all();
     

        return view('admin.products.index',compact('products','categories','user','brands','patterns','colors'));
    }
    public function delete(){
        $user = Auth::user();
        $categories = Category::all();
        $brands = Brand::all();
        $patterns = Pattern::all();
        $colors = Color::all();
        $products= Product::all();

     

        return view('admin.products.delete', compact('products', 'categories', 'user', 'brands', 'patterns', 'colors'));
    }

}
