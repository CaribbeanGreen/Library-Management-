<?php 
require('dbcon.php');
require('security.php');
require('header.php');

$lavel = $_SESSION['user_lavel'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Book Management System</title>
    <style>
        
        
        h1 {
			font-family:Arial;
            text-align: center;
            font-size: 3em; 
            margin-top: 20px;
            color: #fff; 
            text-shadow: 2px 2px 4px #000; 
        }
        .user-details {
			font-size: 30;
            text-align: center;
            margin: 20px auto; 
            border: 2px solid #333;
            padding: 20px; 
            width: fit-content; 
            background-color: rgba(255, 255, 255, 0.9); 
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); 
            border-radius: 10px; 
        }
		
		th{
			font-family:Arial;
		}
		
		td{
			font-family:Arial;
		}
        
        .dot{
				width:20px;
				color:black;
                font-weight:bold;
            }
		
    </style>
</head>
<body>
<h1>WELCOME TO LIBRARY <br>BOOK MANAGEMENT SYSTEM<br><?php echo $lavel ?></h1>
    <table class="user-details">
	<tr>
    <th colspan="3">USER DETAIL</th>
	</tr>
	<tr>
		<td align="left">NAME</td>
		<td class="dot">:</td>
		<td align="left"><?php echo $_SESSION['user_name'] ?></td>
	</tr>
	<tr>
	    <td align="left">PHONE NUMBER</td>
		<td class="dot">:</td>
		<td align="left"><?php echo $_SESSION['user_phone'] ?></td>
	</tr>
	<tr>
	    <td align="left"> EMAIL</td>
		<td class="dot">:</td>
		<td align="left"><?php echo $_SESSION['email'] ?></td>
	</tr>
    </table>

    
</body>
</html>
