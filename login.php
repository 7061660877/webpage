<?php
// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
  
    // Database connection
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = ""; // Enter your database password here
    $dbname = "loginpage";
  
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
  
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
  
    // Query to check if user exists
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);
  
    if ($result->num_rows == 1) {
      // Login successful
      // Start session or set token
      session_start();
      $_SESSION["username"] = $username;
      header("Location: welcome.php"); // Redirect to welcome page or any other protected page
      exit();
    } else {
      // Login failed
      echo "Invalid username or password";
    }
  
    $conn->close();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h1>WELCOME TO LOGIN PAGE</h1>
    <h2>Login</h2>
    <form action="login.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
      <button type="submit"><a href=" signup.php">Signup</button>

      
    </form>
  </div>
</body>
</html>
