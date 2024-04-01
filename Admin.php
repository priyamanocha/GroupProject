<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require ('dbinit.php');
    $errors = [];
    if (!empty($_POST['book_name'])) {
        $book_name = $_POST['book_name'];
    } else {
        $errors[] = "<p>Book Name is required!!</p>";
    }
    if (!empty($_POST['book_description'])) {
        $book_description = $_POST['book_description'];
    } else {
        $errors[] = "<p>Book description is required!!</p>";
    }
    if (!empty($_POST['book_price'])) {
        $book_price = $_POST['book_price'];
    } else {
        $errors[] = "<p>Book price is required!!</p>";
    }
    if (!empty($_POST['book_author'])) {
        $book_author = $_POST['book_author'];
    } else {
        $errors[] = "Book author is required";
    }
    if (!empty($_FILES['uploadImage']['name'])) {
        $uploadImage = $_FILES['uploadImage']['name'];
    } else {
        $errors[] = "Book Image is required";
    }

    if (empty($errors)) {
        mysqli_select_db($conn, "thebookshelf");
        $query = "INSERT INTO book_details(Book_name, Book_Description, Book_Price, Book_Author,Book_Image) VALUES (?,?,?,?,?)";

        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, 'sssss', $book_name, $book_description, $book_price, $book_author, $uploadImage);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // echo "Data saved successfully.";
            $folder = "upload/";
            $target_file = $folder . basename($_FILES["uploadImage"]["name"]);
            $uploadSuccessfull = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $target_file)) {
                echo '<script>alert("Data uploaded successfully."); window.location.href = "admin.php"</script>';
            } else {
                echo "Error in uploading the image.";
            }
            exit;
        } else {
            echo "</br>Some error in saving the data";
        }

    } else {
        foreach ($errors as $error) {
            echo $error;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin - Page</title>
</head>

<body>

    <nav>
        <span id="logo">
            <a href="index.php"><img src="Imgs\logo_img.jpeg" alt="logo image" id="logo_img"></a>
        </span>
        <div id="nav_options">
            <a href="index.php" class="active">Home</a>
            <a href="products.php">Books</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact Us</a>
            <a href="login.php">Login</a>
        </div>
    </nav>

    <main>
        <div class="admin">
            <div class="admin-card">
                <div class="admin-card-content">
                    <h2 class="subtitle">Admin Login</h2>
                    <form class="adminform" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="admin_form"
                        enctype="multipart/form-data">
                        <!-- <div class="form-group">
                            <label for="bookId" class="form-label">Book Id</label>
                            <input type="text" name="book_id" id="book_id" class="form-input">
                        </div> -->
                        <div class="form-group">
                            <label for="book_name" class="form-label">Book Name</label>
                            <input type="text" name="book_name" id="book_name" class="form-input"
                                placeholder="Enter Book Name">
                        </div>
                        <div class="form-group">
                            <label for="book_description" class="form-label">Book Description</label>
                            <textarea name="book_description" id="book_description" class="form-input"
                                placeholder="Enter Book Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="book_author" class="form-label">Book Author</label>
                            <input type="text" name="book_author" id="book_author" class="form-input"
                                placeholder="Enter Book Author">
                        </div>
                        <div class="form-group">
                            <label for="book_price" class="form-label">Book Price</label>
                            <input type="text" name="book_price" id="book_price" class="form-input"
                                placeholder="Enter Book Price">
                        </div>
                        <div class="form-group">
                            <label for="book_image" class="form-label">Book Image</label>
                            <input type="file" id="uploadImage" class="form-input" name="uploadImage">
                            <button type="submit" class="submit-btn" name="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div id="sub-foot1">
            <h2>Quick links</h2>
            <nav>
                <a href="index.php" class="active">Home</a>
                <a href="products.php">Books</a>
                <a href="login.php">Login</a>
                <a href="about.php">About Us</a>
                <a href="contact.php">Contact Us</a>
            </nav>
        </div>
        <div id="sub-foot2">
            <h2>Our Speciality</h2>
            <p>Story and literature Books</p>
            <p>"Elevating your reading experience with curated collections at Shelfscape - your destination for literary
                indulgence."</p>
        </div>
        <div class="sub-foot3">
            <span id="foot_logo">
                <a href="index.php"><img src="Imgs\logo_img.jpeg" alt="logo_img" id="foot_logo_img"></a>
            </span>
            <p id="logo_line"> Where every page holds a new adventure.</p>

            <div id="social_network_links">
                <p>Join our network:</p>
                <a href="#"><img src="Imgs\foot_fb.svg" alt=""></a>
                <a href="#"><img src="Imgs\foot_ig.svg" alt=""></a>
                <a href="#"><img src="Imgs\foot_tw.svg" alt=""></a>
                <a href="#"><img src="Imgs\foot_yt.svg" alt=""></a>
            </div>
        </div>
        <p id="copyright">Copyright &copy; 2023 <b>The BookShelf</b> created by members of Group #</p>
    </footer>
    </footer>

</body>

</html>