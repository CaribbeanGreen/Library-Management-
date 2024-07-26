<?php
require_once 'dbcon.php';
require_once 'security.php';
require 'header.php';

$error = '';
$success = '';

if (isset($_POST['add_shelf'])) {
    $shelf_category = $_POST['shelf_category'];
    $shelf_number = $_POST['shelf_number'];

    if (empty($shelf_category)) {
        echo "<script>alert('Please Insert The Shelf Category ');
              window.location='addshelf.php'</script>";
    } elseif (empty($shelf_number)) {
        echo "<script>alert('Please Insert The Shelf Number');
              window.location='addshelf.php'</script>";
    } elseif (!is_numeric($shelf_number) || $shelf_number <= 0) {
        echo "<script>alert('Invalid Shelf Number');
              window.location='addshelf.php'</script>";
    } else {
        // Check if the shelf number already exists
        $sql = "SELECT * FROM shelf WHERE shelf_num = ?";
        $query = mysqli_prepare($dbconn, $sql);
        mysqli_stmt_bind_param($query, 's', $shelf_number);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Shelf Number Already Exist');
              window.location='addshelf.php'</script>";
        } else {
            // Insert the new shelf
            $sql = "INSERT INTO shelf (shelf_category, shelf_num) VALUES (?, ?)";
            $query = mysqli_prepare($dbconn, $sql);
            mysqli_stmt_bind_param($query, 'ss', $shelf_category, $shelf_number);
            mysqli_stmt_execute($query);

            if (mysqli_stmt_affected_rows($query) > 0) {
                echo "<script>alert('Shelf Added Successfully');
              window.location='addshelf.php'</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($dbconn) . "');
              window.location='addshelf.php'</script>";
            }
        }
    }
}

?>

<html>
<head>
<title>Library Book Management System</title>
    <style>
        .code {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .code pre {
            padding: 20px;
            font-size: 16px;
            font-family: monospace;
            background-color: #f9f9f9;
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .code pre code {
            font-size: 16px;
            font-family: monospace;
            background-color: #f9f9f9;
            padding: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            width: 50%;
            margin: 40px auto;
            background-color: #000;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form label {
            display: block;
            margin-bottom: 10px;
            color: #f2c464;
            font-size: 18px;
			font-family:arial;
        }
        form input[type="text"], form input[type="number"] {
            width: 100%;
            height: 30px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #f2c464;
            font-size: 18px;
			font-family:arial;
        }
        form input[type="submit"] {
            width: 100%;
            height: 30px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #3e8e41;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .container p {
            font-size: 16px;
            font-weight: normal;
            margin-bottom: 20px;
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
			#shelf_number{
				padding:5;
				border-radius:6px;
			}
			label{
				 font-family: arial;
			}
			p{
				 font-family: arial;
			}
			h2{
				 font-family: arial;
			}
			
    </style>
</head>

<body>
    <div class="toggle-container">
						<span class="user-label"><b>Add Shelf</b></span>
						<label class="switch">
							<input type="checkbox" id="toggleSwitch">
							<span class="slider round"></span>
						</label>
					</div>

					<script src="TFunction2.php"></script>
					<script>
						// Ensure the toggle is checked on Page 2
						document.getElementById('toggleSwitch').checked = true;
					</script>
    <div class="container">
        <h2>Add a Shelf</h2>
        <p>Fill in the form below to add a shelf.</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="shelf_category" style="color: white; font-size: 18px;">Shelf Category:</label><br>
            <input type="text" id="shelf_category" name="shelf_category" style="color: black; font-size: 18px;"><br><br>
            <label for="shelf_capacity" style="color: white; font-size: 18px;">Shelf Number:</label><br>
            <input type="number" id="shelf_number" name="shelf_number" style="color: black; font-size: 18px;"><br><br>
            
            <input type="submit" name="add_shelf" value="Add Shelf" style="background-color: #4CAF50; color: #fff; font-size: 18px;">
        </form>
    </div>
</body>
</html>