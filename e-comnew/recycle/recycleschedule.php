<?php

include("connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if user is logged in
  if (!isset($_SESSION['user_id'])) {
      // Redirect to login page if not logged in
      header("Location: ../login-new/login.html");
      exit();
  } 
  $id = $_SESSION['user_id'];
  $category = $_POST['category'];
  $weight = $_POST['weight'];
  $pickup_date = $_POST['pickup_date'];
  $pickup_time = $_POST['pickup_time'];
  $status = "Pending";

       
  $sql = "INSERT INTO waste (user_id,category, weight, status, pickup_date, pickup_time) VALUES ('$id','$category', '$weight','$status', '$pickup_date', '$pickup_time')";

  if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Inserted successfully");</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
       
$conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="recycleschedule.css">
  <title>Recycle page</title>
</head>
<body>
  <header>
  <div class="navbar">
    <div class="navheading">
      <p>Schedule</p>
    </div>
    <div class="nav-logo border">
    <a href="../home/home.php" class="r-button">      
        <div class="logo"></div>
      </a>
    </div>
  </div>
</header>
<p class="dis">Tell us what you're giving...</p>
<div class="form1">
  <form method="post">
    <div class="category-weight-container">
        <div class="form-categories">
            <p class="form-categories-title">Categories</p>
            <select name="category" class="category-input">
                <option value="">Select a category</option>
                <option value="Plastic">Plastic</option>
                <option value="Wood">Wood</option>
                <option value="Electronic">Electronic</option>
                <option value="Paper">Paper</option>
                <option value="Metal">Metal</option>
            </select>
        </div>

        <div class="form-weight">
            <p class="form-weight-title">Weight</p>
            <input type="text" class="in weight-input" name="weight">
        </div>
    </div>
    <p class="form-head">Select pickup date</p>
    <input type="date" id="eventDate" name="pickup_date">
    <br>
    <p class="form-head">Time</p>
    <input type="time" id="eventTime" name="pickup_time">
    
    <input type="submit" value="Submit" class="submit">
  </form>
</div>
<div class="copyright">
  <p class="copy">© Trinity. All rights reserved.</p>
</div>
</body>
</html>
