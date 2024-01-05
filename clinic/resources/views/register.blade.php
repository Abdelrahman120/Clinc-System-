<!DOCTYPE html>
<html lang="en">

<head>
    <title>register</title>
    <link rel="stylesheet" href="register.css">
</head>

<body class="logbg">
    <!-- Start Header -->
    <div class="header">
        <div class="topnav">
          <img class="logo" src="images/capture7.PNG" alt="" />
          <a class="active" href="/register">register</a>
          <a href="/login">login</a>
          <a href="/home">Home</a>
        </div>
      </div>

    <form method="post" action="/register">
        @csrf
        <div class="pay">
            <div class="a">
                <h3>Registration</h3>
                <div class="form-field">
                @if(session('error')) <p class="error">{{ session('error') }}</p> @endif

                    <input type="text" placeholder=" Name"  name="name" value="{{ old('name') }}" required >

                    @error('name') <p class="error">{{ $message }}</p> @enderror

                </div>
                <div class="form-field">
                    <input type="email" placeholder=" Email" name="email"  value="{{ old('email') }}" required>
                    @error('email') <p class="error">{{ $message }}</p> @enderror

                </div>
                <div class="form-field">
                    <input type="password" placeholder=" Password" name="password" required>
                    @error('password') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div class="form-field">
                <input type="password" placeholder="Repeat password" name="password_confirmation" required />
                 </div>

                 <div class="form-field">
                    <input type="phonenumber" placeholder=" phone" name="phone" required>
                </div>

                <div class="form-field">
                    <input type="radio"  value="male" name="gender">Male 
                    <input type="radio"  value="female" name="gender">Female
                </div>

                <div class="form-field">
                    <input type="date" placeholder=" birthdate" name="birthDate" required>
                    
                </div>

                <div class="form-field">
                <button class="btn" type="submit">Register </button>
               </div>
               
                <p> Already have an account? <a href="/login">login</a>.</p>
            </div>

        </div>
    </form>

    <div class="footer">&copy; 2022 All Right Reserved</div>
</body>

</html>