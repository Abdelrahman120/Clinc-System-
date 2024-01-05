<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HIS</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="theme-color" content="#5190fd">
            <link href="https://nobel-misr-academy.com/his/uploads/hospital_content/logo/1mini_logo.jpg" rel="shortcut icon" type="image/x-icon">
            <link rel="stylesheet" href=style/logina.css>
 </head> 
 <body>
    <container>
        <div class="box">
 <div class="a">
    <div class="title">
    <h1>Admin Login</h1>
    </div>
    <form method="POST" action="/logina">
        @csrf
    <div class="form-field">
        
        <div class="box-content">
        @error('name') <p class="error" color="red">{{ $message }}</p> @enderror
        <label  class="details"     for="email"><b>Email</b></label>
        <input type="text"  placeholder="Email/Username" name="email"required  >  
        </div>
        <br>
        <br>
        <br>
        <div class="box-content">
        <label class="details"  for="password"><b>password</b></label> 
        <input type="password"  placeholder="Password" name="password"required > 
        @error('password') <p class="error" > {{ $message }}</p> @enderror
        </div>
        @if(session('error')) <p class="error">{{ session('error') }}</p> @endif
        <div class="btn">
           
                <button class="btn" type="submit">Login</button>
            
        </div>
        </div>
    </form>
        
        </div>
        </div>
        </container>
        </body>
        </html>
        