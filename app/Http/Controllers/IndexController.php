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
}
