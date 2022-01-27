<?php include "includes/user_header.php"?>

<?php
if(isset($_SESSION['username'])){

    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}'";

    $select_user_profile_query = mysqli_query ($connection, $query);

    while ($row = mysqli_fetch_array($select_user_profile_query)){

        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
         
    }

    // $query = "SELECT * FROM userdetails WHERE username = '{$username}'";

    // $select_userdetails_query = mysqli_query ($connection, $query);

    // while ($row = mysqli_fetch_array($select_userdetails_query)){

    //     $user_id = $row['user_id'];
    //     $username = $row['username'];
    //     $user_password = $row['user_password'];
    //     // $user_firstname = $row['user_firstname'];
    //     // $user_lastname = $row['user_lastname'];
    //     $user_email = $row['user_email'];
    //     $user_image = $row['user_image'];
    //     $user_role = $row['user_role'];
        
    //     $user_fullname = $row['user_fullname'];
    //     $user_gender = $row['user_gender'];
    //     $user_dob = $row['user_dob'];
    //     $user_contactno = $row['user_contactno'];
    //     $user_email = $row['user_email'];
    //     $user_idtype = $row['user_idtype'];
    //     $user_idno = $row['user_idno'];
    //     $user_houseno = $row['user_houseno'];
    //     $user_street = $row['user_street'];
    //     $user_area = $row['user_area'];
    //     $user_block = $row['user_block'];
    //     $user_city = $row['user_city'];
    //     $user_state = $row['user_state'];
    //     $user_district = $row['user_district'];
    //     $user_polstation = $row['user_polstation'];
    //     $user_pincode = $row['user_pincode'];
        
    // } 


}


?>

    <div id="wrapper">


        <!-- Navigation -->
        <?php include "includes/user_navigation.php"?>
       

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <h1 class="page-header">
                            Welcome <small><?php echo $_SESSION['username'] ?></small>
                        </h1>


<?php  
if(isset($_POST['update_user'])){

        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        // $user_image = $_FILES['image']['name'];
        // $user_image_temp = $_FILES['image']['tmp_name'];

        //move_uploaded_file($user_image_temp, "../images/$user_image");

        // if (empty($user_image)){
            
        //  $query = "SELECT * FROM users WHERE user_id = $the_user_id";
        //  $select_image = mysqli_query($connection, $query);
            
        //  while ($row = mysqli_fetch_assoc($select_image)){

        //      $user_image = $row['user_image'];
        //  }
                
        // }

        $query = "UPDATE users SET ";
        $query .="user_firstname = '{$user_firstname}', ";
        $query .="user_lastname = '{$user_lastname}', ";
        $query .="user_role = 'User', ";
        $query .="username = '{$username}', ";
        $query .="user_email = '{$user_email}', ";
        $query .="user_password = '{$user_password}' ";
        //$query .="user_image = '{$user_image}' ";
        $query .="WHERE username = '{$username}' ";


        $update_profile_query = mysqli_query($connection, $query);
        confirmQuery ($update_profile_query);

        echo "<p class='bg-success'>Profile Updated. <a href='index.php'>Go back to Dashboard</a></p>";

}

?>






<?php  
// if(isset($_POST['add_userdetails'])){


//       $user_det_id = $user_id;
//       $username = $_POST['username'];
//       $user_password = $_POST['user_password'];

//       $user_firstname = $_POST['user_firstname'];
//       $user_lastname = $_POST['user_lastname'];
      
//       $user_fullname = $_POST['user_fullname'];
//       $user_gender = $_POST['user_gender'];
//       $user_dob = $_POST['user_dob'];
//       $user_contactno = $_POST['user_contactno'];
//       $user_email = $_POST['user_email'];
//       $user_idtype = $_POST['user_idtype'];
//       $user_idno = $_POST['user_idno'];
//       $user_houseno = $_POST['user_houseno'];
//       $user_street = $_POST['user_street'];
//       $user_area = $_POST['user_area'];
//       $user_block = $_POST['user_block'];
//       $user_city = $_POST['user_city'];
//       $user_state = $_POST['user_state'];
//       $user_district = $_POST['user_district'];
//       $user_polstation = $_POST['user_polstation'];
//       $user_pincode = $_POST['user_pincode'];
    
//     $query = "INSERT INTO userdetails (user_id, username, user_password, user_fullname, user_gender, user_dob, user_contactno, user_email, user_idtype, user_idno, user_houseno, user_street, user_area, user_block, user_city, user_state, user_district, user_polstation, user_pincode)";

