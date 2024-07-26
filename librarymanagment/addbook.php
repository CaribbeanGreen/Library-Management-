<?php
require_once 'dbcon.php';
require 'security.php';
require 'header.php';

// Fetch shelf categories for the dropdown
$sql2  = "SELECT DISTINCT shelf_category FROM shelf";
$query2 = mysqli_query($dbconn, $sql2);

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $book_name = $_POST['book_name'];
    $book_category = $_POST['book_category'];
    $book_image = $_FILES['book_image']['name'];
    
    // Validate form data
    if (empty($book_name)) {
        echo "<script>alert('Please enter book name.'); window.location='addbook.php'</script>";
    } elseif (empty($book_category)) {
        echo "<script>alert('Please enter book category.'); window.location='addbook.php'</script>";
    } elseif (empty($book_image)) {
        echo "<script>alert('Please upload a book image.'); window.location='addbook.php'</script>";
    } else {
        // Fetch the shelf ID based on the book category
        $sql_shelf = "SELECT shelf_id FROM shelf WHERE shelf_category = '$book_category' LIMIT 1";
        $result_shelf = mysqli_query($dbconn, $sql_shelf);
        if (mysqli_num_rows($result_shelf) > 0) {
            $row_shelf = mysqli_fetch_assoc($result_shelf);
            $shelf_id = $row_shelf['shelf_id'];

            // Move the uploaded file to the server
            $target_dir = "images/";
            $target_file = $target_dir . basename($book_image);
            if (move_uploaded_file($_FILES["book_image"]["tmp_name"], $target_file)) {
                // Insert the data into the database
                $sql = "INSERT INTO book (book_name, book_category, book_image, book_status, shelf_id) VALUES ('$book_name', '$book_category', '$target_file', 'Available', '$shelf_id')";
                $query = mysqli_query($dbconn, $sql);

                // Check if the query was successful
                if ($query) {
                    echo "<script>alert('Book added successfully'); window.location='addbook.php'</script>";
                } else {
                    echo "<script>alert('Database error: " . mysqli_error($dbconn) . "'); window.location='addbook.php'</script>";
                }
            } else {
                echo "<script>alert('Error uploading image.'); window.location='addbook.php'</script>";
            }
        } else {
            echo "<script>alert('No shelf found for the selected category.'); window.location='addbook.php'</script>";
        }
    }
}

// Display the form
?>
<!DOCTYPE html>
<style>
        /* Your existing CSS styles here */
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
        }
        form input[type="text"], form input[type="number"] {
            width: 100%;
            height: 30px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: black;
            font-size: 18px;
            font-family: arial;
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
        .user-label {
            margin-bottom: 1px;
            margin-top: 20px;
            margin-left: 12px;
            font-size: 17px;
        }
        label {
            font-family: arial;
            color: #f2c464;
        }
        h2 {
            font-family: arial;
        }
        p {
            font-family: arial;
        }
        select {
            font-size: 18px;
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
            border-style: solid;
            border-width: 1px;
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
            margin-left: 200px;
        }
        .user-label {
            margin-bottom: 1px;
            margin-top: 20px;
            margin-left: 12px;
            font-size: 17px;
            color: white;
        }
    </style>
<html>
<head>
    <title>Library Book Management System</title>
    
</head>
<body>
    <div class="toggle-container">
        <span class="user-label"><b>Add Book</b></span>
        <label class="switch">
            <input type="checkbox" id="toggleSwitch">
            <span class="slider round"></span>
        </label>
    </div>

    <script src="TFunction.php"></script>
    <script>
        // Ensure the toggle is not checked on Page 1
        document.getElementById('toggleSwitch').checked = false;
    </script>

    <div class="container">
        <h2>Add a Book</h2>
        <p>Fill in the form below to add a book.</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <label for="book_name">Book Name:</label><br>
            <input type="text" id="book_name" name="book_name"><br><br>

            <label for="book_category">Book Category:</label>
            <select id="book_category" name="book_category">
                <option value="">Select Book Category</option>
                <?php while ($row_s = mysqli_fetch_assoc($query2)) { ?>
                <option value="<?php echo $row_s['shelf_category']; ?>"><?php echo $row_s['shelf_category']; ?></option>
                <?php } ?>
            </select><br><br><br>

            <label for="book_image">Book Image:</label>
            <input type="file" id="book_image" name="book_image" style='color:#f2c464; font-family:arial;'><br><br><br>

            <input type="submit" name="submit" value="Add Book" style="background-color: #4CAF50; color: #fff; font-size: 18px;">
        </form>
    </div>
</body>
</html>
  
