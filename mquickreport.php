<?php  include "includes/db.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


     <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/stylesheet/main.css">

    <title>Quick Report</title>

  </head>
<style type="text/css">
    /* Glowing Text for QUICK REPORT */
.glow {
    font-size: 80px;
    color: #fff;
    text-align: center;
    -webkit-animation: glow 1s ease-in-out infinite alternate;
    -moz-animation: glow 1s ease-in-out infinite alternate;
    animation: glow 1s ease-in-out infinite alternate;
  }
</style>



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
            <a href="signup.php">Sign Up</a>
            <a href="mquickreport.php" class="active_quick glow">Quick Report</a>

            
        </nav>
    </header>
</div>



<style> 
    input.largerCheckbox { 
        width: 35px; 
        height: 35px; 
    } 
</style>  

<!-- script to trace geolocation and place values in the form -->
 <script type="text/javascript">
    function getLocationConstant() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(onGeoSuccess, onGeoError);
        } else {
            alert("Your browser or device doesn't support Geolocation");
        }
    }

    
    // If we have a successful location update
    function onGeoSuccess(event) {
        document.getElementById("qr_lat").value = event.coords.latitude;
        document.getElementById("qr_long").value = event.coords.longitude;
        //document.getElementById("Position1").value = event.coords.latitude + ", " + event.coords.longitude;
    }


    // If something has gone wrong with the geolocation request
    function onGeoError(event) {
        alert("Error: Allow location access! ");
        //alert("Error code " + event.code + ". " + event.message);
    }
    getLocationConstant()

</script>


<?php 

if (isset($_POST['submit'])) {
    
    $qr_name = $_POST['qr_name'];
    $qr_phone_no = $_POST['qr_phone_no'];
    $qr_description = $_POST['qr_description'];
    $qr_lat = $_POST['qr_lat'];
    $qr_long = $_POST['qr_long'];
    
    $qr_urgency = $_POST['qr_urgency'];

    if ($qr_urgency <> 'Emergency') {
        $qr_urgency = 'not_urgent';
    }


 
    if (!empty($qr_name) && !empty($qr_phone_no) && !empty($qr_description))
    {
        $qr_name = mysqli_real_escape_string($connection, $qr_name);
        $qr_phone_no = mysqli_real_escape_string($connection, $qr_phone_no);
        $qr_description = mysqli_real_escape_string($connection, $qr_description);


        $query = "INSERT INTO quickreports (qr_name, qr_phone_no, qr_description, qr_lat, qr_long, qr_urgency) ";
        $query .= "VALUES('{$qr_name}', '{$qr_phone_no}', '{$qr_description}', '{$qr_lat}', '{$qr_long}', '{$qr_urgency}')";
        $quick_report_query = mysqli_query($connection, $query);

        if(!$quick_report_query){

            die('Query FAILED'. mysqli_error($connection).' '. mysqli_errno($connection));
        }

        
        $the_quickreport_id = mysqli_insert_id($connection);

        $message = "Your report has been registered. We will get back to you shortly. Register within 7 days to view progress. <br> You Unique Reference Number (URN): URN/ $the_quickreport_id";

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
    <div>

<!-- <div class = "container2">
<section>
 
<h1>Quick Report</h1>
<h5>Does not require Login.</h5>
<br>
    <form role="form" action="mquickreport.php" method="post" autocomplete="off">

    </form>
</section>
</div> -->




<div class = "container2">
    <section>
    
        <form action="mquickreport.php" method="post" style="border:1px solid #ccc" autocomplete="off"> 
            <div class="formcontainer">
                <h1 style="text-align: center; color: red;">QUICK REPORT</h1>
                <p style="text-align: center; color: red; font-weight: bold;"> QUICK REPORT SHOULD BE VERIFIED AND COMPLETED WITHIN 7 DAYS</p>
                <hr> 
                
                <p style="font-weight: lighter; color: red;">NOTE: Quick Report does not require log in</p>





                <h6 class="text-center"> <?php echo $message;?></h6>


                <div class="form-group">
                    <label for="qr_name" class=""> Full Name</label>
                    <input type="text" name="qr_name" id="qr_name" class="input" placeholder="Enter Full Name" required>
                </div>
                <div class="form-group">
                    <label for="qr_phone_no" class="">Contact No</label>
                    <input type="tel" name="qr_phone_no" id="qr_phone_no" class="input" placeholder="Enter Valid Contact No" required>
                </div>
                <div class="form-group">
                    <label for="qr_description" class="">Description</label>
                    <textarea class="input" name="qr_description" id="" cols="20" rows="10" placeholder="Description of report: Give accurate details like name(s), person(s), location, danger, etc." required></textarea>
                    
                </div>
                <div>
                    <label for="remember_me">
                    <h2><input type="checkbox" name="qr_urgency" class="largerCheckbox" style="margin-bottom:0px" value="Emergency"> Emergency Report </h2></label>
                </div>

                <div>
                    <input type="checkbox" name="remember" style="margin-bottom:15px; color: red;"> I agree that the information provided by me is correct.<br>
                </div>

                <div class="form-group">
                    <label for=""></label>
                    <input type="hidden" id="qr_lat" name="qr_lat" value="">
                    <input type="hidden" id="qr_long" name="qr_long" value="">
                    <!-- <input type="button" value="Get Location" onclick="getLocationConstant()" /> -->
                </div>


                <input type="submit" name="submit" id="" class="btn btn-primary" value="Report Quick Complaint">




                <!-- <label for="contact" ><b>Full Name</b></label>
                <input type="text" class="input" placeholder="Enter your Full Name" name="name" required>
      
                <label for="contact" ><b>Phone Number</b></label>
                <input type="number" class="input" placeholder="Enter Your Valid Contact Number" name="contact" required>

                <label for="location"><b>Location</b></label>
                <input type="text" class="input" placeholder="Enter your location" name="location" required>

               
                <br><br>
                <input type="checkbox" name="remember" style="margin-bottom:15px; color: red;"> I agree that the information provided by me is correct and this is a case of emergency.<br>
                <br>
                <div class="clearfix">
                    <button type="button" class="cancelbtn">Cancel</button>
                    <button type="submit" name="login" class="signupbtn">Submit</button><br> -->
                    <br><br>
                </div>
            </div>
      </form>
    </section>
</div>


        <br>
        <br>
        <hr>



<?php include "includes/footer.php";?>
