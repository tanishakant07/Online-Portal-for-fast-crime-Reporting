<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SignIn</title>

    <link rel="stylesheet" href="assets/stylesheet/main.css">

  </head>

  <body>

   <!--HEADER-->
<div class="group2">
    <header class="container group">
        <div id="logo">
            <a href="home.php">
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
            <a href="signin.php" class="active">Sign In</a>
            <a href="signup.php">Sign Up</a>
            <a href="mquickreport.php" style="color: red;" class="glow">Quick Report</a>
        </nav>

    </header>

</div>

<div class = "container2">

<section>

  <span class="input-group-btn"> 
    <button class="btn btn-primary" name="quick_report" class="quickbtn"><a href= quick.html> IS IT AN EMERGENCY? &ensp; CLICK HERE FOR QUICK REPORT</a></button>
</span>

  <form action="includes/login.php" method="post" style="border:1px solid #ccc">
    <div class="formcontainer">
      <h1 style="text-align: center;">Log In</h1>
      <p>Please fill in this form to sign in to your profile.</p>
      <hr> 
  
      <label for="contact" ><b>Username</b></label>
      <input type="text" class="input" placeholder="Enter Username" name="username" required>
  
      <label for="psw" ><b>Password</b></label>
      <input type="password" class="input" placeholder="Enter Password" name="password" required>
  
     <label>
        <input type="checkbox" name="remember" style="margin-bottom:15px"> Remember me<br>
       <!--   <input type="reset" class="reset"> -->
      </label>
  
      <div class="clearfix">
        <button type="button" class="cancelbtn">Cancel</button>
        <button type="submit" name="login" class="signupbtn">Log In</button><br>

        <br>
        <a href="signup.php" style="color: blue;">New User? Sign Up here.</a> 
        <br>

      </div>
    </div>
  </form>
</section>



</div>
</body>