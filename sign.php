<?php 
$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? trim($_POST['username']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    // Validate fields
    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if ($password !== $_POST['confirm_password']) {
        $errors[] = "Passwords do not match.";
    }
    
    // Proceed only if no errors
    if (empty($errors)) {
        // Database connection
        $conn = new mysqli("localhost", "root", "", "pinkbus");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors[] = "Email already registered.";
        }
        $stmt->close();

        // If no errors, insert user into database
        if (empty($errors)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Secure Hashing
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashed_password);

            if ($stmt->execute()) {
                $success = "You are registered successfully! <a href='red.php'>Login here</a>";
            } else {
                $errors[] = "Error: " . $conn->error;
            }

            $stmt->close();
        }

        $conn->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redbus Signup</title>
    <link rel="stylesheet" href="sign.css">
</head>
<body>
    <div class="c">
    <header>
        <img src="pink.jpg" alt="Logo" class="logo">
        <h1>PINK BUS</h1>
    </header>
    <div class="signup-container">
        <h1>Create an Account</h1>
        <form action="" method="POST">
        <?php include('errors.php');?>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            

         

    <div class="input-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
    </div>

            <button type="submit">Sign Up</button>
             <!-- Display Success Message -->
        <?php if (!empty($success)): ?>
            <div class="message"><?php echo $success; ?></div>
        <?php endif; ?>
      
            <p class="login-link">Already have an account? <a href="red.php">Login</a></p>
            
        </form>
       
    </div>
    </div>
</body>
</html>