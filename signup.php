<?php include "includes/db.php"; ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Sign Up</title>

    <link rel="stylesheet" href="assets/stylesheet/main.css">

    <script>
      function myFunction() {
        var otp = prompt("Please enter the OTP");
        if (person != null) {
          window.open("####");
        }
        document.getElementById("demo").innerHTML = txt;
      }
  </script>

  </head>
 
  <body>

   <!--HEADER-->
<div class="group2">
    <header class="container group">
        <div id="logo">
            <a href="home.html">
                <img src="mlp.jpg"/>
            </a>
        </div>
<br>
        <div class="heading">
            <h1>MEGHALAYA POLICE,</h1>
            <h1>Online Crime Reporting Portal</h1>
            <h3 class="tagline">Your Safety, Our Responsibility!</h3>
        </div>

        <nav class="nav primary-nav">
            <a href="home.php"><i class="fa fa-home"></i> Home </a>
            <a href="helpline.php">Helpline </a>  
            <a href="statistics.php">Statistics </a>
            <a href="contact.php">Contact Us</a>
            <a href="guide.php">User Guide</a>
            <a href="prevention.php">Prevention</a>
            <a href="signin.php">Sign In</a>
            <a href="signup.php" class="active">Sign Up</a>
            <a href="mquickreport.php" style="color: red;"  class="glow">Quick Report</a>
        </nav>



    </header>
</div>

<div class = "container2">
<section>


<span class="input-group-btn"> 
    <button class="btn btn-primary" name="quick_report" class="quickbtn"><a href= quick.html> IS IT AN EMERGENCY? &ensp; CLICK HERE FOR QUICK REPORT</a></button>
</span>


<?php  
if(isset($_POST['add_userdetails'])){


      //$user_det_id = $user_id;
      $username = $_POST['username'];
      $user_password = $_POST['user_password'];

      // $user_firstname = $_POST['user_firstname'];
      // $user_lastname = $_POST['user_lastname'];
      
      $user_fullname = $_POST['user_fullname'];
      $user_gender = $_POST['user_gender'];
      $user_dob = $_POST['user_dob'];
      $user_contactno = $_POST['user_contactno'];
      $user_email = $_POST['user_email'];
      $user_idtype = $_POST['user_idtype'];
      $user_idno = $_POST['user_idno'];
      $user_houseno = $_POST['user_houseno'];
      $user_street = $_POST['user_street'];
      $user_area = $_POST['user_area'];
      $user_block = $_POST['user_block'];
      $user_city = $_POST['user_city'];
      $user_state = $_POST['user_state'];
      $user_district = $_POST['user_district'];
      $user_polstation = $_POST['user_polstation'];
      $user_pincode = $_POST['user_pincode'];
    
    $query = "INSERT INTO userdetails (user_id, username, user_password, user_fullname, user_gender, user_dob, user_contactno, user_email, user_idtype, user_idno, user_houseno, user_street, user_area, user_block, user_city, user_state, user_district, user_polstation, user_pincode)";

    $query .= "VALUES ('{$user_det_id}', '{$username}', '{$user_password}', '{$user_fullname}', '{$user_gender}', '{$user_dob}', '{$user_contactno}','{$user_email}','{$user_idtype}','{$user_idno}','{$user_houseno}','{$user_street}','{$user_area}','{$user_block}','{$user_city}','{$user_state}','{$user_district}','{$user_polstation}','{$user_pincode}' )";

      $add_userdetails_query = mysqli_query($connection, $query);
      confirmQuery ($add_userdetails_query);

      echo "<p class='bg-success'>Details Updated. <a href='index.php'>Go back to Dashboard</a></p>";

}

?>



