<?php
include("dbcon.php");
require 'security.php';

if(isset($_POST['book_id'])){
    $book_id = $_POST['book_id'];
    
    $sql = "UPDATE book SET book_status = 'Available' WHERE book_id='$book_id'";
    mysqli_query($dbconn,$sql);
	
	if ($sql) {
          echo "<script>alert('Book return sucessfully. Book status now IS AVAILABLE.');
				window.location='removebook.php'</script>";
    } else {
        echo "Error: " . mysqli_error($dbconn);
		header("Location: removebook.php");
    }
}


exit();
?>