<?php

$db['db_host'] = "localhost:3307";
$db['db_user'] = "root";
$db['db_pass'] = "Class";
$db['db_name'] = "ph_project";

foreach($db as $key => $value){

	define(strtoupper($key), $value);
}

 $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


?>