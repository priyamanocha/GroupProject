<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('db_connection.php');
    $errors = [];

    function is_numeric_only($phno){
        if(preg_match("/^[0-9]+$/", $phno)) {
            return true; // Only numbers are present
        } else { 
            return false;
        }
    }

    if(!empty($_POST['firstName'])){
        $firstName= $_POST['firstName'];  
    } else {
        $errors[] = "<p>Error!!!!First Name is required!!</p>";
    }
    if(!empty($_POST['lastName'])){
        $lastName= $_POST['lastName'];  
    } else {
        $errors[] = "<p>Error!!!!Last Name is required!!</p>";
    }
    if(!empty($_POST['email'])){
        $email = $_POST['email'];  
    } else {
        $errors[] = "<p>Email is required!!</p>";
    }
    if(!empty($_POST['phno'])){
        $phno = $_POST['phno'];  
    } else {
        $errors[] = "<p>Phone is required!!</p>";
    }
    if(!empty($_POST['message'])){
        $message = $_POST['message'];  
    } else {
        $errors[] = "<p>Message is required!!</p>";
    }
    if(!empty($_POST['province'])){
        $province = $_POST['province'];  
    } else {
        $errors[] = "<p>Province is required!!</p>";
    }

    if(empty($errors)){
        
        // Prepare input data for database insertion
        $fn = prepare_string($dbc, $firstName);
        $ln = prepare_string($dbc, $lastName);
        $email = prepare_string($dbc, $email);
        $phn = prepare_string($dbc, $phno);
        $province = prepare_string($dbc, $province);
        $msg = prepare_string($dbc, $message);
        
        $query = "INSERT INTO contact(firstName, lastName, email, phno, province, message) VALUES (?,?,?,?,?,?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, 'ssssss', $fn, $ln, $email, $phn, $province, $msg);

        $result = mysqli_stmt_execute($stmt);
        
        if($result){
            // header("Location: contact.php");
            exit;
        } else {
            echo "</br>Some error in saving the data";
        }
        
    } else {
        foreach($errors as $error){
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
    <title>Contact Us - Page</title>
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

<main>
    <div class="container">
     
        <div class="container2">
            <div class="card">
                <div class="card-content">
                    <h2>Email</h2>
               <p> abc@gmail.com</p>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <h2>Address</h2>
                  <p>Kitchener,Ontario</p>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <h2>Phone Number</h2>
                   <p> +1 1234567890</p>
                </div>
            </div>
        </div>
        <div class="form-card">
            <div class="card-content">
                <h2 class="subtitle">Get In Touch With Us!</h2>
                <form class="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="contact_form">
                    <div class="contact-info">
                        <input type="text" name="firstName" id="firstName" placeholder="First Name   Last Name">
                        <input type="text" name="lastName" id="lastName" placeholder="Last Name" hidden>
                        <input type="email" name="email" id="email" placeholder="Email">
                        <input type="text" name="phno" id="phno" placeholder="Phone Number">
                        <select name="province" id="province">
                            <option value="" selected disabled hidden>Choose Province...</option>
                            <option value="alberta">Alberta</option>
                            <option value="ns">Nova Scotia</option>
                            <option value="nb">New Brunswick</option>
                            <option value="on">Ontario</option>
                        </select>
                        <textarea name="message" id="message" placeholder="Enter Your Message"></textarea>
                        <button type="submit" class="sendsubmit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
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
</footer>

</body>
</html>
