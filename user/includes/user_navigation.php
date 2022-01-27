 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">User Dashboard</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="../home.php">Homepage</a></li>
                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'] ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="./profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li> 
                        <a href="../mquickreport.php"><i class="fa fa-fw fa-wrench"></i> Quick Report</a>
                    </li>

                    <li>
                        <a href="./complaints.php?source=edit_complaint"><i class="fa fa-fw fa-wrench"></i> Finish Quick Report</a>
                    </li>

                    <li>
                        <a href="./verify_quickreports.php"><i class="fa fa-fw fa-wrench"></i> Verify Quick Report</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Complaints <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="./complaints.php">View All Complaints</a>
                            </li>
                            <li>
                                <a href="./complaints.php?source=add_complaint">Register Complaint</a>
                            </li>
                            <li>
                                <a href="./complaints.php?source=edit_complaint">Edit Complaint</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                    
                    <li >
                        <a href="./replies.php"><i class="fa fa-fw fa-file"></i> Replies</a>
                    </li> 
                    <!--
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="./users.php">View All Users</a>
                            </li>
                            <li>
                                <a href="./users.php?source=add_user">Add User</a>
                            </li>
                            <li>
                                <a href="./users.php?source=edit_user">Edit User</a>
                            </li>
                        </ul>
                    </li>
                    -->
                    <li> 
                        <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Edit Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>