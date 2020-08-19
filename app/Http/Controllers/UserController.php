<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
     public function index(){

        $users= User::get();

        return $users;
        
    }

   



    public function store(Request $request){

        $this->validate($request,[

        'User_name'=> 'required',

        ]);

        User::create($request->all());

        return ;
    }

    public function edit($id){
       
        $users = User::findOrFail($id);
        ///formulario
        return $users;
    }
    public function update(Request $request ,$id){

        $this->validate($request,[

          'User_name'=> 'required',
        ]);

        User::find($id)->update($request->all());
        return;


    }

    public function destroy($id){
       
        $users = User::findOrFail($id);
        $users->delete();
        return $users;
    }
}
