<?php
session_start();
//mulakan sesi login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
//jika ada sesi login kita ikut je
?>