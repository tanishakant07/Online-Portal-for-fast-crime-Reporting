 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIwzALxUPNbatRBj3Xi1Uhp0fFzwWNBkE&region=IN&language=en"></script>
  
<script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>



<!-- script for API key; map locator -->
 

 
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
        document.getElementById("complaint_lat").value = event.coords.latitude;
        document.getElementById("complaint_long").value = event.coords.longitude;
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

if (isset($_POST['create_complaint'])) {

		
		$complaint_title = $_POST['complaint_title'];
        $complaint_cat_id = $_POST['complaint_cat_id'];
        $complaint_type = $_POST['complaint_type'];
        $complaint_reporter = $_SESSION['username'];
        
        $complaint_image = $_FILES['image']['name'];
        $complaint_image_temp = $_FILES['image']['temp_name'];

        $complaint_suspect = $_POST['complaint_suspect'];
        $complaint_dateofcrime = $_POST['complaint_dateofcrime'];
        $complaint_timeofcrime = $_POST['complaint_timeofcrime'];
        $complaint_descrip = $_POST['complaint_descrip'];

        $complaint_lat = $_POST['complaint_lat'];
        $complaint_long = $_POST['complaint_long'];
        
        $complaint_reply_count = 0;
        $complaint_status = "Pending";


        // move_uploaded_file($complaint_image_temp, "../images/$complaint_image");
        // //doesnt work; the image is not tranferred to the folder

        $query = "INSERT INTO complaints (complaint_title, complaint_cat_id, complaint_type, complaint_reporter, complaint_image, complaint_suspect, complaint_dateofcrime, complaint_timeofcrime, complaint_descrip, complaint_lat, complaint_long, complaint_reply_count, complaint_status)";

        $query .= "VALUES ('{$complaint_title}', '{$complaint_cat_id}', '{$complaint_type}', '{$complaint_reporter}', '{$complaint_image}', '{$complaint_suspect}', '{$complaint_dateofcrime}', '{$complaint_timeofcrime}', '{$complaint_descrip}', '{$complaint_lat}', '{$complaint_long}', '{$complaint_reply_count}', '{$complaint_status}')";

        //ERROR RESOLVED
        /*
        QUERY FAILEDYou have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Java platform. The original and reference implementation Java compilers, virtual' at line 1QUERY FAILEDYou have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Java platform. The original and reference implementation Java compilers, virtual' at line 1
        */
        $create_complaint_query = mysqli_query($connection, $query);
        confirmQuery ($create_complaint_query);



        $query = "UPDATE categories SET cat_complaint_count = cat_complaint_count + 1";
        $query .= " WHERE complaint_id = $the_complaint_id";
        $update_cat_complaint_count = mysqli_query($connection, $query);
        confirmQuery ($update_cat_complaint_count);

        echo "<p class='bg-success'>Complaint Registered. <a href='complaints.php'>Go back to Complaints Page</a></p>";
}

?>

 

<form action="" method="post" enctype="multipart/form-data" class="">
	
	<div class="form-group">
		<label for="complaint_title">Complaint Title</label>
		<input type="text" class="form-control" name="complaint_title">
	</div>

<br>

	<div class="form-group">
		<label for="complaint_cat_id">Complaint Category</label>
		<select name="complaint_cat_id" id="complaint_cat_id" class="form-control">
			<option value="0">Select</option>
			
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

<br>

    <div class="form-group">
        <label for="complaint_type">Complaint Type</label>
        <select name="complaint_type" id="" class="form-control">
            <option value="0">Select</option>
            <option value="FIR">First Information Report (FIR)</option>
            <option value="Report">Report</option>

        </select>
    </div>

    <br>

	<div class="form-group">
		<label for="complaint_reporter">Name of Reporter/Informer</label>
		<input style="cursor: not-allowed;" type="text" class ="form-control" name="complaint_reporter" value="<?php echo $_SESSION['username'] ?>" disabled>
	</div>

<br>

	
	<!-- <div class="form-group">
		<label for="complaint_status">Complaint Category</label>
		<select name="complaint_status" id="">
			<option value="unselected">Select options</option>
			<option value="Crime_against_women_and children">Crime Against Women and Children</option>
			<option value="Drug_trafficking">Drug Trafficking</option>
		</select>
	</div> -->

	<div class="form-group">
		<label for="complaint_image">Suspect Image or any other proof (if any)</label>
		<input type="file" name="complaint_image" >
	</div>

<br>

	<div class="form-group">
		<label for="complaint_suspect">Name of Suspect</label>
		<input type="text" class ="form-control" name="complaint_suspect" >
	</div>
<br>

	<div class="form-group">
		<label for="complaint_dateofcrime">Date of Crime</label>
		<input type="date" class ="form-control" name="complaint_dateofcrime" >
	</div>
<br>

	<div class="form-group">
		<label for="complaint_timeofcrime">Approximate time of day: (HH:MM AM/PM)</label>
		<input type="time" class ="form-control" name="complaint_timeofcrime" >
	</div>
<br>


	<div class="form-group">
		<label for="complaint_descrip">Description</label>
		<textarea class="form-control" name="complaint_descrip" id="" cols="30" rows="10"></textarea>
	</div>
<br>

	<div class="form-group">
		<label for="complaint_lat"></label>
		<input type="hidden" id="complaint_lat" name="complaint_lat" value="">
		<input type="hidden" id="complaint_long" name="complaint_long" value="">
		<!-- <input type="button" value="Get Location" onclick="getLocationConstant()" /> -->
	</div>
<br>

    <label for="complaint_crime_loc">Location of Crime</label>
	<div id="map"></div>
	<div class="form-group">
		<button id="confirmPosition">Confirm Position</button>
		<br>
		<!-- <p>On idle position: <span id="onIdlePositionView"></span></p>
		<p>On click position: <span id="onClickPositionView"></span></p> -->


		<!-- script for map locator -->
<script>
  // Get element references
  var confirmBtn = document.getElementById('confirmPosition');
  var onClickPositionView = document.getElementById('onClickPositionView');
  var onIdlePositionView = document.getElementById('onIdlePositionView');

  // Initialize locationPicker plugin
  var lp = new locationPicker('map', {
    setCurrentPosition: true, // You can omit this, defaults to true
  }, {
    zoom: 15 // You can set any google map options here, zoom defaults to 15
  });

  // Listen to button onclick event
  confirmBtn.onclick = function () {
    // Get current location and show it in HTML
    var location = lp.getMarkerPosition();
    onClickPositionView.innerHTML = 'The chosen location is ' + location.lat + ',' + location.lng;
  };

  // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
  google.maps.event.addListener(lp.map, 'idle', function (event) {
    // Get current location and show it in HTML
    var location = lp.getMarkerPosition();
    onIdlePositionView.innerHTML = 'The chosen location is ' + location.lat + ',' + location.lng;
  });
</script>

	</div>

<br>



	<input class="btn btn-primary" type="submit" name="create_complaint" value="Submit Complaint">

</form>