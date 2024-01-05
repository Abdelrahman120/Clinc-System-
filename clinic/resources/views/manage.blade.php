<!DOCTYPE html>
<html lang="en">
    <style>
table,  td {
    text-align: center;
  border:1px solid black;
  margin-top: 10px;
}
th{
    text-align: center;
    font-weight: bold;
    background-color:#0395F4;
}
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/style/bootstrap.min.css">
    <link rel="stylesheet" href="/style/all.min.css">
    <link rel="stylesheet" href="/style/header.css">
    <link rel="stylesheet" href="/style/main.css">
    <link rel="preconnect" href="/https://fonts.googleapis.com">
    <link rel="preconnect" href="/https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<main>
    <div class="content">
        <aside class="sideNav">
            <h1 class="logo"><a href="/dash1"><i class="fas fa-heartbeat"></i>Hospital</a></h1>
            <ul class="nav_links">
                <li class="nav_item"><a href="/dash1"><i class="fa fa-home nav_icon" ></i>Dashboard</a></li>
                <li class="nav_title">Patients</li>
                <li class="nav_item"><a href="#"><i class="fas fa-user-plus nav_icon">
                    <a href="/patientform">
                </i>Add Patient</a></li>
                <li class="nav_item"><a href="#"><i class="fas fa-users-cog nav_icon">
                    <a href="/manage">
                </i>Manage Patients</a></li>
               
                <!-- ###################### -->
                <li class="nav_title">Doctors</li>
                <li class="nav_item"><a href="#"><i class="fas fa-user-plus nav_icon">
                    <a href="/doctorform">
                </i>Add Doctor</a></li>
                <li class="nav_item"><a href="#"><i class="fas fa-users-cog nav_icon">
                    <a href="/manage2">
                </i>Manage Doctors</a></li>
                
                <li class="nav_item"><a href="dash1.html"><i class="fa fa-home nav_icon" ></i>Dashboard</a></li>
               
                <li class="nav_title">Ambulance</li>
                <li class="nav_item"><a href="#"><i class="fas fa-ambulance nav_icon">
                    <a href="/ambulanceform">
                </i>Add Ambulance</a></li>
                
                <li class="nav_item"><a href="#"><i class="fas fa-cog nav_icon">
                    <a href="/manage3">
                </i>Manage Ambulance</a></li>
                
                <li class="nav_item"><a href="#"><i class="fas fa-sign-out-alt nav_icon">
                    <a href="/home1">
                </i>logout</a></li>
            </ul><!-- ./nav_links -->
        </aside><!-- ./nav -->
        <div class="main_content">
            <header>
                <div class="container">
                    <div class="header_content">
                        <h2 class="page_title">admin dashboard</h2>
                        <div class="header_icons">
                            <a href="#" class="header_icon"><i class="fas fa-bell"></i></a>
                            <a href="#" class="header_icon"><i class="fas fa-inbox"></i></a>
                            <a href="#" class="header_icon"><img src="images/userIcon.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </header>
                <div class="page_content">
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="content_item">
                                    <i class="fas fa-users"></i>
                                    <h3 class="item_num">3000</h3>
                                    <span class="item_title">total users</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="content_item">
                                    <i class="fas fa-user-md"></i>
                                    <h3 class="item_num">3000</h3>
                                    <span class="item_title">doctors</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="content_item">
                                    <i class="fas fa-hospital-user"></i>
                                    <h3 class="item_num">3000</h3>
                                    <span class="item_title">Patients</span>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <table style="width:100%">
                            
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>phone</th>
                                <th>Gender</th>
                                <th>Birthdate</th>
                            </tr>
                            @foreach($patient as $patient)
                            <tr>
                            <td>{{$patient->p_name}}  </td>
                                <td>{{$patient->email}}</td>
                                <td>{{$patient->phone}}</td>
                                <td>{{$patient->gender}}</td>
                                <td>{{$patient->birthdate}}</td>
                            </tr>
                            @endforeach
                          </table>
                          
                        </div>
                    </div>
                </div>
            </div><!-- ./container -->
        </div><!-- ./main_content -->
    </div><!-- ./content -->
</main>
</body>
</html>
