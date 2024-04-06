<?php
  include("connection.php");
  $cart_id = $_POST['cart_id'];
  $sql = "DELETE FROM cart WHERE cart_id = $cart_id";

  // Execute the SQL query
  if ($conn->query($sql) === TRUE) 
  {
    echo "<script>alert('Product Removed!'); window.history.back();</script>";
  } 
  else 
  {
      echo "Error deleting record: " . $conn->error;
  }

  // Close the database connection
  $conn->close();
?>