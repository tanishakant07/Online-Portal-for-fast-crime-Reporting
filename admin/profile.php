<?php include "includes/admin_header.php"?>

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
}

?> 


    <div id="wrapper">


        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>
       

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <h2 class="page-header">
                            My Profile - 
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h2>


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
        $query .="user_role = '{$user_role}', ";
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




<form action="" method="post" enctype="multipart/form-data" class="">
    
    
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input value="<?php echo $user_firstname; ?>" type="text" class ="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input value="<?php echo $user_lastname; ?>" type="text" class ="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="user_role">Permissions  </label>
        <select name="user_role" id="" class="form-control">
            <option value="User"><?php echo $user_role; ?></option>
            <?php

                if ($user_role == 'Admin')
                    echo "<option value='User'>User</option>";
                else
                    echo "<option value='Admin'>Admin</option>";
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
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
 
 
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"?>