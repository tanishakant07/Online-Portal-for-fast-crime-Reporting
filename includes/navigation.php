    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"> Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php">Homepage</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
 
                <li><a href="home.html">Home </a></li>
                <li><a href="helpline.html">Helpline</a></li>
                <li><a href="statistics.html">Statistics </a></li>
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="guide.html">User Guide</a></li>
                <li><a href="index.php">Sign In</a></li>
                <li><a href="user">User</a></li>
                <li><a href="admin">Admin</a></li>
                <li><a href="registration.php">Register</a></li>
                <li><a href="quickreport.php">Quick Report</a></li>

                <?php                  

                // if ($_SESSION['user_role'] == "Admin")
                //     $link = "../admin";
                // else ($_SESSION['user_role'] == "Subscriber")
                //     $link = "../user";
                // else
                //     $link = "../index.php";
                
                // if ($_SESSION['user_role'] == "admin")
                //     echo "<li><a href='admin'>Dashboard</a></li>";
                // else if ($_SESSION['user_role'] == "subscriber")
                //     echo "<li><a href='user'>Dashboard</a></li>";

                // if (isset($_SESSION['user_role']))
                //     echo "<li><a href='user'>Dashboard</a></li>";
                // else
                //    echo "<li><a href='index.php'>Login</a></li>";
                ?> 
                
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
