<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_name = "Tinity"; 

  // Create connection
  $conn = new mysqli($servername, $username, $password,$db_name);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
// echo "Connected successfully";
?>