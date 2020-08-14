<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;

class ColorController extends Controller
{
    public function index(){

        $colors= Color::get();

        return $colors;
        
    }

   



    public function store(Request $request){

        $this->validate($request,[

        'color_name'=> 'required',

        ]);

        Color::create($request->all());

        return ;
    }

    public function edit($id){
       
        $Colors = Color::findOrFail($id);
        ///formulario
        return $Colors;
    }
    public function update(Request $request ,$id){

        $this->validate($request,[

          'color_name'=> 'required',
        ]);

        Color::find($id)->update($request->all());
        return;


    }

    public function destroy($id){
       
        $Colors = Color::findOrFail($id);
        $Colors->delete();
        return $Colors;
    }

}
