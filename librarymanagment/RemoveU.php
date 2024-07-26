<?php
include("dbcon.php");

if (isset($_POST['remove'])) {
        $user_id = $_POST['user_id'];
        $sql1 = "UPDATE borrow SET book_id=NULL, user_id=NULL WHERE user_id='$user_id'";
        mysqli_query($dbconn, $sql1);
        $sql = "DELETE FROM user WHERE user_id = '$user_id'";
        $query1 = mysqli_query($dbconn, $sql);

        if ($query1) {
			echo "<script>alert('User removed successfully');
				window.location='viewDataU.php'</script>";
        } else {
            echo "Error: " . mysqli_error($dbconn);
			header("Location:viewDataU.php");
        }
    }

?>
