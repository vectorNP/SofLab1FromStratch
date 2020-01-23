<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}


.top-right {
    position: absolute;
    right: 10px;
    top: 18px;
 }

.links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
 
}
</style>

<script src='https://www.google.com/recaptcha/api.js'></script>
  
  {{-- <script>

    function get_action(form) 
    {
        var v = grecaptcha.getResponse();
        if(v.length == 0)
        {
            document.getElementById('captcha').innerHTML="You can't leave Captcha Code empty";
            return false;
        }
        else
        {
             document.getElementById('captcha').innerHTML="Captcha completed";
            return true; 
        }
    }
    
  </script> --}}

</head>
<body>

  <div class="top-right links">

    <a href="/">Home Page</a>

  </div>

<h2>Login Form</h2>

<form action="userslogin" method="POST">
    @csrf
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <div class="g-recaptcha" id="rcaptcha"  data-sitekey="6Lf489EUAAAAANzwk4BYCaMwbUM1nwZTX5HUxYBm"></div>
    {{-- <span id="captcha" style="color:red" /></span> --}}
        
    <button type="submit">Login</button>
    
    

  </div>


  
</form>

</body>
</html>




