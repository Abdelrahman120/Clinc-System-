<!DOCTYPE html>
<html lang="en">

<head>
    <title>appointment</title>
    <link rel="stylesheet" href="book1.css">
</head>

<body class="logbg">
    <!-- Start Header -->
    <div class="header">
        <div class="topnav">
            <img class="logo" src="images/capture7.PNG" alt="" />
            <!--<a class="active" href="/register">Booking</a>-->

            <a class="active" href="/home">Home</a>
        </div>
    </div>

    <form method="POST" action="/book">
        @csrf
        <div class="reg">
            @if (session('error'))
                <p class="error">{{ session('error') }}</p>
            @endif
            <div class="a">
                <h3>Booking</h3>
                <div class="form-field">
                    <input type="email" required placeholder="Email" name="name" value="{{ Session('email') }}"
                        required /> <!--  *******Edit the name *****-->

                </div>
                @if ($alert = Session::get('alert'))
                    <!-- ******New******* -->
                    <div style="color:red;">{{ $alert }}</div>
                @endif
                <!--<label>Phone Number</label>-->
                <div class="form-field">
                    <input type="text" required placeholder=" Phone number" name="phone"
                        value="{{ Session('phone') }}" required />
                </div>
                @error('phone')
                    <p>{{ $message }}</p>
                @enderror
                <!-- *******New****** -->

                <div class="form-field">

                    <input type="date" placeholder="date" name="date" required />
                </div>
                <div class="form-field">
                    <input type="time" placeholder="time" name="time" required />

                    <!-- <input type="datetime-local" required placeholder="choose time" name="time">
                </div>-->
                    @error('time')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-control">
                    <select  class="option"name="doctor_name" id="doctor_name">
                        <!-- Edit the name -->
                        <option value="Ahmed mahmoud">DR.Ahmed mahmoud</option>
                        <option value="Amr Ahmed">DR.Amr Ahmed</option>
                        <option value="Mahmoud Ibrahim">DR.Mahmoud Ibrahim</option>
                        <option value="Ali Mohamed">DR.Ali Mohamed</option>
                        <option value="Eman Ahmed">DR.Eman Ahmed</option>
                        <option value="Esraa Ali">DR.Esraa Ali</option>
                        <option value="Amir Abdelrahman">DR.Amir Abdelrahman</option>
                    </select>
                </div>
                <div class="form-field">
                    <input type="submit" value="Book Now" class="btn">
                </div>
            </div>
    </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    
    <div class="footer">&copy; 2022 All Right Reserved</div>
</body>

</html>
