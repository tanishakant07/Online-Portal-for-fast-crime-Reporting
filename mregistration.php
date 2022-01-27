<?php  include "includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/blog-home.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/stylesheet/main.css">


    <title>Home</title>

    

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
            <a class="active" href="mregistration.php">Register</a>
            <a href="mquickreport.php">Quick Report</a>
        </nav>

    </header>
</div>
 
<?php 

if (isset($_POST['submit'])) {
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    if (!empty($username) && !empty($email) && !empty($password))
    {
        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);


        $query = "SELECT randSalt from users";
        $select_randsalt_query = mysqli_query($connection, $query);

        if(!$select_randsalt_query){

            die('Query FAILED'. mysqli_error($connection));
        }

        $row = mysqli_fetch_array($select_randsalt_query);

        // $salt = $row['randSalt'];
        // $password = crypt($password, $salt);

        $query = "INSERT INTO users (username, user_email, user_password) ";
        $query .= "VALUES('{$username}', '{$email}', '{$password}')";
        $register_user_query = mysqli_query($connection, $query);

        if(!$register_user_query){

            die('Query FAILED'. mysqli_error($connection).' '. mysqli_errno($connection));
        }

        $message = "Your registration is successful.";

    }
    else{
        echo "<script>alert('Fields cannot be empty!')</script>";
    }
}

else{

    $message = "";
}
?> 


    <!-- Navigation -->
    
    <!-- <?php  //include "includes/navigation.php"; ?> -->
    
 
    <!-- Page Content -->
<div class="container">
    
<!-- <section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
            
                <br>
                <h3>Register</h3>
                    <form role="form" action="mregistration.php" method="post" id="login-form" autocomplete="off">


                        <h6 class="text-center"> <?php echo $message; ?></h6>


                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> 
        </div> 
    </div> 
</section>
 -->




<!--Sections-->
<div class = "container2">
<section class="grid">

    <section>
        <h1>Register</h1>
                    <form role="form" action="mregistration.php" method="post" id="login-form" autocomplete="off">


                        <h6 class="text-center"> <?php echo $message; ?></h6>
                        <br>

                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary" value="Submit">
                    </form>
    </section>

    <section class="teaser col-1-2">

        
    </section>

</section>
</div>

        <br>
        <br>
        <hr>



<?php include "includes/footer.php";?>
