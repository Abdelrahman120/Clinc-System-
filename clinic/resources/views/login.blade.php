<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login Page</title>
  <link rel="stylesheet" href="login.css">
</head>

<body class="logbg">

  <!-- End Header -->
  <div class="header">
    <div class="topnav">
      <img class="logo" src="images/capture7.PNG" alt="" />
      <a href="/register">register</a>
      <a class="active" href="./login.html">login</a>
      <a href="/home">Home</a>
    </div>
  </div>

  <div id="bg"></div>

    <form method="post" action="/Dologin">
      @csrf
      
        <div class="form-field">
        @error('name') <p class="error" color="red">{{ $message }}</p> @enderror
          <input type="email" placeholder="Email / Username" name=" email" required value="{{ old('email') }}" />
          
        </div>
        <div class="form-field">
          <input type="password" placeholder="Password" name=" password" required />
          @error('password') <p class="error" > {{ $message }}</p> @enderror
        </div>
        @if(session('error')) <p class="error">{{ session('error') }}</p> @endif
        <div class="form-field">
          <button class="btn" type="submit">login </button>
        </div>
      </div>
     
    </form>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   <!-- <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>-->
    <div class="footer">&copy; 2022  All Right Reserved</div>

</body>
</html>