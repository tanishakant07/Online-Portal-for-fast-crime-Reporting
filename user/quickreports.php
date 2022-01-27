<?php include "includes/user_header.php"?>

    <div id="wrapper">
 

        <!-- Navigation -->
        <?php include "includes/user_navigation.php"?>
       

        <div id="page-wrapper"> 

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <h2 class="page-header">
                            Quick Reports
                        </h2>
                        <h5></h5>

                    <?php   
                        if (isset($_GET['source'])) {

                            $source = $_GET['source'];
                        }
                        else {
                            $source = '';
                        }

                        switch ($source) {
                                
                            // case 'edit_complaint':
                            //     include "includes/edit_complaint.php";
                            //     break;
                            
                            default:
                                include "includes/view_all_quickreports.php";
                                break;
                        }

                    ?>
            

                        

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/user_footer.php"?>