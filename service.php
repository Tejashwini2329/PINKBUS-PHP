


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styless.css"> 
    <title>Pink Bus Booking</title>
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

    <header>
        <img src="pink.jpg" alt="Logo" class="logo">
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li>
                    <a href="#services">Services</a>
                    <ul class="dropdown">
                        <li><a href="#" class="service-link" data-service="booking">Online Booking</a></li>
                        <li><a href="#" class="service-link" data-service="tracking">Real-time Tracking</a></li>
                        <li><a href="#" class="service-link" data-service="support">Customer Support</a></li>
                        <li><a href="#" class="service-link" data-service="payment">Secure Payment</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="home">
            <h1>Welcome to Pink Bus Booking</h1>
            <p>Your journey starts here!</p>
        </section>


        
        <section id="services">
            <h2>Our Services</h2>
            <p>Explore our range of services designed for your convenience.</p>
        </section>

        <div id="serviceModal" class="modal">
            <div class="modal-content">
                
                <h2 id="modalTitle">Service Information</h2>
                <p id="modalDescription">Details about the service will be displayed here.</p>
            </div>
        </div>
        
    </main>

    <script src="script.js"></script> 
</body>
</html>