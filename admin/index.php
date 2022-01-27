<?php include "includes/admin_header.php"?>
  
    <div id="wrapper">

       <!--  <?php  ($connection) ; ?> -->


        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>
       

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row"> 
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin - 

                            <small><?php echo $_SESSION['username'] ?></small>
                            
                        </h1>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
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
    $query = "SELECT * FROM complaints";
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

    //$the_user = $_SESSION['username'];
    $query = "SELECT * FROM replies";
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
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <?php 

//query to count all users
    $query = "SELECT * FROM users";
    $select_all_user = mysqli_query ($connection, $query);
    $user_count = mysqli_num_rows($select_all_user);
    echo "<div class='huge'>{$user_count}</div>";

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
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <?php 

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


                <?php 

    //query to count draft posts
    $query = "SELECT * FROM complaints WHERE complaint_status = 'Pending'";
    $select_all_pending_complaint = mysqli_query ($connection, $query);
    $complaint_pending_count = mysqli_num_rows($select_all_pending_complaint);


    //query to count pending replys
    //WHERE reply_status = 'Unapproved'
    $query = "SELECT * FROM replies";
    $replies_query = mysqli_query ($connection, $query);
    $reply_count = mysqli_num_rows($replies_query);

    //query to count users
    $query = "SELECT * FROM users WHERE user_role = 'User'";
    $select_user_query = mysqli_query ($connection, $query);
    $user_count = mysqli_num_rows($select_user_query);

                ?>

                <div class="row">
                     <script type="text/javascript">

                          google.charts.load('current', {'packages':['bar']});
                          google.charts.setOnLoadCallback(drawChart);

                          function drawChart() {
                          var data = google.visualization.arrayToDataTable([
                    ['Data', 'Count'],

              <?php 

                $element_text = ['Pending Complaints', 'Total Complaints', 'Replies', 'Users', 'Categories'];
                $element_count = [$complaint_pending_count, $complaint_count, $reply_count, $user_count, $category_count];

                for ($i = 0; $i < 5; $i++) {
                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                }


              ?>

              // can also be written as 
              //  ['AQWQ', <?php //echo $post_count; ?>]



                        ]);

                        var options = {
                          chart: {
                            title: 'Statistics',
                            subtitle: 'Based on real time data',
                          }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                      }
                    </script>

                    <div id="columnchart_material" style="width: 1000px; height: 500px;"></div>

                </div>









            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"?>