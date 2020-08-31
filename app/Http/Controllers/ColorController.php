<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestColor;
use Illuminate\Support\Str;
class ColorController extends Controller
{
    public function index(){

        $colors= Color::get();
        $user = Auth::user();

        return $colors ;
        
    }

   



    public function store(RequestColor $request){


        
        Color::create([
           'slug'=>Str::slug($request->input('color_name')),
           'color_name'=> $request->input(('color_name'))
        ]);

        return ;
    }

    public function edit($id){
       
        $Colors = Color::findOrFail($id);
        
        return $Colors;
    }
    public function update(RequestColor $request ,$id){

       

        // Color::find($id)->update($request->all());
        Color::finf($id)->update([
            'slug'=>Str::slug($request->input('color_name')),
            'color_name'=> $request->input(('color_name'))
         ]);
        return;


    }

    public function destroy($id){
       
        $Colors = Color::findOrFail($id);
        $Colors->delete();
        return $Colors;
    }

}
