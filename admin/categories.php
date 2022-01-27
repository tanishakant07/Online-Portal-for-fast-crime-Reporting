<?php include "includes/admin_header.php"?>

    <div id="wrapper">


        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>
       

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Categories
                        </h1>

        <div class="col-xs-6"> 

        <!--query to insert category into database -->
        <?php insert_categories(); 
        	//function is present in admin/functions.php
        ?>

        <form action="" method="post">
        	<div class="form-group">
        		<label for="cat-title">Add Category</label>
        		<input class="form-control" type="text" name="cat_title">
        	</div>
        	<div class="form-group">
        		<input class="btn btn-primary" type="submit" name="submit" value="Add Category">
        	</div>
  	
        </form>


        <?php 
        		//query to edit and update, NOT REFACTORED
        	if(isset($_GET['edit'])){
        	
    		$cat_id = $_GET['edit'];	

    		include "includes/update_categories.php";
    		
    		}
		?>

        </div>
        <!-- Add Category Form -->

        <div class="col-xs-6">

        <table class="table table-bordered table-hover">
        	<thead>
        		<tr>
        			<th>Id</th>
        			<th>Category Title</th>
                    <th>Complaints Reported</th>
                    <th>Delete</th>
                    <th>Edit</th>
        		</tr>
        	</thead>
        	<tbody>



        	<?php  findAllCategories(); //query to find all categories 
        	//function is present in admin/functions.php
        	?>

			<?php deleteCategories();  //query to delete categories  
			//function is present in admin/functions.php
			?>


        			
        	</tbody>
        </table>
        	

        </div>



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

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"?>