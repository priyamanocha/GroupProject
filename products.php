<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>The Book Shelf</title>
</head>

<body>

    <nav>
        <span id="logo">
            <a href="index.php"><img src="Imgs\logo_img.jpeg" alt="logo image" id="logo_img"></a>
        </span>
        <div id="nav_options">
            <a href="index.php">Home</a>
            <a href="products.php" class="active">Books</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact Us</a>
            <a href="login.php">Login</a>
        </div>
    </nav>
    <header>
        <h1>Products</h1>
    </header>
    <main>
        <?php
        include 'dbinit.php';

        // Fetch data from the book_details table
        $sql = "select book_name, book_description, book_price, book_author, uploadImage from book_details";
        $result = mysqli_query($conn, $sql);

        // Check if any rows are returned
        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="product-card">
                    <?php
                    // Construct the image path
                    $image_path = 'Imgs/' . $row['uploadImage'];
                    ?>
                    <img src="<?php echo $image_path; ?>" alt="<?php echo $row['book_name']; ?>">
                    <h2>
                        <?php echo $row['book_name']; ?>
                    </h2>
                    <p>
                        <?php echo $row['book_description']; ?>
                    </p>
                    <p>
                        <?php echo $row['book_price']; ?>
                    </p>
                    <p>
                        <?php echo $row['book_author']; ?>
                    </p>
                </div>
                <?php
            }
        } else {
            echo "No products found.";
        }

        mysqli_close($conn);
        ?>

    </main>
    <footer>
        <div id="sub-foot1">
            <h2>Quick links</h2>
            <nav>
                <a href="index.php">Home</a>
                <a href="products.php" class="active">Books</a>
                <a href="login.php">Login</a>
                <a href="about.php">About Us</a>
                <a href="contact.php">Contact Us</a>
            </nav>
        </div>
        <div id="sub-foot2">

            <h2>Our Speciality</h2>
            <p>Story and literature Books</p>
            <p>"Elevating your reading experience with curated collections at Shelfscape – your destination for literary
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
</body>

</html>