<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{   

 


    public function view_user(){
      $user = Auth::user();
      $role =  Auth::user()->user_role;
    
      
      return view('index',compact('user','role'));
    }
}
