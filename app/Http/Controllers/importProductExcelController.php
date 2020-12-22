<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Color;
class importProductExcelController extends Controller
{



    public function importExcel(){
       
        $products    = Product::with('brand','pattern','category','suppliers')->get();
       
  
        $user        = Auth::user();
    
        return view('admin.importProductExcel', compact('products','user'));
        
      
       
          



      

           
       }
}
