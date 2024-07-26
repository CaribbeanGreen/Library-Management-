<html>
    <head>
        <style>
            
            * {
				margin: 0;
				padding: 0;
				font-family: "futura md bt";
				text-decoration: none;
				list-style: none;
				box-sizing: border-box;
			}
			body {
				width: 100%;
                background-image: url(images/Login%20background.png);
                background-position: center;
                background-size: cover;
                height: 97vh;
				 font-family: arial;
			}
			header {
				background: #221F20;
				width: 100%;
				height: 70px;
				display: flex;
				align-items: center;
				justify-content: space-between;
				padding: 0 50px;
			}
			header .logo {
				font-size: 30px;
				text-transform: uppercase;
				color: orange;
			}
			header nav ul {
				display: flex;
			}
			header nav ul li a {
				display: inline-block;
				color: #fff;
				font-family: Arial;
				padding: 5px 0;
				margin: 0 10px;
				border: 3px solid transparent;
				text-transform: uppercase;
				transition: 0.2s;
			}
			header nav ul li a:hover,
			header nav ul li a.active {
				border-bottom-color: orange;
			}
			.bar {
				cursor: pointer;
				display: none;
			}
			.bar div {
				width: 30px;
				height: 3px;
				margin: 5px 0;
				background: #000;
			}
			@media only screen and (max-width: 900px) {
				header {
					padding: 0 30px;
				}
			}
			@media only screen and (max-width: 700px) {
				.bar {
					display: block;
				}
				header nav {
					position: absolute;
					width: 100%;
					left: -100%;
					top: 70px;
					width: 100%;
					background: #221F20;
					padding: 30px;
					transition: 0.3s;
				}
				header #nav_check:checked ~ nav {
					left: 0;
				}
				header nav ul {
					display: block;
				}
				header nav ul li a {
					margin: 5px 0;
				}
			}
            
            .lo{
                background-color: red;
                border-radius: 20px;
                border-color: red;
                cursor: pointer;
                transform: 0.4s ease; 
            }
            
            .lo:hover{
                background: orange;
                border-color: orange;
            }
            
        </style>
    </head>
    <body>
        <?php if($_SESSION['user_lavel'] == 'Member'){?>
        <header>
        <div class="logo">4ANGRYMAN</div>
        <input type="checkbox" id="nav_check" hidden>
        <nav>
            <ul>
                <li>
                    <a href="menu.php" >Home</a>
                </li>
				<li>
                    <a href="borrow1.php">Borrow</a>
                </li>
                <li>
                    <a href="history4.php">History</a>
                </li>
				<li>
                    <a href="editprof.php">Edit Profile</a>
                </li>
                <li>
                    <button class="lo"><a href="logout.php">Log Out</a></button>
                </li>
            </ul>
        </nav>
          
        <label for="nav_check" class="bar">
            <div></div>
            <div></div>
            <div></div>
        </label>
    </header>
        
    <?php }else{?>
        
        <header>
        <div class="logo">4ANGRYMAN</div>
        <input type="checkbox" id="nav_check" hidden>
        <nav>
            <ul>
                <li>
                    <a href="menu.php" >Home</a>
                </li>
				<li>
                    <a href="removebook.php">Edit Book</a>
                </li>
                <li>
                    <a href="addshelf.php">Edit Shelf</a>
                </li>
				<li>
                    <a href="viewDataU.php">Edit User</a>
                </li>
                <li>
                    <a href="history1.php">History</a>
                </li>
                <li>
                    <button class="lo"><a href="logout.php">Log Out</a></button>
                </li>
            </ul>
        </nav>
        <label for="nav_check" class="bar">
            <div></div>
            <div></div>
            <div></div>
        </label>
    </header>
		
    <?php } ?>
        
    </body>
</html>