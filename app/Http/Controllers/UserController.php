<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class Usercontroller extends Controller
{
  
  function edit($id){
    $user= User::findOrfail($id);
    
   

    return view('users.edit',compact('user'));
  }


public function update(Request $request, $id) {


  $user= User::FindOrFail($id);
  $file= $request->file('avatar');
    if ($request->hasFile('avatar')){
      $file_avatar = $request->file('avatar');
      $name_avatar = $file_avatar->getClientOriginalName();
      Storage::putFileAs('/public/users_avatar',$file ,$file->getClientOriginalName());
      }
    $user->update($request->all());
    $user->avatar =$user->avatar->getClientOriginalName();
 
  return redirect("index");
}

  
}



  

   


  





    