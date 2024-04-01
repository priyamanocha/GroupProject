<?php
include 'dbinit.php';
function validatePassword($password)
{
    // Check if password is at least 6 characters long and contains at least one uppercase letter, one lowercase letter, and one number
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/', $password);
}
function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

$email_error = $password_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $email_error = "Email is required";
    } else {
        $email = $_POST["email"];
        if (!validateEmail($email)) {
            $email_error = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $password_error = "Password is required";
    } else {
        $password = $_POST["password"];
        if (!validatePassword($password)) {
            $password_error = "Password must be at least 6 characters long and contain at least one uppercase letter, one lowercase letter, and one number";
        }
    }

    if (empty($email_error) && empty($password_error)) {
        mysqli_select_db($conn, "thebookshelf");
        $sql = "INSERT INTO login_details (EmailId, Password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header("Location: products.php");
            exit;
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }

        mysqli_stmt_close($stmt);
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
            <a href="index.php"><img src="Imgs\logo_img.jpeg" alt="logo image" id="logo_img"></a>
        </span>
        <div id="nav_options">
            <a href="index.php">Home</a>
            <a href="products.php">Books</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact Us</a>
            <a href="login.php" class="active">Login</a>
        </div>
    </nav>
    <br>
    <main>
        <h1>Register</h1>
        <form id="register_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
                <span class="error">
                    <?php echo $email_error; ?>
                </span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <span class="error">
                    <?php echo $password_error; ?>
                </span>
            </div>
            <button type="submit">Register</button>
            <p>Already have an account? <a href="login.php">Login here</a></p>
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