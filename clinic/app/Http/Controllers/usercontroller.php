<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class usercontroller extends Controller
{
    public function showLogin()
    {
        return view('login');
    }
    public function showRegister()
    {
        return view('register');
    }
    public function showIndex()
    {
        return view('index');
    }

    public function register(Request  $request)
    {
        // validation
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:patient',
            'password' => 'required|confirmed| min:8',
            'phone' => 'required|max:11',
            'gender' => 'required',
            'birthDate' => 'required'
        ]);


        // store data in database
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $passwordEnc = Hash::make($password);
        $phone = $request->phone;
        $gender = $request->gender;
        $birthDate = $request->birthDate;
        DB::insert('insert into patient(name, email, password,phone,gender,birthDate) values(?, ?, ?,?,?,?)', [$name, $email, $passwordEnc, $phone, $gender, $birthDate]);

        // mark user as logged in
        $patientId = DB::getPdo()->lastInsertId();
        $result = DB::select('select id, name, email,phone from patient where id = ?', [$patientId]);
        $patient = null;
        if ($result) {
            $patient = $result[0];
        }
        if ($patient == null) {
            return back()->with(['error' => 'Unexpected error happened during registration'])->withInput();
        }

        session()->regenerate();
        session([

            'loggedIn' => true,
            'patientId' => $patientId,
            'patient' => $patient,
            'phone' => $patient->phone,
            'email' => $patient->email // *****New***
        ]);

        // go to home
        return redirect('/home')->with(['success_message' => 'Your account was successfully created!']);
    }



    public function login(Request  $request)
    {
        // validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // search for patient by email
        $email = $request->email;
        $password = $request->password;
        $result = DB::select('select * from patient where email = ? ', [$email]);
        if (!$result) {
            return back()->with(['error' => 'This email is not found'])->withInput();
        }
        $patient = $result[0];
        // check password
        if (!Hash::check($password, $patient->password)) {
            return back()->with(['error' => 'Incorrect password'])->withInput();
        }

        // mark patient as logged in
        session()->regenerate();
        session([
            'loggedIn' => true,
            'patientId' => $patient->id,
            'patient' => $patient,
            'phone' => $patient->phone,
            'email' => $patient->email,
            'name'=>$patient->name
        ]);
        // go to home
        return redirect(url('/home'));
    }
}
