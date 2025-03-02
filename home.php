<?php
session_start();

// If no active session, redirect to login page
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
    <title>Pinkbus - Book Your Bus Tickets</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="c">
        <header>
            <img src="pink.jpg" alt="Logo" class="logo">
            <h1>PINK BUS </h1>
            <div class="container">
                
                <nav>
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="service.php">Services</a>
                           
                        </li>
                        <li><a href="red.php">Login</a></li>
                        <li> <a href="logout.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <section class="hero">
            <div class="container">
                <h1>Book Your Bus Tickets Online</h1>
                <p>Find the best bus deals and book your tickets quickly and easily.</p>
                <button class="btn">Book Now</button>
            </div>
        </section>

        <section class="question">
            <a href="questions.html">Frequently Asked Questions</a>
        </section>

        <section class="testimonials">
            <div class="container">
                <h2>What Our Customers Say</h2>
                <div class="testimonial">
                    <p>"Pinkbus is the best online bus booking platform! I always find the best deals and the booking process is so easy." </p>
                </div>
                <div class="testimonial">
                    <p>"I highly recommend Pinkbus for anyone looking to book bus tickets. The customer service is excellent and I always feel confident in my booking."</p>
                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <p>&copy; 2023 Pinkbus. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
