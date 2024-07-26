<?php
//End login session
session_start();
session_destroy();
//Go to login interface
header("location:login.php");
?>