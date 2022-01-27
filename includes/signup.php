<!-- created by sp -->

<?php include "./db.php"; ?>
<?php include "./header.php"; ?>
 

    <!-- Navigation -->
<?php  include "./navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            	<form action="" method="post" enctype="multipart/form-data" class="">
	
	
					<div class="form-group">
						<label for="user_firstname">First Name</label>
						<input type="text" class ="form-control" name="user_firstname">
					</div>

					<div class="form-group">
						<label for="user_lastname">Last Name</label>
						<input type="text" class ="form-control" name="user_lastname">
					</div>

					<div class="form-group">
						<select name="user_role" id="">
							<option value="subscriber">Select options</option>
							<option value="admin">Admin</option>
							<option value="subscriber">Subscriber</option>
						</select>
					</div>

				<!-- 
					<div class="form-group">
						<label for="post_image">User Image</label>
						<input type="file" name="image" >
					</div>
				 -->


				 	<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username">
					</div>

					<div class="form-group">
						<label for="user_email">Email</label>
						<input type="email" class="form-control" name="user_email" >
					</div>

					<div class="form-group">
						<label for="user_password">Password</label>
						<input type="password" class="form-control" name="user_password" >
					</div>

					<input class="btn btn-primary" type="submit" name="create_user" value="Sign Up">

				</form>

            </div>

        </div>

        <hr>
<?php  


if (isset($_POST['create_user'])) {

 		$user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        
        //image
        // $user_image = $_FILES['image']['name'];
        // $user_image_temp = $_FILES['image']['temp_name'];
        

        // move_uploaded_file($user_image_temp, "../images/$user_image");
        // '{$user_id}',//doesnt work; the image is not tranferred to the folder

        $query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_role, user_image, randSalt)";

        $query .= "VALUES ('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}', '', '')";

        $create_user_query = mysqli_query($connection, $query);
        confirmQuery ($create_user_query);

        echo "User Created: " . " " . "<a href='users.php'>View Users</a>";
 }

?>
 
<?php  include "./footer.php"; ?>  