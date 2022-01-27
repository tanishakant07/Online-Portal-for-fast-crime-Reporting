<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Complainant</th>
            <th>Title</th>
            <th>Category</th>
            <th>Past/Recent</th>
            <th>Image</th>
            <th>Status</th>
            <!-- <th>Tags</th> -->
            <!-- <th>Comments</th> -->
            <th>Date of Crime</th>
            <th>Time of Crime</th>
            <th>Reported on</th>
            <th>Delete</th>
            <!-- <th>Edit</th> -->
        </tr>
    </thead>
 
    <tbody>

    <?php   

        $the_user = $_SESSION['username'];
        $query = "SELECT * FROM complaints WHERE complaint_reporter = '$the_user'";
        $query .= " AND complaint_status <> 'Deleted'";
        $select_complaints = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_complaints)){

        $complaint_id = $row['complaint_id'];  
        $complaint_cat_id = $row['complaint_cat_id'];
        $complaint_title = $row['complaint_title'];
        $complaint_reporter = $row['complaint_reporter'];
        $complaint_status = $row['complaint_status'];
        $complaint_image = $row['complaint_image'];
        // $complaint_tags = $row['complaint_tags'];
        $complaint_reply_count = $row['complaint_reply_count'];
        $complaint_dateofcrime = $row['complaint_dateofcrime'];
        $complaint_timeofcrime = $row['complaint_timeofcrime'];
        $complaint_timestamp = $row['complaint_timestamp'];

        echo "<tr>";
        echo "<td>{$complaint_id}</td> ";
        echo "<td>{$complaint_reporter}</td> ";
        echo "<td>{$complaint_title}</td> ";

  
        $query = "SELECT * FROM categories WHERE cat_id = {$complaint_cat_id}";
        $select_categories_id = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_categories_id)){

        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<td>{$cat_title}</td> ";
        }
    

        echo "<td>Recent</td> ";
        
        echo "<td> <img width='100' class='img-responsive' src='../images/$complaint_image'> <alt='image'></td> ";
        echo "<td>{$complaint_status}</td> ";       
        echo "<td>{$complaint_dateofcrime}</td> ";
        echo "<td>{$complaint_timeofcrime}</td> ";
        echo "<td>{$complaint_timestamp}</td> ";

        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='complaints.php?delete={$complaint_id}'>Delete</a></td> ";

        // echo "<td><a href='complaints.php?source=edit_complaint&c_id={$complaint_id}'>Edit</a></td> ";
        echo "</tr>";
                                
        } 

    ?>
         
         
<?php 


if (isset($_GET['delete'])) {
        
    $the_complaint_id = $_GET['delete'];  
    $query = "UPDATE complaints SET complaint_status = 'Deleted' WHERE complaint_id = $the_complaint_id";
    $delete_query = mysqli_query ($connection, $query);
    if (!$delete_query){

        die('Deletion Failed' . mysqli_error($connection));
    }
    header("Location: complaints.php");

}



?>


    </tbody>
</table>