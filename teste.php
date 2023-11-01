<?php
if (function_exists('mysqli_connect')) {
  echo "mysqli is installed";
} else {
  echo "Enable Mysqli support in your PHP installation "; 
}

$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 