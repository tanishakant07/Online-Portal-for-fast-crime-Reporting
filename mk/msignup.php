<?php include "db.php";?>
<?php include "functions.php";?>

<?php createRows(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SignUp</title>

    <link rel="stylesheet" href="assets/stylesheet/main.css">

  </head>


<body>

<div class="group2">
    <header class="container group">
        <div id="logo">
            <a href="home.html">
                <img src="mlp.jpg" height="200" width="200" />
            </a>
        </div>

        <div class="heading">
            <h1 class="text-center">MEGHALAYA POLICE</h1>
            <h1 class="text-center">Online Crime Reporting Portal</h1>
            <h4 class="text-center">Your Safety, Our Responsibility!</h4>
        </div>

        <nav class="nav primary-nav">
            <a href="home.html">Home </a>
            <a href="helpline.html">Helpline </a>  
            <a href="statistics.html">Statistics </a>
            <a href="contact.html">Contact Us</a>
            <a href="guide.html">User Guide</a>
            <a href="signin.html">Sign In</a>
        </nav>



    </header>
</div>


<div class ="container">

	<div class = "col-sm-6">
		
		<form action="msignup.php" method="post" style="border:2px solid #ccc">
			
			<div class="formcontainer">
	      	</div>
			<h1>Sign Up</h1>
		      <p>Please fill in this form to sign up.</p>
		      <hr>
		    
		      <label for="name"><b>Name</b></label>
		      <input type="text" class="input" placeholder="Full Name" name="name" required><br>

		      <label><b>Gender</b></label>
		      <select class="input" name="gender">
		      <option value="male">Male</option>
		      <option value="female">Female</option>
		      <option value="other">Other</option>
		      </select><br>

		      <label for="dob"><b>Date of Birth</b></label>
		      <input type="date" class="input" name="dob" required><br>

		      <label for="contact" ><b>Phone Number</b></label>
		      <input type="number" class="input" placeholder="Contact Number" name="contact" required><br>		      

		      <label for="email"><b>Email ID</b></label>
		      <input type="email" class="input" placeholder="Email ID" name="email" required><br>		      

		      <label for="idtype"><b>ID Type</b></label>
		      <select class="input" name="idtype" required>
		        <option value="aadhar">Aadhar Card</option>
		        <option value="voter">Voter ID</option>
		        <option value="pan">PAN Card</option>
		        <option value="driving">Driving License</option>
		        <option value="passport">Passport</option>
		      </select><br>

		      <label for="idno"><b>ID Number</b></label>
		      <input type="text number" class="input" placeholder="Enter your ID Number" name="idno" required><br>

		      <label for="houseno"><b>House Number</b></label>
		      <input type="text number" class="input" placeholder="House Number" name="houseno" required><br>

		      <label for="street"><b>Street Name</b></label>
		      <input type="text number" class="input" placeholder="Street Name" name="street" required><br>

		      <label for="area"><b>Colony/Locality/Area</b></label>
		      <input type="text number" class="input" placeholder="Colony/Locality/Area" name="area" required><br>

		      <label for="city"><b>Village/Town/City</b></label>
		      <input type="text number" class="input" placeholder="Village/Town/City" name="city" required><br>

		      <label for="block"><b>Tehsil/Block/Mandal</b></label>
		      <input type="text" class="input" placeholder="Tehsil/Block/Mandal" name="block" required><br>

		      <label for="country"><b>Country</b></label>
		      <input type="text" class="input" placeholder="Country" name="country" required><br>

		      <label for="state"><b>State</b></label>
		      <input type="text" class="input" placeholder="State" name="state" required><br>

		      <label for="district"><b>District</b></label>
		      <input type="text" class="input" placeholder="District" name="district" required><br>

		      <label for="station"><b>Police Station</b></label>
		      <input type="text number" class="input" placeholder="Police Station" name="polstation" required><br>

		      <label for="pincode"><b>Pincode</b></label>
		      <input type="number" class="input" placeholder="Pincode" name="pincode" required><br>

		      <label for="psw" ><b>Password</b></label>
		      <input type="password" class="input" placeholder="Enter Password" name="psw" required><br>
		  
		      <label for="psw-repeat" ><b>Repeat Password</b></label>
		      <input type="password" class="input" placeholder="Repeat Password" name="psw_repeat" required><br>
		  
		      <label>
		        <input type="checkbox" name="remember" style="margin-bottom:15px"> Remember me
		        <input type="reset" class="reset">
		      </label>
		  
		      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

		      <div class="form-group">
		        <button type="button" class="cancelbtn" name="cancel">Cancel</button>
		        <button type="submit" class="signupbtn" name="submit">Sign Up</button>
		      </div>
		    

		    	<input class="btn btn-primary" type="submit" name="submit" value="Signup to Login">	
  		</form>


			<!-- <div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" class ="form-control">
			</div>
				
				 <div class="clearfix">

			<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" class ="form-control">
			</div>

			<input class="btn btn-primary" type="submit" name="submit" value="CREATE">-->
	</div>
</div>

</body>
</html>


