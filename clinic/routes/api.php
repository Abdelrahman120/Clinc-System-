<?php

use App\Helpers\MyTokenManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


Route::post('/login',function(Request $request){
    //recieve email and password from the user
    $email=$request->email;
    $password=$request->password;
    
    //search for the patient email in database
    $result= DB::select('select * from patient where email = ? ', [$email]);
    //if email isn't found
    if(!$result){
        return ['error' => 'This email is not found'];
    }
    //get patient data
    $patient=$result[0];
    // check password
    if (!Hash::check($password, $patient->password)) {
        return ['error' => 'Incorrect password'];
    }
    $token = MyTokenManager::createPatientToken($patient->id);
    //return response(token)
    return[
    'message'=>'Logged in Successfully!',
    'token'=>$token
    ];
   
});
Route::post('/register',function(Request $request){
    //recieve data from user
    $name=$request->name;
    $email=$request->email;
    $password=$request->password;
    $passwordEnc = Hash::make($password);
    $phone=$request->phone;
    $birthDate=$request->birthDate;
    $gender=$request->gender;

    //store data in data base
    $result=DB::insert('insert into patient(name,email,phone,gender,birthDate,password) values(?,?,?,?,?,?)',[$name,$email,$phone,$gender,$birthDate,$passwordEnc]);
    if(!$result){return ['error'=>'error happend'];}
    else{return['message'=>'Registerd Successfully!'];}
    
});
Route::post('/book',function(Request $request){
        
    //recieve data from user
    $email=$request->email;
    $phone=$request->phone;
    $date=$request->date;
    $time=$request->time;

    $result= DB::select('select * from patient where email = ? ', [$email]);
        $patientId=$result[0]->id;
        $doctor_id = DB::table('doctor')->inRandomOrder()->first()->d_id;
        $result=DB::insert('insert into appointment(p_id,date,time,d_id)values(?,?,?,?)',[$patientId,$date,$time,$doctor_id]);

    
    if(!$result){return ['error'=>'error happend'];}
    else{
        return['message'=>'Booked Successfully!'];
        $patient = DB::select('select date,time
        FROM appointment
        ORDER BY appointment_id DESC LIMIT 1');
        return['message'=>$patient];
    }

});

Route::group(['middleware'=>'myauthapi'],function(){

    Route::get('/profile',function(Request $request){
       $patient= MyTokenManager::currentPatient($request);
       return[
        'patient'=>$patient
       ];
    });
    Route::get('/logout',function(Request $request){
        MyTokenManager::removePatientToken($request);
        return['Logged out successfully!'];

    });
  

});