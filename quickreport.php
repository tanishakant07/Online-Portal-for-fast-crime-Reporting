<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>


<style> 
    input.largerCheckbox { 
        width: 40px; 
        height: 40px; 
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


 
    if (!empty($qr_name) && !empty($qr_phone_no) && !empty($qr_description))
    {
        $qr_name = mysqli_real_escape_string($connection, $qr_name);
        $qr_phone_no = mysqli_real_escape_string($connection, $qr_phone_no);
        $qr_description = mysqli_real_escape_string($connection, $qr_description);


        $query = "SELECT randSalt from users";
        $select_randsalt_query = mysqli_query($connection, $query);

        if(!$select_randsalt_query){

            die('Query FAILED'. mysqli_error($connection));
        }

        $row = mysqli_fetch_array($select_randsalt_query);

        $salt = $row['randSalt'];
        $password = crypt($password, $salt);

        $query = "INSERT INTO quickreports (qr_name, qr_phone_no, qr_description, qr_lat, qr_long, qr_urgency) ";
        $query .= "VALUES('{$qr_name}', '{$qr_phone_no}', '{$qr_description}', '{$qr_lat}', '{$qr_long}', '{$qr_urgency}')";
        $quick_report_query = mysqli_query($connection, $query);

        if(!$quick_report_query){

            die('Query FAILED'. mysqli_error($connection).' '. mysqli_errno($connection));
        }

        $message = "Your report has been registered. We will get back to you shortly. Register within 7 days to view progress.";

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
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">

                <div class="heading">
                    <h1 class="text-center">MEGHALAYA POLICE</h1>
                    <h1 class="text-center">Online Crime Reporting Portal</h1>
                    <h4 class="text-center">Your Safety, Our Responsibility!</h4>
                </div>

                <br>
                <h3>Quick Report</h3>
                <h5>Does not require Login.</h5>
                <br>
                    <form role="form" action="quickreport.php" method="post" id="quickreport-form" autocomplete="off">


                        <h6 class="text-center"> <?php echo $message; ?></h6>


                        <div class="form-group">
                            <label for="qr_name" class="sr-only">Name</label>
                            <input type="text" name="qr_name" id="qr_name" class="form-control" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label for="qr_phone_no" class="sr-only">Contact No</label>
                            <input type="tel" name="qr_phone_no" id="qr_phone_no" class="form-control" placeholder="Contact No" required>
                        </div>
                        <div class="form-group">
                            <label for="qr_description" class="sr-only">Description</label>
                            <textarea class="form-control" name="qr_description" id="" cols="20" rows="10" placeholder="Description of report" required></textarea>
                            
                        </div>
                        <div>
                            <label for="remember_me"></label>
                            <h3><input type="checkbox" name="qr_urgency" class="largerCheckbox" style="margin-bottom:0px" value="Emergency"> Emergency Report</h3>
                        </div>
                        <!-- <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div> -->
                        <div class="form-group">
                            <label for=""></label>
                            <input type="hidden" id="qr_lat" name="qr_lat" value="">
                            <input type="hidden" id="qr_long" name="qr_long" value="">
                            <!-- <input type="button" value="Get Location" onclick="getLocationConstant()" /> -->
                        </div>
                
                        <input type="submit" name="submit" id="" class="btn btn-custom btn-lg btn-block" value="Report Quick Complaint">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
