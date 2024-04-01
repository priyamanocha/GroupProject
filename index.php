<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Home - Page</title>
    </head>
    <body>

        <nav>
            <span id="logo">
                    <a href="index.html"><img src="Imgs\logo_img.png" alt="logo image" id="logo_img"></a>
            </span>
            <div id="nav_options">
                <a href="index.php" class="active">Home</a>
                <a href="Products.php">Books</a>
                <a href="about.php">About Us</a>
                <a href="contact.php">Contact Us</a>
                <a href="login.php">Login</a>
            </div>
        </nav>

        <header>
            <h1> Where Every Page<br/>
                    Holds a New<br/>
                Adventure  </h1>
            <a href="#"><button type="button"> Shop Now</button></a>
        </header>

        <main>
            <div id="section1">
                <h2>
                    Our Core Values
                </h2>
                <p>
                    At The Book Shelf, we're passionate about literature, curating a diverse collection with care and integrity. Our customer-centric approach ensures satisfaction through transparent, fair interactions. We actively engage with our community, innovate continuously, and promote sustainability in all our practices.
                </p>
            </div>
            <div id="section-2">

                <h2>
                    Featured Books
                </h2>

                <div class="card2">
                    <img src="Imgs\Books\Harry_Potter_philosopher_Stone.jpg" alt="Book card image">
                </div>
                <div class="card2">
                    <img src="Imgs\Books\The_Art_of_Happiness.jpg" alt="Book card image">
                </div>
                <div class="card2">
                    <img src="Imgs\Books\The_City_of_Ember.jpg" alt="Book card image">
                </div>            
                <div class="card2">
                    <img src="Imgs\Books\Think_Like_a_Monk.jpg" alt="Book card image">
                </div>

                <a href="products.php"><button type="button1"> See More </button></a>
            </div>
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
                <p>"Elevating your reading experience with curated collections at Shelfscape – your destination for literary indulgence."</p>
                
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