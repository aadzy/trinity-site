<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "trinity"; 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signin'])) {
        // For signin form
        // Retrieve form data
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Retrieve user data from the database based on email and password
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $email;
            header("Location: ..\..\home\Home.php"); // Redirect to the home page after successful signin
            exit;
        } else {
            echo "<script>alert('Invalid email or password!');</script>";
        }
    }
}
mysqli_close($conn);
?>
