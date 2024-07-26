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
			font-family:arial;
            display: block;
            margin-bottom: 10px;
            color: #f2c464;
            font-size: 18px;
        }
        form input[type="text"], form input[type="email"], form input[type="tel"], form input[type="password"] {
            width: 100%;
            height: 30px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: black;
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
            font-family: arial;
        }
        .container p {
            font-size: 16px;
            font-weight: normal;
            margin-bottom: 20px;
            font-family: arial;
        }
    </style>
</head>

<?php

require_once 'dbcon.php';
require 'security.php';
require 'header.php';

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the submitted data
    $user_name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $user_phone_num = $_POST['phone'];
    $user_id = $_SESSION['user_id'];
    $user_nameS = $_SESSION['user_name'];
    // Validate the data
    if (empty($user_name)) {
          echo "<script>alert('Please enter your username :>');
				window.location='editprof.php'</script>";
    } elseif (empty($password)) {
        "<script>alert('Please enter your password :>');
				window.location='editprof.php'</script>";
    } elseif (empty($email)) {
        "<script>alert('Please enter your email :>');
				window.location='editprof.php'</script>";
    } elseif (empty($user_phone_num)) {
        "<script>alert('Please enter your phone number :>');
				window.location='editprof.php'</script>";
    } else {
        // Update the user's details
        $query3 = "UPDATE borrow SET borrow_name = '$user_name', borrow_phone = '$user_phone_num' WHERE borrow_name = '$user_nameS'"; 
        mysqli_query($dbconn, $query3);
        $query2 = "UPDATE user SET user_name = '$user_name', password = '$password', email = '$email', user_phone_num = '$user_phone_num' WHERE user_id = '$user_id'";
        $result = mysqli_query($dbconn, $query2);

        // Check if the update was successful
        if ($result) {
            echo "<script>alert('Updated Successfully. Please log in again to update information');
                  window.location='logout.php'</script>";
        } else {
            echo "<script>alert('Fail to Sign Up');
					window.location='editprof.php'</script>";
        }
    }
}

// Display the form
if (isset($error)) {
    echo '<p style="color: red;">' . $error . '</p>';
} elseif (isset($success)) {
    echo '<p style="color: green;">' . $success . '</p>';
} else {
    ?>
    
    <body>
        <div class="container">
            <h2>Update Your Details</h2>
            <p>Fill in the form below to update your details.</p>
            <form action="" method="post">
                <label for="name" >Name:</label>
                <input type="text" id="name" name="name" value="" ><br><br>
                <label for="password" >Password:</label>
                <input type="password" id="password" name="password" ><br><br>
                <label for="email" >Email:</label>
                <input type="email" id="email" name="email" value="" ><br><br>
                <label for="phone" >Phone:</label>
                <input type="tel" id="phone" name="phone" value="" ><br><br>
                <input type="submit" name="submit" value="Update" style="background-color: #4CAF50; color: #fff; font-size: 18px;">
            </form>
        </div>
    </body>
    <?php
}
?>
</html>