//     $query .= "VALUES ('{$user_det_id}', '{$username}', '{$user_password}', '{$user_fullname}', '{$user_gender}', '{$user_dob}', '{$user_contactno}','{$user_email}','{$user_idtype}','{$user_idno}','{$user_houseno}','{$user_street}','{$user_area}','{$user_block}','{$user_city}','{$user_state}','{$user_district}','{$user_polstation}','{$user_pincode}' )";

//       $add_userdetails_query = mysqli_query($connection, $query);
//       confirmQuery ($add_userdetails_query);

//       echo "<p class='bg-success'>Details Updated. <a href='index.php'>Go back to Dashboard</a></p>";

//}

?>


 <?php //if(isset($_POST['update_userdetails'])){

//       $user_det_id = '$user_id';
//       $username = $_POST['username'];
//       $user_password = $_POST['user_password'];

//       $user_firstname = $_POST['user_firstname'];
//       $user_lastname = $_POST['user_lastname'];
      
//       $user_fullname = $_POST['user_fullname'];
//       $user_gender = $_POST['user_gender'];
//       $user_dob = $_POST['user_dob'];
//       $user_contactno = $_POST['user_contactno'];
//       $user_email = $_POST['user_email'];
//       $user_idtype = $_POST['user_idtype'];
//       $user_idno = $_POST['user_idno'];
//       $user_houseno = $_POST['user_houseno'];
//       $user_street = $_POST['user_street'];
//       $user_area = $_POST['user_area'];
//       $user_block = $_POST['user_block'];
//       $user_city = $_POST['user_city'];
//       $user_state = $_POST['user_state'];
//       $user_district = $_POST['user_district'];
//       $user_polstation = $_POST['user_polstation'];
//       $user_pincode = $_POST['user_pincode'];
      

//       $query = "UPDATE userdetails SET ";
      
//       //$query .="user_id = '{$user_det_id}', ";
//       $query .="username = '{$username}', ";
//       $query .="user_password = '{$user_password}', ";

//       //$query .="user_firstname = '{$user_firstname}', ";
//       //$query .="user_lastname = '{$user_lastname}', ";

//       $query .="user_fullname = '{$user_fullname}', ";
//       $query .="user_gender = '{$user_gender}', ";
//       $query .="user_dob = '{$user_dob}', ";
//       $query .="user_contactno = '{$user_contactno}', ";
//       $query .="user_email = '{$user_email}', ";
//       $query .="user_idtype = '{$user_idtype}', ";
//       $query .="user_idno = '{$user_idno}', ";
//       $query .="user_houseno = '{$user_houseno}', ";
//       $query .="user_street = '{$user_street}', ";
//       $query .="user_area = '{$user_area}', ";
//       $query .="user_block = '{$user_block}', ";
//       $query .="user_city = '{$user_city}', ";
//       $query .="user_state = '{$user_state}', ";
//       $query .="user_district = '{$user_district}', ";
//       $query .="user_polstation = '{$user_polstation}', ";
//       $query .="user_pincode = '{$user_pincode}' ";
      
//       $query .="WHERE user_id = '{$user_det_id}' ";


//       $update_userdetails_query = mysqli_query($connection, $query);
//       confirmQuery ($update_userdetails_query);

//       echo "<p class='bg-success'>Profile Updated. <a href='index.php'>Go back to Dashboard</a></p>";

//}

?>


<form action="" method="post" enctype="multipart/form-data" class="">
    
    
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input value="<?php echo $user_firstname; ?>" type="text" class ="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input value="<?php echo $user_lastname; ?>" type="text" class ="form-control" name="user_lastname">
    </div>

    <!-- <div class="form-group">
        <label for="user_role">Permissions  </label>
        <select name="user_role" id="">
            <option value="Subscriber"><?php echo $user_role; ?></option>
            <?php

                // if ($user_role == 'Admin')
                //     echo "<option value='Subscriber'>Subscriber</option>";
                // else
                //     echo "<option value='Admin'>Admin</option>";
            ?>
        </select>
    </div> -->

    <div class="form-group">
        <label for="username">Username</label>
        <input style="cursor: not-allowed;" type="text" class ="form-control" name="complaint_reporter" value="<?php echo $_SESSION['username'] ?>" disabled>
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email" >
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input value="<?php echo $user_password; ?>" type="password" class="form-control" name="user_password" >
    </div>


    <input class="btn btn-primary" type="submit" name="update_user" value="Update Profile ">

