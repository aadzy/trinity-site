<?php
include("connection.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (isset($_POST["cid"]) && isset($_POST["pid"]) && isset($_POST["qnty"])) {
      // Sanitize input data to prevent SQL injection
      $cid = mysqli_real_escape_string($conn, $_POST["cid"]);
      $pid = mysqli_real_escape_string($conn, $_POST["pid"]);
      $quantity = mysqli_real_escape_string($conn, $_POST["qnty"]);
      echo "<script>alert('Added product!'); window.history.back();</script>";
      // Prepare the SQL INSERT statement
      $sql = "INSERT INTO cart (c_id, prod_id, quantity) VALUES ('$cid', '$pid', '$quantity')";
      
      // Execute the INSERT statement
      if ($conn->query($sql) === false) {
        echo "Error: " . $sql . "<br>" . $conn->error;
      } 
  } else {
      echo "All fields are required.";
  }
}

?>
