<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class bookcontroller extends Controller
{
    public function showDoctors()
    {
        return view('doctors');
    }
    public function showHome()
    {
        return view('home');
    }
    public function showBook()
    {
        return view('book');
    }
    public function book(Request  $request)
    {
        // validation
        $request->validate([
            'name' => 'required|email',
            'phone' => 'required|digits:11',
            'date' => 'required|unique:appointment|after_or_equal:now',  // ********Add  after_or_equal:now ***********
            'time' => 'required|unique:appointment',
            'doctor_name' => 'required'     // *******New******
        ]);
       // return dd($request->all());
         $full_name = $request->name;    // ******* Edit the name*********
        $phone = $request->phone;
        $date = $request->date;
        $time = $request->time;
        
        $patient_id = Session('patientId');
        
        $doctor = $request->doctor_name;    // ****** Edit the name*******
       
       if ($request->name == Session('email')) {
            $doctor_id = DB::table('doctor')->inRandomOrder()->first()->d_id;
             DB::insert('insert into appointment(p_id,date,time,d_id) values(?,?,?,?)', [$patient_id, $date, $time, $doctor_id]);
            return redirect('/confirm');
        
       }   else {        // *******New******
           return redirect()->back()->with('alert', 'This not your email ');
        }
       
    }
    public function logout()
    {
        session()->invalidate();
        return redirect('/login');
    }

    public function showconfirm()
    {
        $name = Session('name');
        $email = Session('email');
        $phone = Session('phone');
        $patient = DB::select('select date,time
        FROM appointment
        ORDER BY appointment_id DESC LIMIT 1');
        return view('confirm', ['patient' => $patient,'name'=>$name,'email'=>$email,'phone'=>$phone]);
        
    }
   
}
