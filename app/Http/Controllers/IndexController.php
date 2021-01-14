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
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{




    public function view_user(){

      $user = Auth::user();
      $products = Product::with('pictures','category')->get();
      $categories = Category::all();
      $patterns   = Pattern::all();


      return view('index',compact('user','products','categories','patterns'))->with('messages_search','el resultado es :');
    }

    public function view_nosotros(){
      $user = Auth::user();
      return view('nosotros',compact('user'));
    }

    public function Year($year)
    {
        if ($year);

        $start    = DB::table('products')->select('date_start')->get();
        $end      = DB::table('products')->select('date_finish')->get();
        $number1 = strtotime($start);
        $number2 = strtotime($end);
        $number3 = strtotime($year);
        if (($number1 >= $number3) && ($number2 <= $number3)) {
            return 1;
        }
        return 0;
        }

    pubLic function productSearch(Request $request){

  
      $user = Auth::user();
      $categories = Category::all();
      $patterns   = Pattern::all();
      $category_id = $request->get('category_id');
      $pattern_id  = $request->get('pattern_id');
    
     
      $year      = Date('Y-m-d');
      $year        = $request->get('year');


     $products = Product::orderBy('id', 'DESC')
                    ->categorysearch($category_id)
                    ->patternsearch($pattern_id)
                   
                    // ->StartDate($year)
                    ->FinishDate($year)
                    ->get();
                
  
    


      return view('index',compact('user','products','categories','patterns','category_id'))->with('messages_search','fjdfkadkfkdafjdkaf');
    }
  public function view_currier(){

    return view ('currier');

  }

}
