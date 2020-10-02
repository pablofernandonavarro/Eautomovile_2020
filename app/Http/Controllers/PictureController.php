<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\File;

class PictureController extends Controller
{
    public function index()
    {
        return Product::with("pictures")->where("id", ">", 0)->get();
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show(Picture $picture)
    {
        //
    }

    
    public function edit(Picture $picture, $id)
    {
        $pictures = Picture::findOrFail($id);
        
        return $pictures;
    }

    
    public function update(Request $request, Picture $picture)
    {
        $pictures =Picture::find(4)->get();
        return $pictures;
    }

  
    public function destroy($id)

    {
       $product = Product::with('pictures')->get()->$id;
       dd($product);
          $picture = $product->id;
        
        $archivo = substr($picture->url_picture, 1);
    
        $eliminar = File::delete($archivo);
    
        $picture->delete();
    
        return "eliminado id:".$id. ' '.$eliminar;
    }
}