<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "trinity");

if(isset($_POST['signup'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "INSERT INTO login_details (name,email,password) VALUES('$name','$email','$password')";
  $query_run = mysqli_query($con, $query);
  
  if($query_run)
  {
    $_SESSION["status"] = "successfully.";
    header("Location: login.php");
  }
  else
  {
    $_SESSION["status"] = "data not inserted";
    header("Location: signup.php");
  }

}
?>
