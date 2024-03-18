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
            <a href="index.php" class="active">Home</a>
            <a href="">Books</a>
            <a href="">About Us</a>
            <a href="">Contact Us</a>
            <a href="login.php">Login</a>
        </div>
    </nav>
    <header>
        <h1>Login Page</h1>
    </header>
    <main>
        <form id="login_form" action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </main>
    <footer>
        <div id="sub-foot1">
            <h2>Quick links</h2>
            <nav>
                <a href="index.html" class="active">Home</a>
                <a href="">Books</a>
                <a href="">About Us</a>
                <a href="">Contact Us</a>
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
                <a href="index.html"><img src="Imgs\logo_img.png" alt="logo_img" id="foot_logo_img"></a>
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