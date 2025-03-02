<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
   
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Grid container */
.c {
    height: 100%;
    width: 100%;
    display: grid;
   
    grid-template-rows: 10%  90%;
    grid-template-areas:
                        "header header"
                        
                        "container contanier";
}


header {
    background: #ff6f61;
    color: rgb(255, 255, 255);
   height: 70px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
    padding: 0 50px;
    grid-area: header;
}
.logo {
    height: 50px; /* Adjust the height as needed */
    width: auto; /* Maintain aspect ratio */
    margin-right: 20px; /* Space between logo and navigation */
}
h1{
    color:rgb(34, 22, 30);
}
/* Navigation styles */
nav {
    flex-grow: 1;
    display: grid;
    justify-content:space-evenly;
    align-items: center;
    margin-bottom: 50px;
    margin-top: 50px;
}

nav ul {
    list-style: none;
    display: flex;
    gap: 25px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    display: inline-block;
}
     body {
        height: 100vh;
   width: 100%;
    background-size: contain;
    background-image: url(pink.png);
    background-repeat: no-repeat;
    background-position: 60vh;
        }
        .container {
            height: 550px;
            margin-left: 30px;
            max-width: 650px;
           margin-top: 15px;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
        }
        .mission {
            margin-bottom: 20px;
        }
        .team {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .team-member {
            flex: 1 1 30%;
            margin: 10px;
            padding: 10px;
            background: #e9ecef;
            border-radius: 5px;
            text-align: center;
        }
        .contact {
            margin-top: 30px;
            text-align: center;
        }
        .contact p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <?php
session_start();

// If user is NOT logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: red.php");
    exit();
}

// Prevent browser from caching this page
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
?>

    <div class="c">
    <header>
        <img src="pink.jpg" alt="Logo" class="logo">
        <nav>
            <ul>
                 <li>
                    <a href="home.php">Home</a> 
                </li>
                <li>
                    <a href="about.php">About</a>
                </li>
                
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
 <div class="container">
    <h1>About Us</h1>
    
    <div class="mission">
        <h2>Our Mission</h2>
        <p>We are dedicated to providing the best services to our customers. Our mission is to deliver high-quality products and exceptional customer service.</p>
    </div>

    <div class="team">
        <h2>Meet Our Team</h2>
        <div class="team-member">
            <h3>Sam</h3>
            <p>CEO</p>
            <p>Sam has over 20 years of experience in the industry and leads our team with passion and dedication.</p>
        </div>
        <div class="team-member">
            <h3>Deepu</h3>
            <p>CTO</p>
            <p>Deepuis a tech enthusiast who ensures our technology is always up to date and efficient.</p>
        </div>
        <div class="team-member">
            <h3>Sunil</h3>
            <p>Marketing Manager</p>
            <p> Sunil is responsible for our marketing strategies and helps us connect with our customers.</p>
        </div>
    </div>

    <div class="contact">
        <h2>Contact Us</h2>
        <p>If you have any questions, feel free to reach out!</p>
        <p>Email: pinkbus@gmail.com</p>
        <p>Phone: 9742XXXXXX</p>
    </div>
 </div>
</div>
</body>
</html>