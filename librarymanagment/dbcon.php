<?php
	$user = "root"; 			
	$pass = ""; 				
	$host = "localhost"; 		
	$dbname= "library"; 	

	#echo "<b>User 			: </b>" .$user ."<br>";
	#echo "<b>Password		: </b>" .$pass ."<br>";
	#echo "<b>Host 			: </b>" .$host ."<br>";
	#echo "<b>Database name 	: </b>" .$dbname ."<br>";

	$dbconn= mysqli_connect($host, $user, $pass,$dbname)or die(mysqli_error($dbconn));
?>