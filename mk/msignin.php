<!-- copied from login.read -->
<?php include "db.php";?>
<?php include "functions.php";?>

<?php include "includes/header.php"?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Read User</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
 -->
<div class ="container">

	<div class = "col-sm-6">
	<h2 class="text-center">READ USER</h2>
	<pre>
	<?php readRows();?>
	</pre>
	</div>

</div>

<?php include "includes/footer.php" ?>