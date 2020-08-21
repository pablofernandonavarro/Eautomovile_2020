<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



class Usercontroller extends Controller
{
    public function edit($id)
    {
        $user= User::findOrfail($id);
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user= User::FindOrFail($id);
        
    
        if ($request->hasFile('url_avatar')) {
            
            
            $user->url_avatar = $request->file('url_avatar')->store('public/avatars');
            $user->save($request->all());
        }
         $user->save($request->all());
          
           
            return redirect("index");
       
    }
}


  

   


  





    