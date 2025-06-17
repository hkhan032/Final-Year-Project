<?php
require 'db.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Check if username exists
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "Username already taken!";
} else {
  $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  echo "Signup successful! <a href='index.html'>Login here</a>";
}
?>