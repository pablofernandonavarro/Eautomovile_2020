<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{   
 
   public function __construct()
  {
      $this->middleware('admin');
  }



    public function view_user(){
      $user = Auth::user();
      $role =  Auth::all();
    
      
      return view('index',compact('user','role'));
    }
}
