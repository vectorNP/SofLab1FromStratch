<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
<script type="text/javascript" src="https://www.google.com/jsapi">

      // Load the Google Onscreen Keyboard API
      google.load("elements", "1", {
          packages: "keyboard"
      });

      function onLoad() {
        var kbd = new google.elements.keyboard.Keyboard(
          [google.elements.keyboard.LayoutCode.RUSSIAN],
          ['t1']);
      }

      google.setOnLoadCallback(onLoad);


</script>
</head>
<body>

<form action="usersregister" method="POST">
  @csrf
  <div class="container">
    <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
    <hr>


    <div>
        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="name" >
        @error('name')
        <div>{{$message}}</div>
        @enderror
        <br>
    </div>

    {{-- <TODO:>Add date of birts</TODO:> --}}
    <div>
      <label for="date_of_birth"><b>Date of Birth</b></label>
          <input type="date"  name="date_of_birth" >

          @error('date_of_birth')
          <div>{{$message}}</div>
          @enderror
          <br>
      </div>
<br>


    <div>
    <label for="phone_number"><b>Phone Number</b></label>
        <input type="text" placeholder="Enter Phone Number" name="phone_number" 
        autofocus pattern="[0-9]{10}">
        @error('phone_number')
        <div>{{$message}}</div>
        @enderror
        <br>
    </div>

    <div>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" >
        @error('email')
        <div>{{$message}}</div>
        @enderror
        <br>
    </div>


    <div>
        <label for="address"><b>Address</b></label>
        <input type="text" placeholder="Enter Address" name="address"  >
        @error('address')
        <div>{{$message}}</div>
        @enderror
        <br>
    </div>


    <div>
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" >
        @error('password')
        <div>{{$message}}</div>
        @enderror
        <br>
    </div>


    <div>
        <label for="password_confirmation"><b>Repeat Password</b></label>
        <input type="password" placeholder="Confirm Password" name="password_confirmation" >
        @error('password_confirmation')
        <div>{{$message}}</div>
        @enderror
        <br>
    </div>

    <div>
        <label for="profile_image">Profile Image</label>
        <input type="file" name="profile_image"   autofocus
        accept="image/*">
        {{-- @error('profile_image')
        <div>{{$message}}</div>
        @enderror --}}
        <br>
    </div>


    <div>
        <label for="name_devnagri">Devnagri Name</label>
        <input type="text" name="name_devnagri"   autofocus>
        {{-- <textarea id="t1" style="width: 600px; height: 200px;"></textarea>  --}}
        @error('name_devnagri')
        <div>{{$message}}</div>
        @enderror
        <br>
    </div>

    <hr>

    <button type="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login">Sign in</a>.</p>
  </div>
</form>

</body>
</html>
