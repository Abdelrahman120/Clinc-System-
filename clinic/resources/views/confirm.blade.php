<!DOCTYPE html>
<html lang="en">

<head>
    <title>appointment</title>
    <link rel="stylesheet" href="confirm.css">
</head>

<body class="logbg">
    <!-- Start Header -->
    <div class="header">
        <div class="topnav">
            <img class="logo" src="images/capture7.PNG" alt="" />
            <!--<a class="active" href="/register">Booking</a>-->

            <a class="active" href="/logout">
                <a href="/home">
                logout</a>
        </div>
    </div>

    @foreach($patient as $patient)
<div class="confirm">
  <h2>Your appointment is booked successfully!</h1>
  <br>
  
<p>
patient email : {{Session('email')}} <br>
phone:{{Session('phone')}}<br>
date :{{$patient->date}} <br>
time : {{$patient->time}} <br>
</p>

</div>
@endforeach

<br>
<br>
<br>
<br>
<br>
    </div>
    <div class="footer">&copy; 2022 All Right Reserved</div>
</body>

</html>