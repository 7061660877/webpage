<!-- signup.php -->
<?php
// Handle signup form submission

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];

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

  // Query to insert new user into the database
  $query = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";

  if ($conn->query($query) === TRUE) {
    // Signup successful
    echo "Signup successful!";
  } else {
    // Signup failed
    echo "Error: " . $query . "<br>" . $conn->error;
  }

  $conn->close();
}
?>

<!-- signup.html -->
<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Signup</h2>
    <form action="signup.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="email" name="email" placeholder="Email" required>
      <button type="submit">Signup</button>
    </form>
  </div>
</body>
</html>
