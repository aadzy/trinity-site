<?php
    // Check if session is not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include("connection.php");
    
    $sql = "SELECT * FROM productlist;";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="productlist.css">
  <title>Trinity product</title>
</head>
<body>
    <div class="navbar">
      <div class="navheading">
        <p>Our products</p>
      </div>
      <div class="nav-search">
        <input placeholder="Trinity Search" class="search-input">
        <div class="search-icon">
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
      </div>
      <div class="navkart">
          <i class="fa-solid fa-cart-shopping"></i>
        </div>
      <div class="nav-logo border">
        <a href="../home/home.php" class="r-button">
          <div class="logo"></div>
        </a>
      </div>
    </div>
  </header>
  <div class="hero-productbox1">
    <?php
    if ($result->num_rows > 0) {
        $count = 0;
        echo '<div class="row">';
        while ($row = $result->fetch_assoc()) {
          if ($count % 4 == 0 && $count != 0) {
              echo '</div><div class="row">'; 
          }
          echo '<a href="product.php?id=' . $row['Sno'].'" style="text-decoration: none;">';
          echo '<div class="product-box">
                  <div class="productimg">
                  <img src="' . $row["img1"] . '" style="height: 250px; width: 290px;" alt="">
                  </div>
                  <div class="box-dis">
                      <div class="box name"><p>' . $row["brand"] . '</p></div>
                      <p class="box head">' . $row["product_title"] . '</p>
                      <p class="box price"><i class="fa-solid fa-indian-rupee-sign"></i>' . $row["prices"] . '</p>
                      <button class="add-to-cart-btn">Add to Cart</button>
                  </div>
              </div>';
          echo '</a>'; 
          $count++;
      }
        echo '</div>'; 
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</div>

  <div class="copyright">
    <p class="copy">© Trinity. All rights reserved.</p>
  </div>
</body>
</html>
