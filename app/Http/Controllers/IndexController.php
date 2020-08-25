<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class IndexController extends Controller
{   

 


    public function view_user(){

      $user = Auth::user(); 
      return view('index',compact('user'));
    }
}
