<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1️⃣ Collect form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);

    // 2️⃣ Validate Inputs
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        die("⚠ All fields are required!");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("⚠ Invalid email format!");
    }

    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        die("⚠ Invalid phone number! Must be 10 digits.");
    }

    // 3️⃣ Database Connection
    $conn = new mysqli("localhost", "root", "", "pinkbus");

    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // 4️⃣ Insert Data into Database
    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $message);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Thank you! Your message has been sent.'); window.location.href='contact.html';</script>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    // 5️⃣ Close the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "❌ Invalid request!";
}
?>
