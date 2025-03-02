<?php

session_start();


$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "pinkbus");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user from database
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();



    // ✅ Verify hashed password
    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        header("Location: home.php"); // Redirect to dashboard
        exit();
    } else {
        $errors[] = "Invalid email or password.";
    }

    $stmt->close();
    $conn->close();
    session_unset();
session_destroy();

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinkbus Login</title>
    <link rel="stylesheet" href="style.css">
    <script>
    window.history.pushState(null, "", window.location.href); 
    window.onpopstate = function () {
        window.location.replace("red.php");
    };
</script>

</head>
<body>
    <div class="c">
        <header>
            <img src="pink.jpg" alt="Logo" class="logo">
            <h1>PINK BUS</h1>
            
        </header>

        <div class="login-container">
            <h1>Login to Pinkbus</h1>
            <form action="" method="POST">
             <?php include('errors.php');?>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
                <p class="forgot-password"><a href="forget.php">Forgot Password?</a></p>
            </form>
            <p class="signup">Don't have an account? <a href="sign.php">Sign Up</a></p>
        </div>
    </div>
</body>
</html>


