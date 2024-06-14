<?php
include("connection.php");

if(isset($_GET["id"]))
{
    $id = mysqli_real_escape_string($conn, $_GET["id"]);

    $sql = "SELECT * FROM productlist WHERE Sno='$id'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
     
        $row = $result->fetch_assoc();
        $product_title = $row["product_title"];
        $prices = $row["prices"];
        $description = $row["description"];
        $img1 = $row["img1"];
        $img2 = $row["img2"];
        $img3 = $row["img3"];
    } else {

        echo "No product found with the provided ID.";
        exit(); 
    }
} else {

    echo "Product ID is not provided.";
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trinity - <?php echo $product_title; ?></title>
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
</head>
<body>
  <header>
    <div class="navbar">
      <div class="navheading">
        <p>Products</p>
      </div>
      <div class="nav-search">
        <input placeholder="Trinity Search" class="search-input">
        <div class="search-icon">
          
            <i class="fa-solid fa-magnifying-glass"></i>
          
        </div>
      </div>
      <div class="navkart">
          <a href="tracking.php">
            <i class="fa-solid fa-cart-shopping"></i>
          </a>
        </div>
      <div class="nav-logo border">
        <div class="logo"></div>
      </div>
    </div>
  </header>

    <div class="container">
        <div class="single-product">
            <div class="row">
                <div class="col-6">
                    <div class="product-image">
                        <div class="product-image-main">
                            <img src="<?php echo $img1; ?>" alt="<?php echo $product_title; ?>" id="product-main-image">
                        </div>
                        <div class="product-image-slider">
                            <img class="image-list" src="<?php echo $img1; ?>" alt="Image 1">
                            <img class="image-list" src="<?php echo $img2; ?>" alt="Image 2">
                            <img class="image-list" src="<?php echo $img3; ?>" alt="Image 3">
                        </div>
                    </div>
                </div>

                <div class="product">
                    <div class="product-title">
                        <h2><?php echo $product_title; ?></h2>
                    </div>
                    <div class="product-rating">
                    </div>
                    <div class="product-price">
                        <span class="offer-price"><?php echo $prices; ?></span>
                    </div>

                    <div class="product-details">
                        <h3>Description</h3>
                        <p><?php echo $description; ?></p>
                    </div>

                    <span class="divider"></span>

                    <div class="product-btn-group">
                        <div class="button buy-now"><i class='bx bxs-zap' ></i> Buy Now</div>
                        <div class="button add-cart"><i class='bx bxs-cart' ></i> Add to Cart</div>
                        <div class="button heart"><i class='bx bxs-heart' ></i> Add to Wishlist</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
  document.addEventListener('DOMContentLoaded', function () {

    const mainImage = document.getElementById('product-main-image');
    const imageList = document.querySelectorAll('.image-list');

    imageList.forEach(image => {
      image.addEventListener('click', function () {
        mainImage.src = image.src;
      });
    });

    const sizeInputs = document.querySelectorAll('.size-input');
    const selectedSizeDisplay = document.getElementById('selected-size-display');

    sizeInputs.forEach(sizeInput => {
      sizeInput.addEventListener('change', function () {
        selectedSizeDisplay.innerText = `Selected Size: ${this.value}`;
      });
    });


    const buyNowButton = document.querySelector('.buy-now');
    const addToCartButton = document.querySelector('.add-cart');
    const addToWishlistButton = document.querySelector('.heart');

    buyNowButton.addEventListener('click', function () {
      alert('Buy Now clicked!');
  
    });

    addToCartButton.addEventListener('click', function () {
      alert('Add to Cart clicked!');
    });

    addToWishlistButton.addEventListener('click', function () {
      alert('Add to Wishlist clicked!');

    });
  });
</script>
<div class="copyright">
    <p class="copy">© Trinity. All rights reserved.</p>
  </div>
</body>
</html>
