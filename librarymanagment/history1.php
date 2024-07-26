<!DOCTYPE html>
<html lang="en">
<head>
	<title>Library Book Management System</title>
    <style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px;
        background-color: #333;
        border: 1px solid #444;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }

    .table-header {
        margin-bottom: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        background-color: #333;
        font-size: 18px;
        color: #fff;
    }

    .table th, .table td {
        padding: 18px 20px;
        text-align: left;
        border-bottom: 1px solid #444;
    }

    .table th {
        background-color: #444;
        border-bottom: 2px solid #555;
        font-size: 20px;
        font-weight: bold;
    }

    .table th:first-child {
        border-top-left-radius: 6px;
    }

    .table th:last-child {
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }

    .table td {
        border-bottom: 1px solid #444;
    }

    .table td:first-child {
        border-left: 1px solid #444;
    }

    .table td:last-child {
        border-right: 1px solid #444;
        border-bottom-left-radius: 6px;
        border-bottom-right-radius: 6px;
    }

    .table tr:hover {
        background-color: #444;
    }

    .table th, .table td {
        padding: 18px 20px;
    }

    .table th {
        font-size: 20px;
        font-weight: bold;
    }

    .table th {
        background-color: #444;
        border-bottom: 2px solid #555;
    }

    .table th:last-child {
        border-bottom-right-radius: 6px;
    }

    .table td {
        border-bottom: 1px solid #444;
    }

    .table td:last-child {
        border-bottom-left-radius: 6px;
    }

    .table td:last-child {
        border-bottom-right-radius: 6px;
    }

    .table tr:hover {
        background-color: #444;
    }
	.title{
		color : orange;
	}
	th{
		font-family:arial;
	}
	td{
		font-family:arial;
	}
	h1{
		font-family:arial;
	}
</style>
</head>

<?php


include("dbcon.php");
require 'security.php';
require 'header.php';



function displayHistory() {
    global $dbconn;
	

// Function to display the history
	
    $sql = "SELECT borrow_book, borrow_date, borrow_name, borrow_phone
			FROM borrow 
			ORDER BY borrow_date DESC;";
    $query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
	$row_count = mysqli_num_rows($query); 
?>
<body>    
     <div class='container'>
     <h1 class='title'>Book History</h1>
	 
	<?php if($row_count == 0){    ?>
	
	<table class='table'>
     
     <tr>
     <th>Name</th>
     <th>Phone Number</th>
     <th>Book Name</th>
     <th>Timestamp</th>
     </tr>
	 <tr><td colspan='4'> No record yet. </td></tr>;
	 </table>
	<?php }else{ ?>
	<table class='table'>
     
     <tr>
     <th>Name</th>
     <th>Phone Number</th>
     <th>Book Name</th>
     <th>Timestamp</th>
     </tr>
	 
    <?php while ($row = mysqli_fetch_assoc($query)) { 
	
         echo "<tr>";
            echo "<td>" . $row['borrow_name'] . "</td>";
            echo "<td>" . $row['borrow_phone'] . "</td>";
            echo "<td>" . $row['borrow_book'] . "</td>";
            echo "<td>" . date('Y-m-d H:i:s', strtotime($row['borrow_date'])) . "</td>";
			echo "</tr>";
			
    }?>
	</table>
	<?php
}}
displayHistory();
	?>

    </div>
</body>
</html>
	