<form action="" style="border:1px solid #ccc">
    <div class="formcontainer">
      <h1 style="text-align: center;">Sign Up</h1>
      <p>Please fill in this form to create your account. <br><br> <a href="signin.php" style="color: blue; font-weight: lighter; font-size: smaller;">Already have an account? Click here to Log In</a> </p>
      <hr>


        <div class="form-group">
            <label for="name"><b>Name</b></label>
            <input type="text" class="form-control" placeholder="Full Name" name="user_fullname" required>
        </div>
        <br>

        <div class="form-group">
          <label><b>Gender</b></label>
          <select class="form-control" name="user_gender">
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
          </select>
        </div>
        <br>


        <div class="form-group">
            <label for="dob"><b>Date of Birth</b></label>
            <input type="date" class="form-control" name="user_dob" value="" required>
        </div>
        <br>

        <div class="form-group">
          <label for="contact" ><b>Phone Number</b></label>
          <input type="number" class="form-control" placeholder="Contact Number" name="user_contactno" value="" required>
          <button onclick="myFunction()">Generate OTP</button>
        </div>
        <br>            
    
        <div class="form-group">
          <label for="email"><b>Email ID</b></label>
          <input type="email" class="form-control" placeholder="Email ID" name="user_email" value="" required>
        </div>
        <br>             

        <div class="form-group">
          <label for="idtype"><b>ID Type</b></label>
          <select class="form-control" name="user_idtype" required>
            <option value="aadhar">Aadhar Card</option>
            <option value="voter">Voter ID</option>
            <option value="pan">PAN Card</option>
            <option value="driving">Driving License</option>
            <option value="passport">Passport</option>
          </select>
        </div>
        <br>

        <div class="form-group"> 
          <label for="idno"><b>ID Number</b></label>
          <input type="text number" class="form-control" placeholder="Enter your ID Number" name="user_idno" value="" required>
        </div>
        <br>

        <div class="form-group">
          <label for="houseno"><b>House Number</b></label>
          <input type="text number" class="form-control" placeholder="House Number" name="user_houseno" value="" required>
        </div>
        <br>

        <div class="form-group">
          <label for="street"><b>Street Name</b></label>
          <input type="text number" class="form-control" placeholder="Street Name" name="user_street" value="" required>
        </div>
        <br>

        <div class="form-group">
          <label for="area"><b>Colony/Locality/Area</b></label>
          <input type="text number" class="form-control" placeholder="Colony/Locality/Area" name="user_area" value="" required>
        </div>
        <br>


        <div class="form-group">
          <label for="block"><b>Tehsil/Block/Mandal</b></label>
          <input type="text" class="form-control" placeholder="Tehsil/Block/Mandal" name="user_block" value="" required>
        </div>
        <br>


        <div class="form-group">
          <label for="city"><b>Village/Town/City</b></label>
          <input type="text number" class="form-control" placeholder="Village/Town/City" name="user_city" value="" required>
        </div>
        <br>
    

        <!-- <div class="form-group">
          <label for="country"><b>Country</b></label>
          <input type="text" class="form-control" placeholder="Country" name="user_country" required>
        </div><br> -->

        <div class="form-group">
          <label for="state"><b>State</b></label>
          <input type="text" class="form-control" placeholder="State" name="user_state" value="" required>
        </div><br>

        <div class="form-group">
          <label for="district"><b>District</b></label>
          <input type="text" class="form-control" placeholder="District" name="user_district" value="" required>
          </div><br>

        <div class="form-group">
          <label for="station"><b>Police Station</b></label>
          <input type="text number" class="form-control" placeholder="Police Station" name="user_polstation" value="" required>
          </div><br>

        <div>
          <label for="pincode"><b>Pincode</b></label>
          <input type="number" class="form-control" placeholder="Pincode" name="user_pincode" value="" required>
          </div><br>

          <div>
          <label for="username"><b>Username</b></label>
          <input type="text" class="form-control" placeholder="Username" name="username" value="" required>
          </div><br>

        <div class="form-group">
          <label for="psw" ><b>Password</b></label>
          <input type="password" class="form-control" placeholder="Enter Password" name="user_password" value="" required>
        </div><br>

        <div class="form-group">
          <label for="psw-repeat" ><b>Repeat Password</b></label>
          <input type="password" class="form-control" placeholder="Repeat Password" name="psw_repeat" required>
        </div><br>
  
    <div>
        <label for="remember_me"></label>
        <input type="checkbox" name="remember" style="margin-bottom:15px"> Remember me
    </div>


    <div>
      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
    </div>


          <!-- <div class="form-group">
            <input type="reset" class="">
            <br>
            <button type="button" class="cancelbtn" name="cancel">Cancel</button>
            <button type="submit" class="signupbtn" name="add_userdetails">Submit</button>
          </div> -->
        
        <input class="btn btn-primary" type="submit" name="add_userdetails" value="Sign Up"> 

    </div>
</form>

</section>
</div>
  </body>

</html>
