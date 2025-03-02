
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    
    <style>
        /* Reset some default styles */
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
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           margin-left: 50px;
           margin-top: 100px;
        }
        h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #5cb85c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 95%;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
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
    <h2>Contact Us</h2>
    <form action="submit.php" method="POST"> <!-- Change the action to your server-side script -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>