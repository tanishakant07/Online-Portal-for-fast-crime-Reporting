<?php
 
 

function confirmQuery ($result){
	//function to check whether the query is able to write to the database
	global $connection;
	 if (!$result){
		die("QUERY FAILED". mysqli_error($connection));
	}
}

// function insert_categories(){

// 	global $connection;

// 	if (isset($_POST['submit'])) {
        	
//     	$cat_title = $_POST['cat_title'];	

//     	if ($cat_title == "" || empty($cat_title)){

//     		echo "Field cannot be empty! Try again.";
//     	}
//     	else{

//     		$query = "INSERT INTO categories(cat_title)";
//     		$query .= "VALUE('{$cat_title}') ";

//     		$create_category_query = mysqli_query($connection, $query);

//     		if(!$create_category_query)
// 				die('QUERY failed' . mysqli_error($connection));
//     	}
//     }
// }


function user_findAllCategories(){

	global $connection;

	$query = "SELECT * FROM categories";
	$select_categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories)){

	    $cat_id = $row['cat_id'];
	    $cat_title = $row['cat_title'];
	    echo "<tr>";
	    echo "<td>{$cat_id}</td> ";
	    echo "<td>{$cat_title}</td> ";
	    echo "<td>0</td> ";
	    // echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='categories.php?delete={$cat_id}'>Delete</a></td> ";
	    // echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td> ";
	    echo "</tr>";
    }  
}


// function deleteCategories(){

// 	global $connection;

// 	if (isset($_GET['delete'])) {
        	
// 		$the_cat_id = $_GET['delete'];	
// 		$query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
// 		$delete_query = mysqli_query ($connection, $query);
// 		if (!$delete_query){

// 			die('Deletion Failed' . mysqli_error($connection));
// 		}
// 		header("Location: categories.php");

// 	}
// }


?>