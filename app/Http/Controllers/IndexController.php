<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Scope;
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
      $categories = Category::all();
      $patterns   = Pattern::all();
      $category_id = $request->get('category_id');
      $pattern_id  = $request->get('pattern_id');
      $year        = $request->get('year');


     $products = Product::orderBy('id', 'DESC')
                 ->categorysearch($category_id)
                 ->patternsearch($pattern_id)
                 ->yearearch($year)
                 ->get();




      return view('index',compact('user','products','categories','patterns','category_id'));
    }


}
