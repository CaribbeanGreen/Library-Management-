<?php 
include('header1.php');
?>
<!DOCTYPE html>
<html>
    <head>
	<title>Library Book Management System</title>
        <style>
  
            .content{
                width: 1200px;
                height: auto;
                margin: auto;
                color: white;
                position: relative;
            }
            
            .content .par{
                padding-left: 20px;
                padding-bottom: 25px;
                font-family: Arial;
                letter-spacing: 1.2px;
                line-height: 30px;
                font-size: 17px;
            }
            
            .content h1{
                font-family: 'Times New Roman';
                font-size: 55px;
                padding-left: 20px;
                margin-top: 9%;
                letter-spacing: 2px;
            }
            
            .form{
                background-color: rgba(0,0,0,0.8);
                width: 350px;
                height: 400px;
                position: absolute;
                top: -20px;
                left: 870px;
                border-radius: 10px;
                padding: 50px;
            }
            
            .form h2{
                width: 250px;
                font-family: sans-serif;
                text-align: center;
                color: white;
                font-size: 22px;
                background-color: orange;
                border-radius: 10px;
                margin: 1px;
                padding: 8px;
            }
            
            .form input{
                width: 260px;
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
            
            .form input:focus{
                outline: none;
            }
            
            ::placeholder{
                color: white;
                font-family: Arial;
            }
            
            .form select{
                width: 240px;
                height: 35px;
                margin-top: 30px;
                font-size: 15px;
                font-family: sans-serif;
                letter-spacing: 1px;
            }
            
            .btnn{
                width: 250px;
                height: 40px;
                background: #221F20;
                border: none;
                margin-top: 30px;
                font-size: 18px;
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
            
            .form .link{
                font-family: Arial, Helvetica, sans-serif;
                font-size: 17px;
                padding-top: 50px;
                text-align: center;
            }
            
            .form .link a{
                text-decoration: none;
                color: orange;
            }
            .footer{
                margin-top: 15%;
            }
        </style>
    </head>
    <body>
        <div class="main">
            
            <div class="content">
                <h1>Library<br><span>Management</span><br>System</h1>
                <p class="par">This is a libary system management that can change the future of reading book,<br> where you can easly borrowing the book through website.</p>
                
                <div class="form">
                    <form action="login_process.php" method="post">
                    <h2>Login Here</h2>
                    <input type="text" name="phoneNum" placeholder="Enter Phone Number Here" required>
                    <input type="password" name="password" placeholder="Enter Password Here" required>
                    <button class="btnn" type="submit"><a href=#>Login</a></button>
                    
                    <p class="link">Not a member<br>
                    <a href="signUp.php">Sign up here</a></p>
                    </form>
                </div>
                
            </div>
        </div>
        <div class="footer"><?php include('footer.php'); ?></div>
    </body>
</html>