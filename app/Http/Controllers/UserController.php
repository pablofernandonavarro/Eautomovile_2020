<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class Usercontroller extends Controller
{
  
  function edit($id){
    $user= User::findOrfail($id);
    return view('users.edit',compact('user'));
   }
 

public function update(Request $request, $id) {

   
    $user = User::findOrFail($id);
    $user->name  = $request->name;
    $user->email = $request->email;
    $user->domicilio  = $request->domicilio;
    $user->localidad=$request->localidad;
    $user->provincia=$request->provincia;
    $user->codigopostal=$request->codigopostal;
    $user->password=$request->password;
    $user->avatar=$request->avatar;
    $user->telefono=$request->telefono;
    $user->razonsocial=$request->razonsocial;
    $user->save();
  return view('users.edit',compact ('user'));



}


  

   
}





    