<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{ public function index(){

    $brands= Brand::get();

    return $brands;
    
}





public function store(Request $request){

    $this->validate($request,[

    'brand_name'=> 'required',

    ]);

    brand::create($request->all());

    return ;
}

public function edit($id){
   
    $brands = brand::findOrFail($id);
    ///formulario
    return $brands;
}
public function update(Request $request ,$id){

    $this->validate($request,[

      'brand_name'=> 'required',
    ]);

    brand::find($id)->update($request->all());
    return;


}

public function destroy($id){
   
    $brands = brand::findOrFail($id);
    $brands->delete();
    return $brands;
}
   
}
