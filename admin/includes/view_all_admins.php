<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>User Id</th>
            <th>Username</th>          
            <!-- <th>Password</th> -->
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Role</th>
            <th>Change to Admin</th>
            <th>Change to User</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>

    <tbody>

    <?php   
        $query = "SELECT * FROM users WHERE user_role = 'Admin' ";
        $select_user = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_user)){

        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
        //$user_ = $row['user_'];
        
        
        echo "<tr>";
        echo "<td>{$user_id}</td> ";
        echo "<td>{$username}</td> ";
        //echo "<td>{$user_password}</td> ";
        echo "<td>{$user_firstname}</td> ";
        echo "<td>{$user_lastname}</td> ";
        
        // //query to show post title for each comment
        // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
        // $select_post_id = mysqli_query($connection, $query);

        // while ($row = mysqli_fetch_assoc($select_post_id)){

        // $post_id = $row['post_id'];
        // $post_title = $row['post_title'];

        // echo "<td> <a href='../post.php?p_id=$post_id'>$post_title</a></td> ";
        // }
        
        echo "<td>{$user_email}</td> ";
        echo "<td>{$user_image}</td> ";
        echo "<td>{$user_role}</td> ";
        echo "<td><a href='users.php?change-to-admin={$user_id}'> Admin</a></td> ";
        echo "<td><a href='users.php?change-to-user={$user_id}'> User</a></td> ";
        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td> ";
        echo "<td><a href='users.php?source=edit_user&user_id={$user_id}'>Edit</a></td> ";
        echo "</tr>";
                                
        } 

    ?>
        
<?php 


if (isset($_GET['delete'])) {
        
    $the_user_id = $_GET['delete'];  
    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    $delete_query = mysqli_query ($connection, $query);
    if (!$delete_query){

        die('Deletion Failed' . mysqli_error($connection));
    }
    header("Location: users.php");

}


if (isset($_GET['change-to-admin'])) {
        
    $the_user_id = $_GET['change-to-admin'];  
    $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = {$the_user_id}";
    $change_to_admin_query = mysqli_query ($connection, $query);
    confirmQuery ($change_to_admin_query);
    header("Location: users.php");

}
if (isset($_GET['change-to-user'])) {
        
    $the_user_id = $_GET['change-to-user'];  
    $query = "UPDATE users SET user_role = 'User' WHERE user_id = $the_user_id";
    $change_to_sub_query = mysqli_query($connection, $query);
    confirmQuery($change_to_sub_query);
    header("Location: users.php");

}



?>


    </tbody>
</table>