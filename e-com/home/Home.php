<?php  
$servername = "localhost";
$username = "root";
$password = "";
$database = "trinity";

$conn = new mysqli($servername, $username, $password, $database, 3308);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "'SELECT SUM(weight) AS totalWeight FROM waste where status like '%rec%'";

$result = $conn->query($sql);


?>