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
        
       //return "se va a eliminar el registro ".$id;
    $picture = Picture::find($id);

    $archivo = substr($picture->url_picture,1);

    $eliminar = File::delete($archivo);

    $picture->delete();

    return back()->with('messages_delete','Registro eliminado correctamente!');
    }
}