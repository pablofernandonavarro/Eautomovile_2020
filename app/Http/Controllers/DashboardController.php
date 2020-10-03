<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Product;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
 
    
   public function index(){
    $user = Auth::user();
       return view('admin.dashboard',compact('user'));
       
   }
   public function view_color(){

      $user = Auth::user();
      $product = Product::All();
      return view('admin.color_crud',compact('user','product'));
      
  }
  public function view_category(){

   $user = Auth::user();
   return view('admin.category_crud',compact('user'));
   
}
public function view_brand(){

   $user = Auth::user();

   return view('admin.brand_crud',compact('user'));
   
}
public function view_pattern(){

   $user = Auth::user();
   
   return view('admin.pattern_crud',compact('user'));
   
}
public function view_note(){

   $user = Auth::user();
   
   return view('admin.note_crud',compact('user'));
   
}
public function view_supplier(){

   $user = Auth::user();
   
   return view('admin.supplier_crud',compact('user'));
   
}
   
}
