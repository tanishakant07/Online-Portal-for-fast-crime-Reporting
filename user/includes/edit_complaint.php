<?php  

		if (isset($_GET['c_id'])) {
    	
        	$the_complaint_id = $_GET['c_id'];

        } 

        $query = "SELECT * FROM complaints WHERE complaint_id = $the_complaint_id";
        $select_complaints_by_id = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_complaints_by_id)){

        $complaint_id = $row['complaint_id'];
        $complaint_reporter = $row['complaint_reporter'];
        $complaint_title = $row['complaint_title'];
        $complaint_cat_id = $row['complaint_cat_id'];
        //$complaint_status = $row['complaint_status'];
        $complaint_image = $row['complaint_image'];
        //$complaint_tags = $row['complaint_tags'];
        $complaint_descrip = $row['complaint_descrip'];
        $complaint_reply_count = $row['complaint_reply_count'];
        $complaint_date = $row['complaint_date'];
    	}

    	if(isset($_POST['update_complaint'])){

    		$complaint_reporter = $_POST['complaint_reporter'];
	        $complaint_title = $_POST['complaint_title'];
	        $complaint_cat_id = $_POST['complaint_cat_id'];
	        //$complaint_status = $_POST['complaint_status'];
	        $complaint_image = $_FILES['image']['name'];
	        $complaint_image_temp = $_FILES['image']['tmp_name'];
	        //$complaint_tags = $_POST['complaint_tags'];
	        $complaint_descrip = $_POST['complaint_descrip'];

	        move_uploaded_file($complaint_image_temp, "../images/$complaint_image");

	        if (empty($complaint_image)){
	        	
	        	$query = "SELECT * FROM complaints WHERE complaint_id = $the_complaint_id";
	        	$select_image = mysqli_query($connection, $query);
	        	
	        	while ($row = mysqli_fetch_assoc($select_image)){

	        		$complaint_image = $row['complaint_image'];
	        	}
        			
	        }

	        $query = "UPDATE complaints SET ";
	        $query .="complaint_title = '{$complaint_title}', ";
	        $query .="complaint_cat_id = '{$complaint_cat_id}', ";
	        $query .="complaint_date = now(), ";
	        $query .="complaint_reporter = '{$complaint_reporter}', ";
	        //$query .="complaint_status = '{$complaint_status}', ";
	        //$query .="complaint_tags = '{$complaint_tags}', ";
	        $query .="complaint_descrip = '{$complaint_descrip}', ";
	        $query .="complaint_image = '{$complaint_image}' ";
	        $query .="WHERE complaint_id = {$the_complaint_id} ";


	        $update_complaint_query = mysqli_query($connection, $query);
        	confirmQuery ($update_complaint_query);

    	}

?>


<form action="" method="post" enctype="multipart/form-data" class="">
	
	<div class="form-group">
		<label for="title">Complaint Title</label>
		<input value="<?php echo $complaint_title; ?>" type="text" class="form-control" name="complaint_title">
	</div>


	<div class="form-group">
		<label for="complaint_category">Category</label>
		<select name="complaint_cat_id" id="complaint_cat_id" class="form-control">
			
			<?php  

				$query = "SELECT * FROM categories";
            	$select_categories = mysqli_query($connection, $query);

            	confirmQuery($select_categories);

                while ($row = mysqli_fetch_assoc($select_categories)){

	                $cat_id = $row['cat_id'];
	                $cat_title = $row['cat_title'];

	                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            	}

			?>

		</select>
	</div>


	<div class="form-group">
		<label for="reporter">Complaint Reporter</label>
		<input value="<?php echo $complaint_reporter; ?>" type="text" class ="form-control" name="complaint_reporter" >
	</div>

<!-- <div class="form-group">
		<label for="complaint_status">Complaint Status</label>
		<input value="<?php echo $complaint_status; ?>" type="text" class ="form-control" name="complaint_status" >
	</div> 
-->


	<!-- <div class="form-group">
		<label for="complaint_status">Complaint Status</label>
		<select name="complaint_status" id="">
			<option value="Draft"><?php echo $complaint_status; ?></option>
			<?php

				// if ($complaint_status == 'Published')
				// 	echo "<option value='Draft'>Draft</option>";
				// else
				// 	echo "<option value='Published'>Published</option>";
			?>
		</select>
	</div> -->


	<div class="form-group">
		<label for="complaint_image">Complaint Image</label>
		<img src="../images/<?php echo $complaint_image;?>" alt="complaint_image" width="100">
		<input type="file" name="image" class="form-control">
	</div>

	<!-- <div class="form-group">
		<label for="complaint_tags">Complaint Tags</label>
		<input value="<?php echo $complaint_tags; ?>" type="text" class ="form-control" name="complaint_tags" >
	</div> -->

	<div class="form-group">
		<label for="complaint_descrip">Complaint Desription</label>
		<textarea class="form-control" name="complaint_descrip" id="" cols="30" rows="10"><?php echo $complaint_descrip; ?></textarea>
	</div>

<!-- empty field  
	<div class="form-group">
		<label for=""></label>
		<input type="text" class ="form-control" name="" >
	</div>
-->
	<div>
		<input class="btn btn-primary" type="submit" name="update_complaint" value="Update Complaint">
	</div>

</form>

		