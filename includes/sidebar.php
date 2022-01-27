<div class="col-md-4">



                <!-- Blog Search Well -->
                <!-- <div class="well">
                    <h4>Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                        <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form> search form 
                </div> 
                -->


                <!-- Login BOX-->
        <div class="well">
            <h4>Login</h4>
            <form action="includes/login.php" method="post">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Enter Username">
            </div>

            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Enter Password">
                <br>
                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">Submit</button>
                </span>
                <br>
                <a href="./register.php">New User? Sign Up here.</a> 
                <br>

            </div>
            </form> <!-- search form -->

            <span class="input-group-btn">
                <button class="btn btn-primary" name="quick_report" onclick="document.location='quickreport.php'"> Quick Report? Click here.</button>
            </span>
            <br>
            <!-- <a href="quickreport.php">Quick Report? Click here.</a> -->
                    <!-- /.input-group -->
        </div>


                <!-- Blog Categories Well -->
<!--                <div class="well">

                    <h4>Title2233</h4>
                    <div class="row">

                        <div class="col-lg-12">
                            <ul class="list-unstyled">

                                <?php

                                    // $query = "SELECT * FROM categories";
                                    // $select_categories_sidebar = mysqli_query($connection, $query);

                                    // while ($row = mysqli_fetch_assoc($select_categories_sidebar)){

                                    // $cat_title = $row['cat_title'];
                                    // $cat_id = $row['cat_id'];
                                    // echo "<li><a href = 'category.php?category=$cat_id'> {$cat_title} <a/></li>";
                                    // }  
                                ?>
                            </ul>
                         </div>
                        

                    </div>
                    
                </div>
--> 

                <!-- Side Widget Well -->
                <?php include "widget.php"; ?>

            </div>