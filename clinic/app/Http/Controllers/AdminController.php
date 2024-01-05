<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function showhome1()
    {
        return view('home1');
    }


    public function showlogina()
    {
        return view('logina');
    }
    public function logina(Request $request)
    {


        // validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // return dd($request->all());

        //search for patient by email
        $email = $request->email;
        $password = $request->password;
        $result = DB::select('select * from admin where admin_name = ? ', [$email]);
        if (!$result) {

            return back()->with(['error' => 'This email is not found'])->withInput();
        }
        $admin = $result[0];
        // check password
        if ((!$password == $admin->admin_password)) {
            return back()->with(['error' => 'Incorrect password'])->withInput();
        }

        // mark patient as logged in
        session()->regenerate();
        session([
            'loggedIn' => true,
            'adminId' => $admin->admin_id,
            'email' => $admin->admin_name,

        ]);
        // go to home
        return redirect(url('/dash1'));
    }


    public function showdash1()
    {
        return view('dash1');
    }
    public function showpatientform()
    {
        return view('patientform');
    }
    public function patientform(Request $request)
    {

        $request->validate([
            'p_name' => 'required|max:100',
            'gender' => 'required',
            'birthdate' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:11',


        ]);
        //return dd($request->all());


        // store data in database
        $p_name = $request->p_name;
        $email = $request->email;
        $phone = $request->phone;
        $gender = $request->gender;
        $birthdate = $request->birthdate;
        DB::insert('insert into add_patient ( p_name, gender,birthdate,email,phone) values(?,?, ?,?,?)', [$p_name, $gender, $birthdate, $email, $phone]);

        // mark user as logged in
        $patientId = DB::getPdo()->lastInsertId();
        $result = DB::select('select  p_name, gender,birthdate,email,phone from add_patient where p_id = ?', [$patientId]);
        $patient = null;
        if ($result) {
            $patient = $result[0];
        }
        if ($patient == null) {
            return back()->with(['error' => 'Unexpected error happened during add patient'])->withInput();
        }

        session()->regenerate();
        session([

            'loggedIn' => true,
            'patientId' => $patientId,
            'patient' => $patient,
            'phone' => $patient->phone,
            'email' => $patient->email // *****New***
        ]);

        // go to dashboard
        return redirect('/dash1')->with(['success_message' => 'Patient Was Successfully added']);
    }




    public function showsearch()
    {
        return view('search');
    }
    public function showdoctorform()
    {
        return view('doctorform');
    }
    public function doctorform(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:doctor',
            'phone' => 'required|max:11',
            'birthdate' => 'required',
            'specialization' => 'required'
        ]);


        // store data in database
        $name = $request->name;
        $d_email = $request->email;
        $phone = $request->phone;
        $birthdate = $request->birthdate;
        $specialization = $request->specialization;
        DB::insert('insert into doctor(d_name, d_email,phone,birthdate,specialization) values(?, ?, ?,?,?)', [$name, $d_email,  $phone, $birthdate, $specialization]);

        // mark user as logged in
        $patientId = DB::getPdo()->lastInsertId();
        $result = DB::select('select d_id, d_name, d_email from doctor where d_id = ?', [$patientId]);
        $docter = null;
        if ($result) {
            $docter = $result[0];
        }
        if ($docter == null) {
            return back()->with(['error' => 'Unexpected error happened during registration'])->withInput();
        }

        session()->regenerate();
        session([

            'loggedIn' => true,
            'patientId' => $patientId,
            'patient' => $docter,
            /*  'phone' => $docter->phone,
        'email' => $docter->email // *****New*** */
        ]);

        // go to home
        return redirect('/dash1')->with(['success_message' => 'Doctor Was Successfully added!']);
    }


    public function showambulanceform()
    {
        return view('ambulanceform');
    }
    public function ambulanceform(Request $request)
    { 
        $request->validate([
            'vechile_number' => 'required|max:100',
            'vechile_model' => 'required',
            'year_made' => 'required',
            'driver_name' => 'required',
            'driver_license' => 'required',
            'driver_phone' => 'required|max:11',
            'vechile_type' => 'required',

        ]);


        // store data in database
        $vechile_number = $request->vechile_number;
        $vechile_model = $request->vechile_model;
        $year_made = $request->year_made;
        $vechile_type = $request->vechile_type;
        $driver_name = $request->driver_name;
        $driver_phone = $request->driver_phone;
        $driver_license = $request->driver_license;
        DB::insert('insert into ambulance(vechile_number, vechile_model,year_made,vechile_type,driver_name,driver_phone,driver_license) values(?,?,?,?,?,?,?)', [$vechile_number, $vechile_model, $year_made, $vechile_type, $driver_name, $driver_phone, $driver_license]);

        // mark user as logged in
        $ambId = DB::getPdo()->lastInsertId();
        $result = DB::select('select vechile_number, vechile_model from ambulance where vechile_id = ?', [$ambId]);
        $amb = null;
        if ($result) {
            $amb = $result[0];
        }
        if ($amb == null) {
            return back()->with(['error' => 'Unexpected error happened during registration'])->withInput();
        }

        session()->regenerate();
        session([

            'loggedIn' => true,
            'ambId' => $ambId,
            'amb' => $amb

        ]);

        // go to home
        return redirect('/dash1')->with(['success_message' => 'ambulance Was Successfully added!']);
    }
    public function showmanage()
    {
        
       /* $name = Session('p_name');
        $email = Session('email');
        $phone = Session('phone');
        
        $gender = Session('gender');
        $birthdate = Session('birthdate');*/
        $patient = DB::select('select  * FROM add_patient ORDER BY p_id ');
        return view('manage', ['patient' => $patient]);
        
    }
    public function showmanage2()
    {
        
       /* $name = Session('p_name');
        $email = Session('email');
        $phone = Session('phone');
        
        $gender = Session('gender');
        $birthdate = Session('birthdate');*/
        $patient = DB::select('select  * FROM doctor ORDER BY d_id ');
        return view('manage2', ['patient' => $patient]);
        
    }
    public function showmanage3()
    {
        
       /* $name = Session('p_name');
        $email = Session('email');
        $phone = Session('phone');
        
        $gender = Session('gender');
        $birthdate = Session('birthdate');*/
        $patient = DB::select('select  * FROM ambulance ORDER BY vechile_id ');
        return view('manage3', ['patient' => $patient]);
        
    }
    public function showindex()
    {
        return view('index3');
    }
}
