<?php include "includes/user_header.php"?>
  
    <div id="wrapper">

       <!--  <?php  ($connection) ; ?> -->


        <!-- Navigation --> 
        <?php include "includes/user_navigation.php"?>
       

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome 

                            <small><?php echo $_SESSION['username'] ?></small>
                            
                        </h1>

                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                          <?php 

//query to count all complaints
    $the_user = $_SESSION['username'];
    $query = "SELECT * FROM complaints WHERE complaint_reporter = '$the_user'";
    //$query = "SELECT * FROM posts WHERE post_author = '$the_user'";
    $select_all_complaints = mysqli_query ($connection, $query);
    $complaint_count = mysqli_num_rows($select_all_complaints);
    echo "<div class='huge'>{$complaint_count}</div>";

                        ?>

                        <div>Complaints</div>
                    </div>
                </div>
            </div>
            <a href="complaints.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <?php 


    $the_user = $_SESSION['username'];
    $query = "SELECT * FROM replies WHERE reply_complaint_reporter = '$the_user'";
    //$query = "SELECT * FROM comments WHERE post_author = '$the_user'";
    $select_all_replies = mysqli_query ($connection, $query);
    $reply_count = mysqli_num_rows($select_all_replies);
    echo "<div class='huge'>{$reply_count}</div>";

                        ?>
                      <div>Responses/Replies</div>
                    </div>
                </div>
            </div>
            <a href="replies.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <!-- <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <?php 

//query to count all users
    // $query = "SELECT * FROM users";
    // $select_all_user = mysqli_query ($connection, $query);
    // $user_count = mysqli_num_rows($select_all_user);
    // echo "<div class='huge'>{$user_count}</div>";

                        ?>

                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> -->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php 

//query to count all categories
    $query = "SELECT * FROM categories";
    $select_all_categories = mysqli_query ($connection, $query);
    $category_count = mysqli_num_rows($select_all_categories);
    echo "<div class='huge'>{$category_count}</div>";

                        ?>

                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/user_footer.php"?>