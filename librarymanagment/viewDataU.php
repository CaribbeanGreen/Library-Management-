<?php 
include("dbcon.php");
require("security.php");
require("header.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Library Book Management System</title>
    <style>
        table-header {
            margin-bottom: 20px;
        }

        table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            background-color: #333;
            font-size: 18px;
            color: black;
        }

        table th, table td {
            padding: 18px 20px;
            text-align: left;
            border-bottom: 1px solid #444;
            font-family: arial;
        }

        table th {
            background-color: #221F20;
            border-bottom: 2px solid #221F20;
            font-size: 20px;
            font-weight: bold;
        }

        table th:first-child {
            border-top-left-radius: 6px;
        }

        table th:last-child {
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
        }

        table td {
            border-bottom: 1px solid #444;
            background: white;
        }

        table td:first-child {
            border-left: 1px solid #444;
        }

        table td:last-child {
            border-right: 1px solid #444;
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px;
        }

        table th {
            font-size: 20px;
            font-weight: bold;
        }

        table th {
            background-color: #221F20;
            border-bottom: 2px solid #555;
            color: white;
        }

        table th:last-child {
            border-bottom-right-radius: 6px;
        }

        table td {
            border-bottom: 1px solid #444;
        }

        table td:last-child {
            border-bottom-left-radius: 6px;
        }

        table td:last-child {
            border-bottom-right-radius: 6px;
        }

        .search{
            margin-left: auto;
            margin-top: auto;
        }
        .search-bar {
            width: 53%; /* Adjust as needed */
            padding: 10px;
            font-size: 16px; /* Adjust as needed */
            border: 1px solid #a2d9ce; /* Teal border color */
            border-radius: 20px; /* Rounded corners */
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1); /* Subtle shadow effect */
            outline: none;
            margin-left: 335px;
        }
        .search-container {
            position: relative;
            margin: 20px;
            background: none;
            align-content: center;
        }
        .search-button {
            top: 50%;
            transform: translateY(-50%);
            background: none;
            font-size: 24px;
            color: #0C635D; /* Dark green text color */
            margin-left: 200px;
            padding: 2px;
        }
        font {
            color: white;
            margin-left: 200px;
            font-family: arial;
            padding-left: 150px;
        }   
        .remove-btn{
            background-color: #221F20;
            color: white;
            border-radius: 10px;
            padding: 5px;
            cursor: pointer;
            transform: 0.4s;
            border: none;
        }
        .remove-btn:hover{
            background-color: orange;
            color: black;
        }
        .btn {
			width: 100px;
			height: 40px;
			background-color: #333;
			border: none;
			color: #fff;
			font-size: 15px;
			border-bottom-right-radius: 5px;
			border-bottom-right-radius: 5px;
		}

		.btn:focus {
			outline: none;
		}
		.btn:hover{
			background-color: orange;
			color: black;
		}
        
    </style>
</head>
<body>
    <?php
    if(isset($_POST['search'])) {
        $search_value = $_POST['search'];
        $sql = "SELECT * FROM user WHERE user_name LIKE '%$search_value%' OR user_id LIKE '%$search_value%'";
    } else {
        $sql = "SELECT * FROM user WHERE user_lavel = 'Member'";
    }

    $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));
    $row_count = mysqli_num_rows($query);

    
    ?>

    <!-- Search bar -->
    <div class="search-container">
        <form action="" method="post">
            <div class="searchBar">
				<input type="text" name="search" class="search-bar" required value="<?php if(isset($_POST['search'])){echo $_POST['search'];} ?>" placeholder="Type To Search">
				<button type="submit" class="btn">Search</button>
            </div>
        </form>
    </div>

    <?php
    if ($row_count == 0) {
        echo "<table >";
		echo "<tr>";
		echo "<th colspan='6'>List of User Information</th>";
		echo "</tr>";
        echo "<tr>";
        echo "<th>USER ID</th>";
        echo "<th>LAVEL</th>";
        echo "<th>USER NAME</th>";
        echo "<th>EMAIL</th>";
        echo "<th>USER PHONE NUMBER</th>";
        echo "<th>OPTIONS</th>";
        echo "</tr>";
        echo "<tr><td colspan='6'>No record found</td></tr>";
        echo "</table>";
    } else {
        echo "<table >";
		echo "<tr>";
		echo "<th colspan='6'>List of User Information</th>";
		echo "</tr>";
        echo "<tr>";
        echo "<th>USER ID</th>";
        echo "<th>LAVEL</th>";
        echo "<th>USER NAME</th>";
        echo "<th>EMAIL</th>";
        echo "<th>USER PHONE NUMBER</th>";
        echo "<th>OPTIONS</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td>".$row["user_id"]."</td>";
            echo "<td>".$row["user_lavel"]."</td>";
            echo "<td>".$row["user_name"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["user_phone_num"]."</td>";
            echo "<td>
                    <form method='POST' action='RemoveU.php'>
                        <input type='hidden' name='user_id' value='".$row["user_id"]."'>
                        <button type='submit' name='remove' class='remove-btn'>Remove</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
        
    }   
    ?>
</body>
</html>
