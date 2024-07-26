
<?php
require 'dbcon.php';

include 'header.php';
session_start();
if (isset($_POST['phoneNum'])) {
    $phone = $_POST['phoneNum'];
    $pass = $_POST['password'];
    $query = mysqli_query($dbconn, "SELECT * FROM user WHERE user_phone_num='$phone' AND password='$pass'");
    $row = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) == 0 || $row['password'] != $pass) {
        echo "<script>alert('Wrong Phone Number or Password'); window.location='login.php'</script>";
    } else {
        $_SESSION['user_id'] = $row['user_id'];
		$_SESSION['user_name'] = $row['user_name'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['user_lavel'] = $row['user_lavel'];
		$_SESSION['user_phone'] = $row['user_phone_num'];
		$_SESSION['password'] = $row['password'];
        header("Location: menu.php?id=" . $_SESSION['user_id']);
        exit;
    }
}
?>