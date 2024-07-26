<?php
include("dbcon.php");
require 'security.php';
include 'header.php';


if (isset($_GET['book_id']) && $_SESSION['user_id'] && $_SESSION['user_name']) {
    $book_id = $_GET['book_id'];
	$sql1 = "UPDATE borrow SET book_id=NULL,user_id=NULL";
	mysqli_query($dbconn, $sql1);
    $sql = "DELETE FROM book WHERE book_id = '$book_id'";
    $query = mysqli_query($dbconn, $sql);

    if ($query) {
          echo "<script>alert('Book removed sucessfully.');
				window.location='removebook.php'</script>";
    } else {
        echo "Error: " . mysqli_error($dbconn);
    }
}

?>
<style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            width: 100%;
            background-position: center;
            background-size: cover;
            height: 97vh;
            font-family: Arial, sans-serif;
        }

        .searchBar {
            width: 500px;
            margin-top: 40px;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            border-color: transparent;
        }
        .bg{
            width: 100%; 
            height: 150px; 
            object-fit: cover; 
            border-radius: 10px 10px 0 0
            background-color: white;
        }

        .srch {
            font-family: 'Times New Roman';
            width: 300px;
            height: 40px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            margin-top: 13px;
            color: #333;
            font-size: 16px;
            padding: 10px;
            border-bottom-left-radius: 5px;
            border-top-left-radius: 5px;
        }

        .btn {
            width: 100px;
            height: 40px;
            background-color: #333;
            border: none;
            margin-top: 13px;
            color: #fff;
            font-size: 15px;
            border-bottom-right-radius: 5px;
            border-bottom-right-radius: 5px;
            float: left;
        }

        .btn:focus {
            outline: none;
        }
        .btn:hover{
            background-color: orange;
            color: black;
        }
        .srch:focus {
            outline: none;
        }

        main {
            max-width: 1500px;
            width: 95%;
            margin: 30px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: auto;
        }

        main .card {
            max-width: 300px;
            flex: 1 1 210px;
            text-align: center;
            height: 440px;
            border: 3px solid #45322E;
            background-color: #735E57;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        main .card .image {
            height: 72%;
            margin-bottom: 2px;
        }

        main .card .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        main .card .name {
            text-align: left;
            height: 7%;
            color: #fff;
        }

        main .card .name p {
            font-size: 1.7rem;
            font-weight: bold;
        }

        .btnn {
            padding:15px;
            border-radius:10px;
            background-color:orange;
            color:black;
            font-weight:bold;
        }

        .btnn:hover {
            background-color: green;
        }


        .caption {
            font-size: 1.2em;
            text-align: left;
            color: #fff;
        }

        .dot {
            width: 10px;
            color: #fff;
            font-weight: bold;
        }

        .book-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .book-list li {
            margin: 20px;
            padding: 20px;
            border: 1px solid #45322E;
            border-radius: 10px;
            background-color: #735E57;
            width: 300px;
            text-align: center;
        }

        .book-list li img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .book-list li .book-details {
            padding: 20px;
        }

        .book-list li .book-details p {
            font-size: 1.2em;
            color: #fff;
        }

        .book-list li .book-actions {
            text-align: center;
        }

        .book-list li .book-actions button {
            width: 100px;
            height: 25px;
            background-color: #221F20;
            border: none;
            font-size: 15px;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            color: #fff;
            transition: 0.4s ease;
        }

        .book-list li .book-actions button:hover {
            background-color: orange;
            color: pink;
        }

        table{
            font-size:20px;
            color:white;
            background: #221F20;
            width: 100%;
            height: 50px;
            border-radius: 10px 10px 10px 10px;
            padding-left:auto;
            padding-right:auto;
            margin-top:20px;
</style>
<style>
        th{
            color:black;
            border-radius: 10px 10px 10px 10px;
            width:300px;
            background-color: orange;
            font-family: arial;
        }
        td{
             font-family: arial;
        }
        .row{
            border:1px;

        }
        .remove{
            padding:15px;
            border-radius:10px;
            background-color:orange;
            color:white;
            font-weight:bold;
        }
        .remove a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        .remove:hover{
            background-color:red;
        }
            
            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 30px;
				margin-left:126px;
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
            
            }
			.user-label 
            {
				margin-left:126px;
                margin-bottom: 1px;
                margin-top: 20px;
                font-size: 17px;
				color:white;
            }
            
</style>
<html>
    <head><title>Library Book Management System</title>
        
    </head>
    <body>
        <main>
	  
				 
                    <div class="toggle-container">
						<span class="user-label"><b>Remove Book</b></span>
						<label class="switch">
							<input type="checkbox" id="toggleSwitch">
							<span class="slider round"></span>
						</label>
						<form action="" method="POST">
						<div class="searchBar">
									<input type="text" name="search" class="srch" required value="<?php if(isset($_POST['search'])){echo $_POST['search'];} ?>" placeholder="Type To Search">
									<button type="submit" class="btn">Search</button>
						</div>
						</form>
					</div>

					<script src="TFunction.php"></script>
					<script>
						// Ensure the toggle is checked on Page 2
						document.getElementById('toggleSwitch').checked = true;
					</script>
							<ul class="book-list">
         
                
                    <div class="">
					<table align='center'>
					<tr>
					<th>Book Image</th>
					<th>Book Name</th>
					<th>Book Category</th>
					<th>Status</th>
					<th colspan="2">Option</th>
					</tr>
					
					<?php
					if(isset($_POST['search'])) {
						$search_value = $_POST['search'];
						$query1="SELECT * FROM book WHERE book_name LIKE '%$search_value%'";
					} else {
						$query1="SELECT * FROM book";
					}

					$query2 = mysqli_query($dbconn, $query1) or die ("Error: " . mysqli_error());
					$row = mysqli_num_rows($query2);
					
                    
                     while($row = mysqli_fetch_array($query2)){
                ?>
					
					<tr class="row">
					
						<td><img src="<?php echo $row["book_image"]; ?>" alt="" ></td>
                        <td align='center'><?php echo $row["book_name"]; ?></td>
                        <td align='center'><?php echo $row["book_category"]; ?></td>
                        <td align='center'><?php echo $row["book_status"]; ?></td>
						<td align='center'><button class="remove"><a href="removebook.php?book_id=<?php echo $row["book_id"]; ?>" >REMOVE</a></button></td>
						<td align='center'><form action="return.php" method="post"><input type="hidden" name="book_id" value="<?php echo $row["book_id"]; ?>"><button class="btnn" type="submit">RETURN</button></form>
						</td>
					
					</tr>	
					<?php } ?>
						</table>
						
                    </div>
                   
                
                
            </ul>
        </main>
    </body>
</html>

