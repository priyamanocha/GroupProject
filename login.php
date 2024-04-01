<?php
include 'dbinit.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM login_details WHERE EmailId = ? AND Password = ?";
        $stmt = mysqli_prepare($conn, $sql);
        echo $conn;
        echo $stmt;
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            header("Location: products.php");
            exit;
        } else {
            $error_message = "Invalid username and password combination.";
        }

        mysqli_stmt_close($stmt);
    } else {
        $error_message = "Please provide both email and password.";
    }
}

mysqli_close($conn);
?>
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
            <a href="index.php"><img src="Imgs\logo_img.png" alt="logo image" id="logo_img"></a>
        </span>
        <div id="nav_options">
            <a href="index.php">Home</a>
            <a href="products.php" class="active">Books</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact Us</a>
            <a href="login.php">Login</a>
            <p>Admin <a href="Admin.php">Login as Admin</a></p>
        </div>
    </nav>

    <br>
    <main>
        <h1>Login</h1>
        <form id="login_form" action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="error-message">
                <?php if (isset($error_message)) { ?>
                    <p class="error">
                        <?php echo $error_message; ?>
                    </p>
                <?php } ?>
            </div>
            <button type="submit">Login</button>
            <p>Not registered yet? <a href="register.php">Register here</a></p>
        </form>

    </main>
    <footer>
        <div id="sub-foot1">
            <h2>Quick links</h2>
            <nav>
                <a href="index.php">Home</a>
                <a href="products.php">Books</a>
                <a href="login.php" class="active">Login</a>
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
                <a href="index.php"><img src="Imgs\logo_img.png" alt="logo_img" id="foot_logo_img"></a>
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