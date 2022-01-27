<?php  

		if (isset($_GET['user_id'])) {
    	
        	$the_user_id = $_GET['user_id'];
        }

        $query = "SELECT * FROM users WHERE user_id = $the_user_id";
        $select_users_by_id = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_users_by_id)){

        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
        $username = $row['username'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
    	}

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
	        	
	        // 	$query = "SELECT * FROM users WHERE user_id = $the_user_id";
	        // 	$select_image = mysqli_query($connection, $query);
	        	
	        // 	while ($row = mysqli_fetch_assoc($select_image)){

	        // 		$user_image = $row['user_image'];
	        // 	}
        			
	        // }

	        $query = "UPDATE users SET ";
	        $query .="user_firstname = '{$user_firstname}', ";
	        $query .="user_lastname = '{$user_lastname}', ";
	        $query .="user_role = '{$user_role}', ";
	        $query .="username = '{$username}', ";
	        $query .="user_email = '{$user_email}', ";
	        $query .="user_password = '{$user_password}' ";
	        //$query .="user_image = '{$user_image}' ";
	        $query .="WHERE user_id = {$the_user_id} ";


	        $update_user_query = mysqli_query($connection, $query);
        	confirmQuery ($update_user_query);

        	echo "<p class='bg-success'>User Updated. <a href='users.php'>Go back to list</a></p>";

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
		<select name="user_role" id="">
			<option value="Subscriber"><?php echo $user_role; ?></option>
			<?php

				if ($user_role == 'Admin')
					echo "<option value='Subscriber'>Subscriber</option>";
				else
					echo "<option value='Admin'>Admin</option>";
			?>
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

<!-- empty field  
	<div class="form-group">
		<label for=""></label>
		<input type="text" class ="form-control" name="" >
	</div>
-->

	<input class="btn btn-primary" type="submit" name="update_user" value="Update User">

</form>
 

		
		<!-- taken from add_user
			<?php  

				// $query = "SELECT * FROM users";
    //         	$select_users = mysqli_query($connection, $query);

    //         	confirmQuery($select_users);

    //             while ($row = mysqli_fetch_assoc($select_users)){

	   //              $user_id = $row['user_id'];
	   //              $user_role = $row['user_role'];

	   //              echo "<option value='{$user_id}'>{$user_role}</option>";
    //         	}

			?> -->