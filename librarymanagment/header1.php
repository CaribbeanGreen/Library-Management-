        <style>
            * {
				margin: 0;
				padding: 0;
				font-family: "futura md bt";
				text-decoration: none;
				list-style: none;
				box-sizing: border-box;
            }
            body{
                width: 100%;
                background-image:url(images/Login%20background1.jpg);
                background-position: center;
                background-size: cover;
                height: 97vh;
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
			.hamburger {
				cursor: pointer;
				display: none;
			}
			.hamburger div {
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
				.hamburger {
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
            
</style>
<html>
<header>
        <div class="logo">4ANGRYMAN</div>
        <input type="checkbox" id="nav_check" hidden>
        <nav>
            <ul>
                <li>
                    <a href="login.php" >Home</a>
                </li>
				<li>
                    <a href="about.php">About</a>
                </li>
            </ul>
        </nav>
        <label for="nav_check" class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </label>
    </header>
</html>