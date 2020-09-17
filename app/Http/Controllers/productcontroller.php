<?php

namespace App\Http\Controllers;


use App\Product;
use App\category;
use App\Brand;
use App\Color;
use App\Picture;
use App\Http\Requests\ProductRequest;
use App\Pattern;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Productcontroller extends Controller
{ 
     public function show($id){

    $user = Auth::user(); 
    $categories = Category::all();
    $brands = Brand::all();
    $patterns = Pattern::all();
    $colors = Color::find($id);
    $products= Product::find($id);
   
   
    

    return view('admin.products.show',compact('products','categories','user','brands','patterns','colors'));
}
   

    public function store(ProductRequest $request){
        
        
        $sku = $request->sku;
        $url_picture=[];
        if ($request->hasfile('url_picture')) {
            $pictures = $request->file('url_picture');

            foreach ($pictures as $i =>  $picture) {
                
                $name = $sku."_".($i+1).'.jpg';
                $url = public_path().'/pictures/'.$sku.'/';
                $img = Image::make($pictures[$i]);
                $img->encode('webp');
                $img->resize(360, 220, function ($c) {
                    $c->aspectRatio();
                });
                
                // $picture->move($url,$name);
          
                 $img->save("storage/pictures/".$name);
               
            //    dd($n);
              
                $url_picture[]['url_picture'] = "pictures/".$name;
            }
        }

       
        
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
      
        $product->colors()->sync($request->get('color_id'));
        $product->pictures()->createMany($url_picture);

        
        



         
         

          
        
      
        
       


      
         
        return back()->with('status','Datos cargados correctamente');

    }
    public function create(){

        $user = Auth::user(); 
        $categories = Category::all();
        $brands = Brand::all();
        $patterns = Pattern::all();
        $colors = Color::all();
        $products = Product::all();
        $pictures = Picture::all();
       
        return view('admin.products.create',compact('products','categories','user','brands','patterns','colors','pictures'));
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