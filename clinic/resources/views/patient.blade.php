<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/all.min.css">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<main>
    <div class="content">
        <aside class="sideNav">
            <h1 class="logo"><a href="dash1"><i class="fas fa-heartbeat"></i>Hospital</a></h1>
            <ul class="nav_links">
                <li class="nav_item"><a href="dash1"><i class="fa fa-home nav_icon" ></i>Dashboard</a></li>
                <li class="nav_title">Doctors</li>
                <li class="nav_item"><a href="#"><i class="fas fa-user nav_icon"></i>list of doctors</a></li>
                <li class="nav_item"><a href="#"><i class="fas fa-search nav_icon"></i>doctor search</a></li>
                <li class="nav_title">Appointments</li>
                <li class="nav_item"><a href="#"><i class="far fa-address-book nav_icon"></i>book appointment</a></li>
                <li class="nav_item"><a href="#"><i class="fas fa-history nav_icon"></i>Appointments history</a></li>
                <li class="nav_title">profile</li>
                <li class="nav_item"><a href="#"><i class="fas fa-user-circle nav_icon"></i>update profile</a></li>
                <li class="nav_item"><a href="#"><i class="fas fa-sign-out-alt nav_icon"></i>logout</a></li>
            </ul><!-- ./nav_links -->
        </aside><!-- ./nav -->
        <div class="main_content">
            <header>
                <div class="container">
                    <div class="header_content">
                        <h2 class="page_title">patient dashboard</h2>
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
                                    <i class="fas fa-user-circle first"></i>
                                    <h3 class="item_num">my profile</h3>
                                    <span class="item_title">update profile</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="content_item">
                                    <i class="fas fa-user-circle sec"></i>
                                    <h3 class="item_num">book appointment</h3>
                                    <span class="item_title">book now</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="content_item">
                                    <i class="fas fa-user-circle third"></i>
                                    <h3 class="item_num">my Appointments</h3>
                                    <span class="item_title">show history</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- ./container -->
        </div><!-- ./main_content -->
    </div><!-- ./content -->
</main>
</body>
</html>
