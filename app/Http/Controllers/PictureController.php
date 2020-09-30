<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use App\Product;

class PictureController extends Controller
{

    public function index()
    {   
        return Product::with("pictures")->where("id",">",0)->get();
      
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

    
    public function edit(Picture $picture,$id)
    {
        $pictures = Picture::findOrFail($id);
        
        return $pictures;
    }

    
    public function update(Request $request, Picture $picture)
    {
        $pictures =Picture::find(4)->get();
        return $pictures;
    }

  
    public function destroy(Picture $picture)
    {
        //
    }
}
