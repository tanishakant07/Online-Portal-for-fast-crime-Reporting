<?php include "db.php";?>
<?php


	
function createRows(){

	if(isset($_POST['submit'])){

		global $connection;
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$idtype = $_POST['idtype'];
		$idno = $_POST['idno'];
		$houseno = $_POST['houseno'];
		$street = $_POST['street'];
		$area = $_POST['area'];
		$city = $_POST['city'];
		$block = $_POST['block'];
		$country = $_POST['country'];
		$state = $_POST['state'];
		$district = $_POST['district'];
		$polstation = $_POST['polstation'];
		$pincode = $_POST['pincode'];
		$psw = $_POST['psw'];
		$psw_repeat = $_POST['psw_repeat'];

		/*if (!($username && $password)){    finalising condition for input

			die("This field cannot be blank");
		}*/  

		$query = "INSERT INTO signup(name, gender, dob, contact, email, idtype, idno, houseno, street, area, city, block, country, state, district, polstation, pincode, psw)";
		
		$query .= " VALUES ('$name','$gender', '$dob', '$contact', '$email', '$idtype', '$idno', '$houseno', '$street', '$area', '$city', '$block', '$country', '$state', '$district', '$polstation', '$pincode', '$psw')";

		$result = mysqli_query($connection, $query);

		if(!$result){

			die('Query FAILED'. mysqli_error($connection));
		}
		else
			echo "<Signup Successful.";

	}
}




function readRows(){

	global $connection;
	$query = "SELECT * FROM signup";
	$result = mysqli_query($connection, $query);

	if(!$result){
		die('Query FAILED'. mysqli_error());
	}
	while ($row = mysqli_fetch_assoc($result)){ 
			print_r($row);
	}
}






function showAllData(){ //reads only ids

	global $connection;
	$query = "SELECT * FROM signup";
	$result = mysqli_query($connection, $query);
	if(!$result){

		die('Query FAILED'. mysqli_error());
	}
 	
 	while($row = mysqli_fetch_assoc($result)){

		$id = $row['id'];
		echo "<option value='$id'>$id</option>";
	
	}

}




function UpdateTable(){

	if(isset($_POST['submit'])){

		global $connection;
		$username = $_POST['username'];	
		$password = $_POST['password'];
		$id = $_POST['id'];

		$query = "UPDATE signup SET ";
		$query .="username = '$username', ";
		$query .="password = '$password' ";
		$query .="WHERE id = $id ";

		$result = mysqli_query($connection, $query);

		if (!$result){
			die ("QUERY Failed" . mysqli_error($connection));
		}
		else
			echo "USER Updated.";
	}
}





function deleteRows(){

	if(isset($_POST['submit'])){

		global $connection;
		$username = $_POST['username'];	
		$password = $_POST['password'];
		$id = $_POST['id'];

		$query = "DELETE FROM signup ";
		$query .="WHERE id = $id ";

		$result = mysqli_query($connection, $query);

		if (!$result){
			die ("QUERY Failed" . mysqli_error($connection));
		}
		else
			echo "USER Deleted.";
	}
}






?>