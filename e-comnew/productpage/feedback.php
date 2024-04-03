<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Feedback Form</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
  }

  .container {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 100px;
  }

  h2 {
    text-align: center;
    color: #333;
  }

  .form-group {
    margin-bottom: 20px;
  }

  label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }

  input[type="text"],
  input[type="email"],
  textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }

  textarea {
    height: 100px;
  }

  input[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #040165;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }
  * {
    margin: 0;
    font-family: Arial;
    box-sizing: border-box;
  }
  
.navbar {
    height: 90px;
    display: flex;
    align-items: center;
    background-color: #040165;
  }
  
  .navheading p {
    font-size: 2.5rem;
    color: #ffffff;
    font-family: 'Bodoni';
    padding: 5px;
    width: 300px;
  }
  
  .nav-search {
    display: flex;
    margin-left: 70%; 
    width: 730px;
    height: 40px;
  }
  
  .search-input {
    width: 100%;
    font-size: 1rem;
    border: none;
    color: #000000;
    border-radius: 50px;
    padding-left: 10px;
  }
  
  .search-icon {
    position: relative;
    top: 5px;
    left: 10px;
    width: 45px;
    justify-content: center;
    align-items: center;
    font-size: 1.5rem;
    color: #ffffff;
    padding-bottom: 7px;
  }
  
  .navkart {
    position: relative;
    justify-content: center;
    align-items: center;
    top: 5px;
    left: 500px;
    font-size: 30px;
    color: #ffffff;
    padding-left: 10rem; 
  }
  
  .nav-logo {
    height: 200px; /* Adjust height as needed */
    width: 200px; /* Adjust width as needed */
    margin-left: 75%; /* Adjust margin as needed */
    background-image: url("logo.png");
    background-size: cover;
    transition: transform 0.3s ease;
  }
  
  .logo {
    background-size: cover;
    height: 150px;
    width: 100%;
  }
  
  .nav-logo:hover {
    transform: scale(1.1);
  }

  .copyright {
  font-size: 1rem;
  display: flex;
  align-items: end;
  justify-content: center;
  padding-top: 25px;
  color: #ffffff;
  background-color:#040165;
  margin-top: 35%;
}
</style>
</head>
<body>
  <header>
    <div class="navbar">
      <div class="navheading">
        <p>Customer Support</p>
      </div>
      <div class="nav-logo border">
        <div class="logo"></div>
      </div>
    </div>
  </header>

<div class="container">
  <h2>Feedback Form</h2>
  <form id="feedbackForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="message">Message:</label>
      <textarea id="message" name="message" required></textarea>
    </div>
    <input type="submit" name="submit" value="Submit">
  </form>
</div>

<footer>
  <p class="copy">© Trinity. All rights reserved.</p>
</footer>

<?php
include("connection.php");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Set parameters and execute
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $stmt->execute();

    echo "<script>alert('Feedback submitted successfully');</script>";

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
</body>
</html>
