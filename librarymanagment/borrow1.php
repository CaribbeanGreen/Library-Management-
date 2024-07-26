<?php
include("dbcon.php");
require 'security.php';
include 'header.php';

function addToHistory($book_id, $borrow_book, $user_id, $borrow_name, $borrow_phone) {
    global $dbconn;
    $sql = "INSERT INTO borrow (book_id, borrow_book, user_id, borrow_name, borrow_phone) 
            VALUES ('$book_id', '$borrow_book', '$user_id', '$borrow_name', '$borrow_phone')";
    
    $query = mysqli_query($dbconn,$sql);
   
}

    if (isset($_GET['book_id']) && isset($_GET['book_name']) && $_SESSION['user_id'] && $_SESSION['user_phone'] && $_SESSION['user_name'] && isset($_GET['book_status'])){
        $status = $_GET['book_status'];
        $book_id = $_GET['book_id'];
        $borrow_book = $_GET['book_name'];
        $user_id = $_SESSION['user_id'];
        $borrow_name= $_SESSION['user_name'];
        $borrow_phone = $_SESSION['user_phone'];

if($status !== 'Not Available'){
        addToHistory($book_id, $borrow_book, $user_id, $borrow_name, $borrow_phone);
        
        $sql2 = "UPDATE book SET book_status = 'Not Available' WHERE book_id = $book_id";
        $query2 = mysqli_query($dbconn,$sql2);

}
else{
    echo "<script>alert('Sorry The Book is Not Available!!');
window.location='borrow1.php'</script>";

}
    }


        
        if(isset($_POST['search'])) {
            $search_value = $_POST['search'];
            $query1="SELECT * FROM book WHERE book_name LIKE '%$search_value%'";
        } else {
            $query1="SELECT * FROM book";
        }

        $query = mysqli_query($dbconn, $query1) or die ("Error: " . mysqli_error());
        $row = mysqli_num_rows($query);

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
                height: 97vh;
            }
             
            .searchBar{
                width: 500px;
                margin-top: 40px;
                margin-left: auto;
                margin-right: auto;
            }
            
            .srch{
                font-family: 'Times New Roman';
                width: 300px;
                height: 40px;
                background: white;
                border: 1px solid black;
                margin-top: 13px;
                color: black;
                border-right: none;
                font-size: 16px;
                float: left;
                padding: 10px
                border-bottom-left-radius: 5px;
                border-top-left-radius: 5px;
            }
            
            .btn{
                width: 100px;
                height: 40px;
                background: black;
                border: 2px solid black;
                margin-top: 13px;
                color: white;
                font-size: 15px;
                border-bottom-right-radius: 5px;
                border-bottom-right-radius: 5px;
                float: left;
                
            }
            
            .btn:focus{
                outline: none;
            }
            .btn:hover{
				background-color:orange;
				color:black;
			}
            .srch:focus{
                outline: none;
            }
            
            main{
                max-width: 1500px;
                width: 95%;
                margin: 30px auto;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                margin: auto;
            }
            
            main .card{
                max-width: 300px;
                flex: 1 1 210px;
                text-align: center;
                height: 440px;
                border: 3px solid #45322E;
                background-color: #735E57;
                margin: 20px;
            }
            
            main .card .image{
                height: 72%;
                margin-bottom: 2px;
            }
            
            main .card .image img{
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            
            main .card .name{
                text-align: left;
                height: 7%;
                color: white;
            }
            
            main .card .name p{
                font-size: 1.7rem;
            }
            
             .btnn{
                width: 100px;
                height: 25px;
                background: #221F20;
                border: none;
                font-size: 15px;
                font-weight: bold;
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
            
            .caption{
                font-size: 1.2em;
                text-align: left;
                color: white;
                font-family: arial;
            }
            
            .dot{
				width:10px;
				color:white;
                font-weight:bold;
            }
            
			
        </style>
    </head>
    <body>
        
        <form action="" method="POST">
        <div class="searchBar">
                    <input type="text" name="search" class="srch" required value="<?php if(isset($_POST['search'])){echo $_POST['search'];} ?>" placeholder="Type To Search">
                    <button type="submit" class="btn">Search</button>
        </div>
        </form>
            
        <main>
            <?php

                while($row = mysqli_fetch_array($query)){
                if($row == 0){
                echo "No record found";
            }
            else{
            ?>
           <form method="post"> 
           <table class="card">
				<tr>
						<td colspan="3" align="center" name="image"><img src="<?php echo $row["book_image"]; ?>" alt=""></td>
					</tr>
                    <tr>
                        <td class="caption"> NAME</td>
                        <td class="dot"> : </td>
                        <td class="caption" name="bookName"> <?php echo $row["book_name"]; ?></td>
                    </tr>
                    <tr>
                        <td class="caption"> GENRE</td>
                        <td class="dot"> : </td>
                        <td class="caption" name="bookCat"><?php echo $row["book_category"]; ?></td>
                    </tr>
                    <tr>
                        <td class="caption"> STATUS</td>
                        <td class="dot"> : </td>
                        <td class="caption" name="bookStat"><?php echo $row["book_status"]; ?></td>
                    </tr>
					<tr>
						<td colspan="3" align="center"><button class="btnn"><a href="borrow1.php?book_id=<?php echo $row["book_id"]; ?>&book_name=<?php echo $row["book_name"]; ?>&book_category=<?php echo $row["book_category"]; ?>&book_image=<?php echo $row["book_image"]; ?>&book_status=<?php echo $row["book_status"]; ?>&shelf_id=<?php echo $row["shelf_id"]; ?>" >BORROW</a></button></td>
					</tr>
                </table>
				</form>
            
            <?php
                }
                }
            ?>
        </main>
        
    </body>
</html>
