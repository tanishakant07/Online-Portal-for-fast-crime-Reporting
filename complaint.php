<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

    <!-- Navigation -->
<?php  include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
 

                <?php

                if(isset($_GET['c_id'])){

                    $the_complaint_id = $_GET['c_id'];
                }  
                    

                $query = "SELECT * FROM complaints WHERE complaint_id = $the_complaint_id";
                $select_all_complaints_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_complaints_query)){

                    $complaint_cat_id = $row['complaint_cat_id'];
                    $complaint_title = $row['complaint_title'];
                    $complaint_reporter = $row['complaint_reporter'];
                    $complaint_status = $row['complaint_status'];
                    $complaint_image = $row['complaint_image'];
                    $complaint_descrip = $row['complaint_descrip']; 
                    $complaint_reply_count = $row['complaint_reply_count'];
                    $complaint_dateofcrime = $row['complaint_dateofcrime'];
                    $complaint_timeofcrime = $row['complaint_timeofcrime'];
                    $complaint_timestamp = $row['complaint_timestamp'];
                
                ?>

                <!-- <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->
                
                <!-- Complaint -->
                <h3>
                    Complaint Title : <a href="#"><?php echo $complaint_title ?></a>
                </h3>
                <p class="lead">
                    Complaint reported by : <a href="#"><?php echo $complaint_reporter ?></a>
                </p>
                <p><span> Complaint Reported on : </span> <?php echo $complaint_timestamp ?></p>
                <hr>

                <h4>
                    <div>Date of crime : <a href="#"><?php echo $complaint_dateofcrime ?></a></div>
                    <br>
                    <div>Time of crime : <a href="#"><?php echo $complaint_timeofcrime ?></a></div>
                    <br>
                    <div>Current Status : <a href="#"><?php echo $complaint_status ?></a></div>

                </h4>
                <br>
                <!--
                <img class="img-responsive" src="http://placehold.it/900x300/000000/?text=Blog+Post+Image" alt="Blog Post Image">
                -->


                <h4>Proof : </h4>
                <img class="img-responsive" src="images/<?php echo $complaint_image; ?>" alt="image" width="" height="">
                
                <hr>

                <p class="lead">Complaint Description : </p>
                <p><?php echo $complaint_descrip ?></p>
                <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->
                <hr>


                <?php } ?>


                <!-- Blog Comments -->
                <!-- php to accept replies from the form -->
                <?php  

                if (isset($_POST['create_reply'])) {

                    $the_complaint_id = $_GET['c_id'];

                    $reply_author = $_POST['reply_author'];
                    $reply_email = $_POST['reply_email'];
                    $reply_phone = $_POST['reply_phone'];
                    $reply_content = $_POST['reply_content'];

                    $query = "INSERT INTO replies (reply_complaint_id, reply_complaint_reporter, reply_author, reply_email, reply_phone, reply_content, reply_date)";

                    $query .= "VALUES ({$the_complaint_id}, '{$complaint_reporter}', '{$reply_author}', '{$reply_email}', '{$reply_phone}', '{$reply_content}', now())";

                    $create_reply_query = mysqli_query($connection, $query);
                    //confirmQuery ($create_reply_query);
                    
                    if (!$create_reply_query){
                        die("QUERY FAILED". mysqli_error($connection));
                    }

                $query = "UPDATE complaints SET complaint_reply_count = complaint_reply_count + 1";
                $query .= " WHERE complaint_id = $the_complaint_id";
                $update_reply_count = mysqli_query($connection, $query);
                confirmQuery ($update_reply_count);

                echo "<p class='bg-success'>Reply Sent. <a href='complaints.php'>Go back to Complaints</a></p>";

                }


                ?>

                <?php 
                    $the_user_role = $_SESSION['user_role'];
                    if ($the_user_role == "Admin") {
                ?>    
                
                <!-- Comments Form -->
                <div class="well">
                    <h4>Post your Reply:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="author">Name</label>
                            <input type="text" name="reply_author" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="phoneno">Phone No</label>
                            <input type="tel" name="reply_phone" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="reply_email" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="content">Reply</label>
                            <textarea class="form-control" name="reply_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_reply" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                 
                <?php } ?>

                <hr>


                <h3>
                    <a href="#">Past Replies</a>
                </h3>
                <!-- Posted Comments -->
                <?php   

                    $query = "SELECT * FROM replies WHERE reply_complaint_id = $the_complaint_id ";
                    //$query .="AND reply_status = 'Approved'";
                    $query .="ORDER BY reply_id DESC";

                    $select_reply = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_reply)){

                        $reply_author = $row['reply_author'];
                        $reply_content = $row['reply_content'];
                        $reply_date = $row['reply_date'];
                ?>
                    <div class="media">
                        <a class="pull-left" href="#">
                        <!-- <img class="media-object" src="http://placehold.it/64x64" alt=""> -->
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $reply_author; ?>
                                <small><?php echo $reply_date; ?></small>
                            </h4><?php echo $reply_content; ?>
                        </div>
                    </div>

                  <?php  } ?>

                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <!-- <?php  //include "includes/sidebar.php"; ?> -->

        </div>
        <!-- /.row -->

        <hr>

<?php  include "includes/footer.php"; ?>  

