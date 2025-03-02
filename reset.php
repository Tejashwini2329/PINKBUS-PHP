


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = "";

// Ensure token is present in the URL
$token = isset($_GET['token']) ? $_GET['token'] : "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];

    $conn = new mysqli("localhost", "root", "", "pinkbus");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if token exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE reset_token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        $message = "<p class='error'>Invalid or expired reset token.</p>";
        $stmt->close(); // ✅ Close statement before exiting
    } else {
        $stmt->close(); // ✅ Close first statement before proceeding


        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update password for the user and remove reset token
        $stmt = $conn->prepare("UPDATE users SET password=?, reset_token=NULL WHERE reset_token=?");
        $stmt->bind_param("ss", $hashed_password, $token);
        
        if ($stmt->execute()) {
            $message = "<p class='message'>Password reset successful! <a href='red.php'>Login here</a></p>";
        } else {
            $message = "<p class='error'>Error updating password.</p>";
        }
        
        $stmt->close();
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css">
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
                        
                        "forgot-password-container forgot-password-contanier";
}


header {
    background: #ff6f61;
    color: white;
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
    font-family: Arial, sans-serif;
    background-image: url(https://img.freepik.com/free-vector/pink-school-bus-isolated-white-background_1308-134946.jpg);
    height: 100vh;
    width: 100%;
   background-size: 800px;

   background-repeat: no-repeat;
   background-position: 80vh;
}

       .container{
        background-color: rgb(48, 185, 219);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
   height: 250px;
   margin-top: 100px;
   margin-left: 50px;
    width: 500px;
    backdrop-filter: blur(20px);
       } 
       .input-group input{
        border: 2px solid black;
       }
       button {
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

       button:hover {
            background: #0056b3;
        }
        .message {
            margin-top: 15px;
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            margin-top: 15px;
        }

    
    </style>
</head>
<body>
<div class="c">
        <header>
            <img src="pink.jpg" alt="Logo" class="logo">
            <h1>PINK BUS </h1>
                
                
        </header>
 <div class="container">
    <h2>Reset Password</h2>
    <form method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
        <div class="input-group">
            <label for="new_password">Enter New Password</label>
            <input type="password" id="new_password" name="new_password" required>
        </div>
        <button type="submit">Reset Password</button>
    </form>
        <?php echo $message; ?>
  
  </div>
 
</div>

</body>
</html>