</form>
<br>
<br>

<!-- <form action="" method="post" enctype="multipart/form-data" style="border:1px solid #ccc; padding: 30px">
    
    <div class="formcontainer">
      <hr>
    
        <div class="form-group">
            <label for="name"><b>Name</b></label>
            <input type="text" class="form-control" placeholder="Full Name" name="user_fullname" value="<?php echo $user_fullname; ?>" required>
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
            <input type="date" class="form-control" name="user_dob" value="<?php echo $user_dob; ?>" required>
        </div>
        <br>

        <div class="form-group">
          <label for="contact" ><b>Phone Number</b></label>
          <input type="number" class="form-control" placeholder="Contact Number" name="user_contactno" value="<?php echo $user_contactno; ?>" required>
        </div>
        <br>            
    
        <div class="form-group">
          <label for="email"><b>Email ID</b></label>
          <input type="email" class="form-control" placeholder="Email ID" name="user_email" value="<?php echo $user_email; ?>" required>
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
          <input type="text number" class="form-control" placeholder="Enter your ID Number" name="user_idno" value="<?php echo $user_idno; ?>" required>
        </div>
        <br>

        <div class="form-group">
          <label for="houseno"><b>House Number</b></label>
          <input type="text number" class="form-control" placeholder="House Number" name="user_houseno" value="<?php echo $user_houseno; ?>" required>
        </div>
        <br>

        <div class="form-group">
          <label for="street"><b>Street Name</b></label>
          <input type="text number" class="form-control" placeholder="Street Name" name="user_street" value="<?php echo $user_street; ?>" required>
        </div>
        <br>

        <div class="form-group">
          <label for="area"><b>Colony/Locality/Area</b></label>
          <input type="text number" class="form-control" placeholder="Colony/Locality/Area" name="user_area" value="<?php echo $user_area; ?>" required>
        </div>
        <br>


        <div class="form-group">
          <label for="block"><b>Tehsil/Block/Mandal</b></label>
          <input type="text" class="form-control" placeholder="Tehsil/Block/Mandal" name="user_block" value="<?php echo $user_block; ?>" required>
        </div>
        <br>


        <div class="form-group">
          <label for="city"><b>Village/Town/City</b></label>
          <input type="text number" class="form-control" placeholder="Village/Town/City" name="user_city" value="<?php echo $user_city; ?>" required>
        </div>
        <br>
    

 -->        <!-- <div class="form-group">
          <label for="country"><b>Country</b></label>
          <input type="text" class="form-control" placeholder="Country" name="user_country" required>
        </div><br> -->
<!-- 
        <div class="form-group">
          <label for="state"><b>State</b></label>
          <input type="text" class="form-control" placeholder="State" name="user_state" value="<?php echo $user_state; ?>" required>
        </div><br>

        <div class="form-group">
          <label for="district"><b>District</b></label>
          <input type="text" class="form-control" placeholder="District" name="user_district" value="<?php echo $user_district; ?>" required>
          </div><br>

        <div class="form-group">
          <label for="station"><b>Police Station</b></label>
          <input type="text number" class="form-control" placeholder="Police Station" name="user_polstation" value="<?php echo $user_polstation; ?>" required>
          </div><br>

        <div>
          <label for="pincode"><b>Pincode</b></label>
          <input type="number" class="form-control" placeholder="Pincode" name="user_pincode" value="<?php echo $user_pincode; ?>" required>
          </div><br>

        <div class="form-group">
          <label for="psw" ><b>Password</b></label>
          <input type="password" class="form-control" placeholder="Enter Password" name="user_password" value="<?php echo $user_password; ?>" required>
        </div><br>
 -->
        <!-- <div class="form-group">
          <label for="psw-repeat" ><b>Repeat Password</b></label>
          <input type="password" class="form-control" placeholder="Repeat Password" name="psw_repeat" required>
        </div><br> -->
  
    <!-- <div>
        <label for="remember_me"></label>
        <input type="checkbox" name="remember" style="margin-bottom:15px"> Remember me
    </div> -->


    <!-- <div>
      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
    </div> -->

<!--
          <div class="form-group">
             <input type="reset" class="">
            <button type="button" class="cancelbtn" name="cancel">Cancel</button>
            <button type="submit" class="signupbtn" name="add_userdetails">Submit</button>
          </div> -->
        
        <!-- <input class="btn btn-primary" type="submit" name="update_userdetails" value="Update Profile"> 

    </div>
</form>
  -->
 
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/user_footer.php"?>