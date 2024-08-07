<?php
include("connection.php");

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set
    if(isset($_POST['category1'], $_POST['category2'], $_POST['category3'], $_POST['category4'],
             $_POST['weight1'], $_POST['weight2'], $_POST['weight3'], $_POST['weight4'],
             $_POST['pickup_date'], $_POST['pickup_time'])) {
        
        // Retrieve form data
        $category1 = $_POST['category1'];
        $category2 = $_POST['category2'];
        $category3 = $_POST['category3'];
        $category4 = $_POST['category4'];
        $weight1 = $_POST['weight1'];
        $weight2 = $_POST['weight2'];
        $weight3 = $_POST['weight3'];
        $weight4 = $_POST['weight4'];
        $pickup_date = $_POST['pickup_date'];
        $pickup_time = $_POST['pickup_time'];

        // Insert data into the database
        $sql = "INSERT INTO recycling (category1, category2, category3, category4, weight1, weight2, weight3, weight4, pickup_date, pickup_time) 
                VALUES ('$category1', '$category2', '$category3', '$category4', '$weight1', '$weight2', '$weight3', '$weight4', '$pickup_date', '$pickup_time')";

        if ($conn->query($sql) === TRUE) {
            echo "We are on the way to pick up!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "One or more form fields are not set.";
    }
} else {
    echo "Form submission method is not POST.";
}
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="recyclepage.css">
  <title>Recycle page</title>
</head>
<body>
  <header>
  <div class="navbar">
    <div class="navheading">
      <p>Schedule</p>
    </div>
    <div class="nav-logo border">
      <div class="logo"></div>
    </div>
  </div>
</header>
<p class="dis">Tell us what you're giving...</p>
<div class="form1">
  <form method="post" >
    <p class="form-head">Categories</p>
    <input type="text" name="category1">
    <input type="text" name="category2">
    <input type="text" name="category3">
    <input type="text" name="category4">
    
    <p class="form-head">Weight</p>
    <input type="text" class="in" name="weight1">
    <input type="text" class="in" name="weight2">
    <input type="text" class="in" name="weight3">
    <input type="text" class="in" name="weight4">
    
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
