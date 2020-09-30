<?php

namespace App\Http\Controllers;

use App\Pattern;
use App\Brand;
use Illuminate\Http\Request;

class PatternController extends Controller
{
    public function index(){
       
     return Pattern::with("brand")->where("id",">",0)->get();
        
    }

   



    public function store(Request $request){

        $this->validate($request,[

        'pattern_name'=> 'required',

        ]);

        Pattern::create($request->all());

        return ;
    }

    public function edit($id){
       
        $patterns = Pattern::findOrFail($id);
        ///formulario
        return $patterns;
    }
    public function update(Request $request ,$id){

        $this->validate($request,[

          'pattern_name'=> 'required',
        ]);

        Pattern::find($id)->update($request->all());
        return;


    }

    public function destroy($id){
       
        $patterns = Pattern::findOrFail($id);
        $patterns->delete();
        return $patterns;
    }
}
