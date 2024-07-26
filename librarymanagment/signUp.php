<?php

require 'dbcon.php';

include 'header1.php';


if (isset($_POST['submit'])) {
    

$userName = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];
$phoneNum = $_POST['phoneNum'];
$userLavel = $_POST['lavel'];
    
$query = mysqli_query($dbconn, "SELECT * FROM user ");
$row = mysqli_fetch_assoc($query);

  

if ($phoneNum !== $row['user_phone_num']) {
        $signUp = "INSERT INTO user (user_id,user_name,password,email,user_phone_num,user_lavel)
    VALUES ('','$userName','$password','$email','$phoneNum','$userLavel')";
    $result = mysqli_query($dbconn, $signUp);
    echo "<script>alert('Successfully Sign Up');
    window.location='login.php'</script>";
}else{
    echo "<script>alert('Phone Number Already Exist');
    window.location='signUp.php'</script>";
}
}

?>

<html>
    <head>
	<title>Library Book Management System</title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            
            body{
                width: 100%;
                background-position: center;
                background-size: cover;
                height: 94vh;
            }
            
            form{
                display: flex;
                flex-direction: column;
                background-color: rgba(0,0,0,0.8);
                width: 500px;
                height: 525px;
                align-items: center;
                border-radius: 10px;
                margin-left: auto;
                margin-right: auto;
                margin-top: 20px;
                padding: 70px;
            }
            
            form h2{
                width: 400px;
                font-family: sans-serif;
                text-align: center;
                color: white;
                font-size: 22px;
                background-color: orange;
                border-radius: 10px;
                margin: 2px;
                padding: 8px;
            }
            
            form input{
                width: 400px;
                height: 35px;
                background: transparent;
                border-bottom: 1px solid white;
                border-top: none;
                border-left: none;
                border-right: none;
                color: white;
                font-size: 15px;
                letter-spacing: 1px;
                margin-top: 30px;
                font-family: sans-serif;
            }
            
            form input:focus{
                outline: none;
            }
            
            ::placeholder{
                color: white;
                font-family: Arial;
            }
            
            form select{
                width: 240px;
                height: 50px;
                margin-top: 30px;
                font-size: 15px;
                font-family: sans-serif;
                letter-spacing: 1px;
            }
            
            .btnn{
                width: 240px;
                height: 50px;
                background: #221F20;
                border: none;
                margin-top: 40px;
                font-size: 25px;
                border-radius: 10px;
                cursor: pointer;
                color: white;
                transition: 0.4s ease;
            }
            
            .btnn:hover{
                background: orange;
                color: pink;
            }
            
            .btnn a{
                text-decoration: none;
                color: white;
                font-weight: bold;
            }
            
            form .link{
                font-family: Arial, Helvetica, sans-serif;
                font-size: 17px;
                padding-top: 20px;
                text-align: center;
                color: white;
            }
            
            form .link a{
                text-decoration: none;
                color: orange;
            }
            
        </style>
    </head>
    <body>
        <div class="main">
             
                 <form method="POST">
                    <h2>Sign Up</h2>
                    <input type="text" name="name" placeholder="Enter Your Name Here" required>
                    <input type="text" name="phoneNum" maxlegth='6' placeholder="Enter Phone Number Here Without -" required>
                    <input type="email" name="email" placeholder="Enter Email Here" required>
                    <input type="password" name="password" placeholder="Enter Password Here 6 Digit Only" required>
                    <select id="lavel" name="lavel" required>
                        <option value="">-- User Level --</option>
                        <option value="Member">Member</option>
                        <option value="Staff">Admin/Staff</option>
                    </select>
                    <button class="btnn" type="submit" name="submit">Submit</button>
                    
                    <p class="link">Already member<br>
                    <a href="login.php">Login here</a></p>
                 </form>
            
        </div>
    </body>
</html>