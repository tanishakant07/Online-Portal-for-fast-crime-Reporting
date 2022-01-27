<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>URN/</th>
            <th>Reporter Name</th>
            <!-- <th>Title</th>
            <th>Category</th>
            <th>Past/Recent</th>
            <th>Image</th> -->
            
            <!-- <th>Tags</th> -->
            <!-- <th>Comments</th> -->
            <th>Phone No</th>
            <th>Description</th>
            <th>Status</th>
            <th>Urgency</th>
            <th>Reported on</th>
            <!-- <th>Delete</th>
            <th>Edit</th> -->
        </tr>
    </thead>

    <tbody>

    <?php   
        
        $query = "SELECT * FROM quickreports";
        $select_quickreports = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_quickreports)){

        
         
        $qr_id = $row['qr_id'];  
        $qr_name = $row['qr_name'];
        $qr_phone_no = $row['qr_phone_no'];
        $qr_description = $row['qr_description'];
        $qr_status = $row['qr_status'];
        $qr_urgency = $row['qr_urgency'];
        $qr_timestamp = $row['qr_timestamp'];
 
        if ($qr_urgency == "Emergency") {
            echo "<tr style='background-color: #ffb3b3;'>";
        }
        else{
            echo "<tr>";
        }
        echo "<td>{$qr_id}</td> ";
        echo "<td>{$qr_name}</td> ";
        echo "<td>{$qr_phone_no}</td> ";
        echo "<td>{$qr_description}</td> ";
        //echo "<td>{$qr_status}</td> ";


        if ($qr_status == "Verified") {
            echo "<td style='background-color: #ccffdd;'>{$qr_status}</td> ";    
        }
        else{
            echo "<td>{$qr_status}</td> ";
        }


        if ($qr_urgency == "Emergency") {
            echo "<td style='background-color: #ff6666;'>{$qr_urgency}</td> ";    
        }
        else{
            echo "<td>{$qr_urgency}</td> ";
        }

        echo "<td>{$qr_timestamp}</td> ";


        //echo "<td> <a href='../complaint.php?c_id=$complaint_id'>$complaint_title</a></td> ";

        // $query = "SELECT * FROM categories WHERE cat_id = {$complaint_cat_id}";
        // $select_categories_id = mysqli_query($connection, $query);

        // while ($row = mysqli_fetch_assoc($select_categories_id)){

        // $cat_id = $row['cat_id'];
        // $cat_title = $row['cat_title'];

        // echo "<td>{$cat_title}</td> ";
        // }
        
        //echo "<td> <img width='100' class='img-responsive' src='../images/$complaint_image'> <alt='image'></td> ";
        
        //echo "<td title='Click to set status as Resolved'><a onClick=\"javascript: return confirm('Are you sure you want to set status as Resolved?'); \" href='complaints.php?approve={$complaint_id}'>#</a></td> ";
        //echo "<td title='Click to flag as inappropriate'><a onClick=\"javascript: return confirm('Are you sure you want to set flag as inappropriate?'); \" href='complaints.php?flag={$complaint_id}'>#</a></td> ";

        

        echo "</tr>";
                                
        }  

    ?>
         
        
<?php 


if (isset($_GET['delete'])) {
        
    $the_complaint_id = $_GET['delete'];  
    $query = "DELETE FROM complaints WHERE complaint_id = {$the_complaint_id}";
    $delete_query = mysqli_query ($connection, $query);
    if (!$delete_query){

        die('Deletion Failed' . mysqli_error($connection));
    }
    header("Location: complaints.php");

}


if (isset($_GET['verify'])) {
        
    $the_quickreport_id = $_GET['verify'];  
    $query = "UPDATE quickreports SET qr_status = 'Verified' WHERE qr_id = $the_quickreport_id";
    $veriry_qr_query = mysqli_query($connection, $query);
    confirmQuery($veriry_qr_query);
    header("Location: quickreports.php");

}

if (isset($_GET['flag'])) {
        
    $the_complaint_id = $_GET['flag'];  
    $query = "UPDATE complaints SET complaint_status = 'Flagged as inapproapriate' WHERE complaint_id = $the_complaint_id";
    $flag_query = mysqli_query($connection, $query);
    confirmQuery($flag_query);
    header("Location: complaints.php");

}


?>


    </tbody>
</table>