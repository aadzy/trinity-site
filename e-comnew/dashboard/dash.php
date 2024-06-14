<?php
include("connection.php");
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../login-new/login.html");
    exit();
} 

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM users WHERE user_id = $user_id";
$result = $conn->query($sql);

$user_data = [];
if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
} else {
    echo "User not found";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trinity | Dashboard</title>
    <link  rel= "stylesheet" href="dash.css" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/themes/odometer-theme-default.css"
      integrity="sha512-kMPqFnKueEwgQFzXLEEl671aHhQqrZLS5IP3HzqdfozaST/EgU+/wkM07JCmXFAt9GO810I//8DBonsJUzGQsQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
  />
</head>
<body>
    <header>
        <div class="navbar">

            <div class="user-details">

            


                <div id="sidebar">
                    
                    <div class="user-pic">
                        <img src="Default_pfp.svg.png" class="pfp">
                    </div>

                    <div class="list">
                        <a href="#schedule" class="item">Name: <?php echo $user_data["name"];?></a>
                        <a href="#products" class="item">Address: <?php echo $user_data["address"];?></a>
                    </div>

                </div>
            </div>


        
            <div class="nav-logo" >
                <a href="../home/home.php" class="r-button">
                    <img src="logo.png" class="logo" onclick="toggleSidebar(this)">  
                </a>
            </div>

        </div> 
    </header> 


      
    <div class="hero-section">
        <div class="hero-bg">
        <div class="counter kg">0</div>

            <div class="pie-wrapper">

                <canvas id="piechart" style="width:150%;max-width:1000px"></canvas>

            </div>
        </div>

        

        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/odometer.min.js"
            integrity="sha512-v3fZyWIk7kh9yGNQZf1SnSjIxjAKsYbg6UQ+B+QxAZqJQLrN3jMjrdNwcxV6tis6S0s1xyVDZrDz9UoRLfRpWw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
            >
        </script>
        <script src="dash.js"></script>
    </div>

    <div class="button">
        
        <div class="p-button">
            <a href="../recycle/recycleschedule.php">
              Schedule your next pickup
            </a>
        </div>
          
        <div class="p-button">
            <a href="../productpage/productlist.php" >
              Buy more products
            </a>
          </div>
      </div>
        
        
    
</body>
</html>