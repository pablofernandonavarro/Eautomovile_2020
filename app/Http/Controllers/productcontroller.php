<?php

namespace App\Http\Controllers;


use App\Product;
use App\category;
use App\Brand;
use App\Color;
use App\Picture;
use App\Pattern;
use App\Supplier;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Request;
class Productcontroller extends Controller
{ 
     public function show($id){

    $products      = Product::find($id);
    $users         = Auth::user();
    
    return view('admin.products.show',[
        'products'     => Product::find($id),
        'categories'   => Category::all(),
        'user'         => Auth::user(), 
        'brands'       => Brand::all(),
        'patterns'     => Pattern::all(),
        'suppliers'    => Supplier::all(),
        'colors'       => $products->colors,
     ]);
   
    

}
   

    public function store(ProductRequest $request){
 
        $pattern = Pattern::find($request->input('pattern_id'));
        $brand = $pattern->brand;
        $sku = $request->sku;
        $url_picture=[];
        if ($request->hasfile('url_picture')) {
            $pictures = $request->file('url_picture');

            foreach ($pictures as $i =>  $picture) {
                
                $name = $sku."_".time().'_'.'.jpg';
                $img = Image::make($pictures[$i]);
                $img->encode('webp');
                $img->resize(360, 220, function ($c) {
                    $c->aspectRatio();
                });
                
            $img->save("storage/pictures/".$name);
            $url_picture[]['url_picture'] = "pictures/".$name;
            }
        }

       
        
         $product = new Product();
        
         
         $product->sku               = $request->input('sku'); 
        
         $product->description_short = $request->input('description_short'); 
         $product->description_large = $request->input('description_large'); 
         $product->data_interest     = $request->input('data_interest'); 
         $product->spec              = $request->input('spec'); 
         $product->brand_id          = $brand->id; 
         $product->pattern_id        = $request->input('pattern_id'); 
         $product->category_id       = $request->input('category_id');
         $product->date_start        = $request->input('date_start');
         $product->date_finish       = $request->input('date_finish');
         $product->quantity          = $request->input('quantity');
         $product->price             = $request->input('price');
         $product->supplier_id        =$request->input('supplier_id');
         $product->active            = $request->input('active');
         $product->visit             = $request->input('visit');
         $product->count_sale        = $request->input('count_sale');
         
         $product->supplier_price_list = $request->input('supplier_price_list');
         $product->supplier_discount   = $request->input('supplier_discount');
         $product->cost                = $request->input('cost');
         $product->utility             = $request->input('utility');
         $product->price_discount     = $request->input('price_discount');
         


        $product->save(); 
        $product->colors()->sync($request->get('color_id'));
        $product->suppliers()->sync($request->get('supplier_id'));
       
        $product->pictures()->createMany($url_picture);

        return redirect('admin/products')->with('messages_create_ok','El producto fue creado con exito');

    }

    public function create(){

        $user = Auth::user(); 
        $categories = Category::all();
        $brands = Brand::all();
        $patterns = Pattern::all();
        $colors = Color::all();
        $products = Product::all();
        $pictures = Picture::all();
        $suppliers = Supplier::all();
      
        return view('admin.products.create',compact('products','categories','user','brands','patterns','colors','pictures','suppliers'));
    }

   
    public function index(){
        
        $user       = Auth::user(); 
        $categories = Category::all();
        $brands     = Brand::all();
        $patterns   = Pattern::all();
        $colors     = Color::all();
        $products   = Product::orderby('id','DESC')->paginate('10');
        $suppliers = Supplier::all();

        return view('admin.products.index',compact('products','categories','user','brands','patterns','colors'));
    }

 

    public function edit($id){
        
        $url_picture=[];  
       
        return view('admin/products/edit', [
        'product'      =>  Product::find($id),
        'categories'   => Category::all(),
        'user'         => Auth::user(), 
        'brands'       => Brand::all(),
        'patterns'     => Pattern::all(),
        'colors'       => Color::all(),
        'pictures'     => Picture::all(),
        'suppliers'    => Supplier::all(),
     ]);

    }

    public function update(ProductRequest $request,$id){
       
        $product = Product::find($id);
        $data = request()->validate([
            
            'sku' => [
                'required',
                Rule::unique('products')->ignore($product->id),
            ],
           
        ]);
     
      
        $pattern = Pattern::find($request->input('pattern_id'));
        $brand = $pattern->brand;
      
        $sku        = $product->sku;
        $url_picture =[];
        if ($request->hasfile('url_picture')) {
            $pictures = $request->file('url_picture');

            foreach ($pictures as $i =>  $picture) {
                
                $name = $sku."_".time().'_'.'.jpg';
                $img = Image::make($pictures[$i]);
                $img->encode('webp');
                $img->resize(360, 220, function ($c) {
                    $c->aspectRatio();
                });
                
            $img->save("storage/pictures/".$name);
            $url_picture[]['url_picture'] = "pictures/".$name;
            }
        }

       
        
         $product = Product::findOrFail($id);;
        
         
         $product->sku               = $sku;
         
         $product->description_short = $request->input('description_short'); 
         $product->description_large = $request->input('description_large'); 
         $product->data_interest     = $request->input('data_interest'); 
         $product->spec              = $request->input('spec'); 
         $product->brand_id          = $brand->id; 
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
         $product->update(); 
      
        $product->colors()->sync($request->get('color_id'));
        $product->supplier()->sync($request->get('supplier_id'));
        $product->pictures()->createMany($url_picture);
        
        return back()->with('messages_create_ok',"Los datos del $product->description_short  fueron editado correctamente!");
    }

    public function destroy($id){
        $products = Product::with('pictures')->findOrFail($id);
            foreach($products->pictures as $picture) {
            unlink(public_path('/storage/'.$picture->url_picture));
            $picture -> delete();
    }
    $products->delete();
    return redirect('admin/products')->with('messages_delete','Registro eliminado correctamente!');
}


public function deletepicture($id)
{
    
    //return "se va a eliminar el registro ".$id;
    $picture = Picture::find($id);

    $archivo = substr($picture->url_picture,1);

    $eliminar = File::delete($archivo);

    $picture->delete();

    return "eliminado id:".$id. ' '.$eliminar;
}
}