<?php
	$host="localhost";
	$user="root";
	$password="";
	$database="pet";
	
	$con=mysqli_connect($host,$user,$password,$database);
	
	if(!$con)
	{
		die("CONNECTION FAILED:" .mysqli_connect_error());
	}
?>

