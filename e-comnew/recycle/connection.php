<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_name = "Trinity"; 

  // Create connection
  $conn = new mysqli($servername, $username, $password,$db_name,3308);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
// echo "Connected successfully";
?>