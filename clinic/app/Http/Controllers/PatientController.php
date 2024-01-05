<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    //
    public function showploginp(){
        return view('loginp');
       }
       public function loginp(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password' =>'required|confirmed|min=8'
           ]);
    }
       public function showupdateprofile(){
        return view('updateprofile');
       }
       public function updateprofile(Request $request){

    }
       public function showbook2(){
        return view('book2');
       }
       public function book2(Request $request){

    }
   
}
