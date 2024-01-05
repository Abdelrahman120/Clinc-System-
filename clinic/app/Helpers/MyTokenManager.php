<?php
namespace app\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MyTokenManager{//to manage tokens
    public static function createPatientToken($patientId){

        //generate a new token
        $token=Str::random(40);

        //encrypt token
        $encToken=Hash::make($token);

        //insert encrypted token into database
        DB::insert('insert into patient_tokens(patient_id,token) values(?,?)',[$patientId,$encToken]);
        $tokenID=DB::getPdo()->lastInsertId();

        //return token,id to the user
        return "$tokenID|$token";
    }

    public static function currentPatient(Request $request){
    //get token from user
    $token= $request->bearerToken();

    //reject the request if no token found
    if(!$token){return null;}

    //reject token if it doesn't contain '|'
    if(!str_contains($token,'|')){return null;}

    //split into id,string
    [$tokenID,$tokenStr] = explode('|',$token,2);

    //search for token in patient token
    $result=DB::select('select* from patient_tokens where token_id=?',[$tokenID]);
    if($result){
    //token come from database
    $tokenData=$result[0];

    //compare token with encrypted token
    if(Hash::check($tokenStr,$tokenData->token)){
        //retrieve patient data 
       $result2= DB::select('select name,email,phone,gender,birthDate from patient where id=?',[$tokenData->patient_id]);
       
       if($result2){
        $patient=$result2[0];
        return $patient;
             }
        }
    }
  }
  public static function removePatientToken(Request $request){
    //get token from user
    $token= $request->bearerToken();

    //reject the request if no token found
    if(!$token){return null;}

    //reject token if it doesn't contain '|'
    if(!str_contains($token,'|')){return null;}

    //split into id,string
    [$tokenID,$tokenStr] = explode('|',$token,2);

    //remove token using id
    DB::delete('delete from patient_tokens where token_id=?',[$tokenID]);

  }
}