<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories= category::get();

        return $categories;
        
    }

   



    public function store(Request $request){

        $this->validate($request,[

        'category_name'=> 'required',

        ]);

        category::create($request->all());

        return ;
    }

    public function edit($id){
       
        $categories = category::findOrFail($id);
        ///formulario
        return $categories;
    }
    public function update(Request $request ,$id){

        $this->validate($request,[

          'category_name'=> 'required',
        ]);

        category::find($id)->update($request->all());
        return;


    }

    public function destroy($id){
       
        $categories = category::findOrFail($id);
        $categories->delete();
        return $categories;
    }
  
}
