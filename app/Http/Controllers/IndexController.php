<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Category;
use App\Pattern;

class IndexController extends Controller
{   

 


    public function view_user(){
     
      $user = Auth::user(); 
      $products = Product::with('pictures','category')->get();
      $categories = Category::all();
      $patterns   = Pattern::all();
    
     
      return view('index',compact('user','products','categories','patterns'));
    }

    public function view_nosotros(){
      $user = Auth::user(); 
      return view('nosotros',compact('user'));
    }
   
    pubLic function productSearch(Request $request){

    
      $user = Auth::user();
      $category_id = $request->get('category_id');
     
      $categories = Category::all();
      $patterns   = Pattern::all();
    
     

     $products = Product::orderBy('id','DESC')
                 ->Category('$category_id');
    

      return view('index',compact('user','products','categories','patterns'));
    }


}
