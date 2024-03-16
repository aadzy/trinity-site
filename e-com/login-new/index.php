<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "trinity"; 

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db_name);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Validate the username and password (replace this with your validation logic)
    $username = $_POST["email"];
    $password = $_POST["password"];

    // Example validation - replace with your actual authentication logic
    $sql = "select * from login_details where email = '$username' and PASSWORD = '$password'";  
    $result = mysqli_query($conn, $sql);  

           
    if($result->num_rows > 0){        
        // Redirect to the index.html page
        $_SESSION['username'] = $username;
        header("Location: home.html");
        exit; // Make sure to call exit after header() to prevent further execution
    } else {
        // Authentication failed, redirect back to login page with error message
        echo "<script>alert('Login unsuccessful!');</script>";
    }
} 
?>
