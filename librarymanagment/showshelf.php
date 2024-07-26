<style>
			h1{
				font-family:arial;
			}
			.container {
				max-width: 1200px;
				margin: 0 auto;
				padding: 40px;
				background-color: #333;
				border: 1px solid #444;
				box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
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
				 font-family: arial;
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
				 font-family: arial;
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

			.title{
				color : orange;
			}
			.switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 30px;
            }
            
            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }
            
            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: orange;
                -webkit-transition: .4s;
                transition: .4s;
            }
            
            .slider:before {
                position: absolute;
                content: "";
                height: 25px;
                width: 25px;
                left: 1.5px;
                bottom: 1.5px;
                border-style:solid ;
                border-width:1px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }
            
            input:checked + .slider {
                background-color: orange;
            }
            
            input:focus + .slider {
                box-shadow: 0 0 1px #EBFDE9;
            }
            
            input:checked + .slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }
            
            .slider.round {
                border-radius: 20px;
            }
            
            .slider.round:before {
                border-radius: 50%;
            }
            .toggle-container {
				margin-bottom:2%;
                display: flex;
                flex-direction: column;
                align-items: right;
                margin-left:200px;
            }
			.user-label 
            {
                margin-bottom: 1px;
                margin-top: 20px;
                margin-left:12px;
                font-size: 17px;
				color:white;
            }
			.remove{
				padding:5px;
				border-radius:10px;
				background-color:orange;
				color:black;
				font-weight:bold;
				font-family:arial;
			}
			.remove a {
				text-decoration: none;
				color: black;
				font-weight: bold;
			}
			.remove:hover{
				background-color:red;
			}
</style>
<html>
<head><title>Library Book Management System</title></head>
<?php
require_once 'dbcon.php';
require_once 'security.php';
require 'header.php';

function displayShelves() {
    global $dbconn;

    $sql = "SELECT * FROM shelf";
    $query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
    $row_count = mysqli_num_rows($query);
		
	

    if ($row_count == 0) {
        echo "	<div class='toggle-container'>
        <span class='user-label'><b>View Shelf</b></span>
        <label class='switch'>
            <input type='checkbox' id='toggleSwitch'>
            <span class='slider round'></span>
        </label>
    </div>

    <script src='TFunction2.php'></script>
    <script>
        // Ensure the toggle is not checked on Page 1
        document.getElementById('toggleSwitch').checked = false;
    </script>
<div class='container'>
		<h1 class='title'>Shelf Index</h1>
                <table class='table'>
                    <tr>
						<th>Shelf ID</th>
                        <th>Shelf Category</th>
                        <th>Shelf Number</th>
                    </tr>
                    <tr><td colspan='2'>No shelves yet.</td></tr>
                </table>
              </div>";
    } else {
        echo "	<div class='toggle-container'>
        <span class='user-label'><b>View Shelf</b></span>
        <label class='switch'>
            <input type='checkbox' id='toggleSwitch'>
            <span class='slider round'></span>
        </label>
    </div>

    <script src='TFunction2.php'></script>
    <script>
        // Ensure the toggle is not checked on Page 1
        document.getElementById('toggleSwitch').checked = false;
    </script>

		<div class='container'>
		<h1 class='title'>Shelf Index</h1>
                <table class='table'>
                    <tr>
						<th>Shelf ID</th>
                        <th>Shelf Category</th>
                        <th>Shelf Number</th>
						<th>Option</th>
                    </tr>";

        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>";
			echo "<td>" . $row['shelf_id'] . "</td>";
            echo "<td>" . $row['shelf_category'] . "</td>";
            echo "<td>" . $row['shelf_num'] . "</td>";
			echo "<td><form action='" . $_SERVER['PHP_SELF'] . "' method='post'><input type='hidden' name='shelf_id' value='".$row["shelf_id"]."'><button type='submit' name='remove' class='remove'>Remove</button></form></td>";
            echo "</tr>";
        }

        echo "    </table>
              </div>";
    }
}
//Check The Shelf If it Can Remove
		if (isset($_POST['remove'])) {
			$shelf_id = $_POST['shelf_id'];
			$sql = "DELETE FROM shelf WHERE shelf_id = ?";
			$query1 = mysqli_prepare($dbconn, $sql);
			mysqli_stmt_bind_param($query1, 'i', $shelf_id);
			mysqli_stmt_execute($query1);

			if (mysqli_stmt_affected_rows($query1) > 0) {
				echo"<script>alert('Shelf Has Been Removed ');
					window.location='" . $_SERVER['PHP_SELF'] . "'</script>";
			} else {
				echo"<script>alert('Shelf Still Have Books, Remove Book First Before Remove The Shelf ');
					window.location='" . $_SERVER['PHP_SELF'] . "'</script>";
			}
		}


displayShelves();
?>

</html>