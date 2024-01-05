<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\bookcontroller;
use App\Http\Middleware\MyAuth;
use App\Http\Middleware\MyGuest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::group(['middleware' => 'AdminMiddleware'], function (){
    Route:: get('/',[AdminController::class,'showhome1']);
    
    Route:: get('/logina',[AdminController::class,'showlogina']);
    Route:: post('/logina',[AdminController::class,'logina']);
    Route:: get('/dash1',[AdminController::class,'showdash1']);      
    Route:: get('/patientform',[AdminController::class,'showpatientform']);  
    Route:: post('/patientform',[AdminController::class,'patientform']);
    Route:: get('/search',[AdminController::class,'showsearch']);
    Route:: get('/doctorform',[AdminController::class,'showdoctorform']);  
    Route:: post('/doctorform',[AdminController::class,'doctorform']);         
    Route:: get('/ambulanceform',[AdminController::class,'showambulanceform']);   
    Route:: post('/ambulanceform',[AdminController::class,'ambulanceform']); 
    Route:: get('/manage',[AdminController::class,'showmanage']); 
    Route:: get('/manage2',[AdminController::class,'showmanage2']); 
    Route:: get('/manage3',[AdminController::class,'showmanage3']); 
    Route:: get('/index3',[AdminController::class,'showindex']); 

//});                          




                                      
// Guest
Route::group(['middleware' => 'myguest'], function () {
    
    Route::get('/index', [usercontroller::class, 'showIndex']);
    Route::get('/register', [usercontroller::class, 'showRegister']);
    Route::get('/login', [usercontroller::class, 'showLogin']);
    Route::post('/register', [usercontroller::class, 'register']);
    Route::post('/Dologin', [usercontroller::class, 'login']);
});

// Authenticated user (Logged in user)
Route::group(['middleware' => 'myauth'], function () {
    Route::get('/home', [bookcontroller::class, 'showHome']);
   
    Route::get('/doctors', [bookcontroller::class, 'showDoctors']);
    Route::get('/book', [bookcontroller::class, 'showBook']);
    Route::post('/book', [bookcontroller::class, 'book'])->name('store');  
    Route::get('/confirm', [bookcontroller::class, 'showconfirm']);
    Route::get('/logout', [bookcontroller::class, 'logout']);
});
