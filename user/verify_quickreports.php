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
                            Verify Quick Reports
                        </h2>
                        <h5></h5>

                    <?php   
                        if (isset($_GET['source'])) {

                            $source = $_GET['source'];
                        }
                        else {
                            $source = '';
                        }

                        // switch ($source) {
                                
                        //     // case 'edit_complaint':
                        //     //     include "includes/edit_complaint.php";
                        //     //     break;
                            
                        //     default:
                        //         include "includes/view_all_quickreports.php";
                        //         break;
                        // }

                    ?>
                    <!-- <div class="form-group">
                        <label for="select_urn">Select Unique Reference Number</label>
                        <select name="select_urn" id="select_urn" class="">
                            <option value="0">Select</option>
                            
                            <?php  

                                $query = "SELECT * FROM quickreports";
                                $select_quickreports = mysqli_query($connection, $query);

                                confirmQuery($select_quickreports);

                                while ($row = mysqli_fetch_assoc($select_quickreports)){

                                    $qr_id = $row['qr_id'];
                                    $qr_title = $row['cat_title'];

                                    echo "<option value='{$qr_id}'>{$qr_id}</option>";
                                }

                            ?>

                        </select>
                    </div> --> 



                    <?php  

                    if (isset($_GET['verify'])) {
        
                            $the_quickreport_id = $_GET['verify'];  
                            $query = "UPDATE quickreports SET qr_status = 'Verified' WHERE qr_id = $the_quickreport_id";
                            $veriry_qr_query = mysqli_query($connection, $query);
                            confirmQuery($veriry_qr_query);
                            
                            //header("Location: verify_quickreports.php");
                            echo "<p class='bg-success'>Quick Report Verified. <a href='index.php'>Go back to Dashboard</a></p>";

                        }
                    ?>
                    

                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="ur_number" ><b>Enter Unique Reference Number (URN)</b></label>
                      <input type="number" class="form-control" placeholder="URN/" name="ur_number" value="" required>
                    </div>


                    <input class="btn btn-primary" type="submit" name="verify_qr" value="Verify Quick Report">
                    </form>
 
                    <br>
                    <br>

                    <?php  
                        if(isset($_POST['verify_qr'])){

                            $qr_id = $_POST['ur_number'];
                            if (!empty($qr_id)){

                            echo "<button class='btn btn-custom btn-lg btn-block' value=''><a onClick=\"javascript: return confirm('Are you sure you want to verify?'); \" href='verify_quickreports.php?verify={$qr_id}'>VERIFY</a></button>";
                            }
                            else{
                    ?>  
                        <script type="text/javascript">window.alert("Field cannot be empty!");</script> 
                    <?php 
                            }
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