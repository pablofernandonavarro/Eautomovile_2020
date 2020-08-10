<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NoteController extends Controller
{
    public function index(){

        $notes= Note::get();

        return $notes;
        
    }

   



    public function store(Request $request){

        $this->validate($request,[

        'description'=> 'required',

        ]);

        Note::create($request->all());

        return ;
    }

    public function edit($id){
       
        $notes = Note::findOrFail($id);
        ///formulario
        return $notes;
    }

    public function destroy($id){
       
        $notes = Note::findOrFail($id);
        $notes->delete();
        return $notes;
    }

}