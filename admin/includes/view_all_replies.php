<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>          
            <th>Reply</th>
            <th>Phone</th>
            <th>Email</th>
            <!-- <th>Status</th> -->
            <th>Complaint Title</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>

    <?php   

        $the_user = $_SESSION['username'];
        $query = "SELECT * FROM replies";
        $select_reply = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_reply)){

        $reply_id = $row['reply_id'];
        $reply_complaint_id = $row['reply_complaint_id'];
        $reply_author = $row['reply_author'];
        $reply_content = $row['reply_content'];
        $reply_phone = $row['reply_phone'];
        $reply_email = $row['reply_email'];
        $reply_date = $row['reply_date'];

        echo "<tr>";
        echo "<td>{$reply_id}</td> ";
        echo "<td>{$reply_author}</td> ";
        echo "<td>{$reply_content}</td> ";
        echo "<td>{$reply_phone}</td> ";
        echo "<td>{$reply_email}</td> ";
        
        //query to show post title for each reply
        $query = "SELECT * FROM complaints WHERE complaint_id = $reply_complaint_id";
        $select_complaint_id = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_complaint_id)){

        $complaint_id = $row['complaint_id'];
        $complaint_title = $row['complaint_title'];

        echo "<td> <a href='../complaint.php?c_id=$complaint_id'>$complaint_title</a></td> ";
        }
        
        echo "<td>{$reply_date}</td> ";
        //echo "<td><a href='replies.php?approve={$reply_id}'>Approve</a></td> ";
        //echo "<td><a href='replies.php?unapprove={$reply_id}'>Unapprove</a></td> ";
        //echo "<td><a href='replies.php?delete={$reply_id}'>Delete</a></td> ";
        //echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td> ";
        echo "</tr>";
                                
        } 

    ?>
        
<?php 


if (isset($_GET['delete'])) {
        
    $the_comment_id = $_GET['delete'];  
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
    $delete_query = mysqli_query ($connection, $query);
    if (!$delete_query){

        die('Deletion Failed' . mysqli_error($connection));
    }
    header("Location: comments.php");

} 

if (isset($_GET['unapprove'])) {
        
    $the_comment_id = $_GET['unapprove'];  
    $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = $the_comment_id";
    $unapprove_query = mysqli_query($connection, $query);
    confirmQuery($unapprove_query);
    header("Location: comments.php");

}

if (isset($_GET['approve'])) {
        
    $the_comment_id = $_GET['approve'];  
    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$the_comment_id}";
    $approve_query = mysqli_query ($connection, $query);
    confirmQuery ($approve_query);
    header("Location: comments.php");

}



?>


    </tbody>
</table>