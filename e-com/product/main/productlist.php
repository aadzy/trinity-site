<?php
    include("connection.php");
    session_start();
    $cat="";
    if(isset($_GET['cat']))
    {
        $cat=$_GET['cat'];
    }
    if($cat=="all")
    {
        $sql="select * from products;";
        $result=$conn->query($sql);
    }
    else
    {
        $sql= "select * from products where Category_id='$cat';";
        $result=$conn->query($sql);
    }
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
        <div class="navkart">
          <i class="fa-solid fa-cart-shopping"></i>
        </div>
      </div>
      <div class="nav-logo border">
        <div class="logo"></div>
      </div>
    </div>
  </header>
  <div class="hero-productbox1">
    <div class="product-box1">
      <div class="productimg1">
        <img src="pics/bag.jpg" style="height: 250px; width: 290px;" alt="">
      </div>
      <div class="box1-dis">
        <div class="box name"><p>Lumioscape</p></div>
        <p class="box1 head">Bag,Recycled,Blue</p>
        <p class="box1 price"><i class="fa-solid fa-indian-rupee-sign"></i>525</p>
        <button class="add-to-cart-btn">Add to Cart</button>
      </div>
    </div>
    <div class="product-box2">
      <div class="productimg2">
        <img src="pics/chair.jpg"style="height: 250px; width: 290px;" alt="" >
      </div>
      <div class="box2-dis">
        <div class="box name"><p>Arbor & Co</p></div>
        <p class="box2 head">Bench,Recycled,green</p>
        <p class="box2 price"><i class="fa-solid fa-indian-rupee-sign"></i>2000</p>
        <button class="add-to-cart-btn">Add to Cart</button>
      </div>
    </div>
    <div class="product-box3">
      <div class="productimg3">
        <img src="pics/dress.jpg" style="height: 250px; width: 290px;" alt="">
      </div>
      <div class="box3-dis">
        <div class="box name"><p>Echoverse</p></div>
        <p class="box3 head">Dress,Recycled,Blue</p>
        <p class="box3 price"><i class="fa-solid fa-indian-rupee-sign"></i>450</p>
        <button class="add-to-cart-btn">Add to Cart</button>
      </div>
    </div>
    <div class="product-box4">
      <div class="productimg4">
        <img src="pics/pencils.jpg" style="height: 250px; width: 290px;" alt="">
      </div>
      <div class="box4-dis">
        <div class="box name"><p>Wanderlust & Wayfarer</p></div>
        <p class="box4 head">Pencil,Recycled,grey</p>
        <p class="box4 price"><i class="fa-solid fa-indian-rupee-sign"></i>200</p>
        <button class="add-to-cart-btn">Add to Cart</button>
      </div>
    </div>
  </div>
  <div class="hero-productbox2">
    <div class="product-box5">
      <div class="productimg5">
        <img src="pics/product1.jpg" style="height: 250px; width: 290px;" alt="">
      </div>
      <div class="box5-dis">
        <div class="box name"><p>Serene Haven</p></div>
        <p class="box5 head">Bag,Recycled,grey</p>
        <p class="box5 price"><i class="fa-solid fa-indian-rupee-sign"></i>600</p>
        <button class="add-to-cart-btn">Add to Cart</button>
      </div>
    </div>
    <div class="product-box6">
      <div class="productimg6">
        <img src="pics/product2.jpg"style="height: 250px; width: 290px;" alt="" >
      </div>
      <div class="box6-dis">
        <div class="box name"><p>Zenith Spark</p></div>
        <p class="box6 head">shoes,Recycled,Blue</p>
        <p class="box6 price"><i class="fa-solid fa-indian-rupee-sign"></i>6999</p>
        <button class="add-to-cart-btn">Add to Cart</button>
      </div>
    </div>
    <div class="product-box7">
      <div class="productimg7">
        <img src="pics/Product3.jpg" style="height: 250px; width: 290px;" alt="">
      </div>
      <div class="box7-dis">
        <div class="box name"><p>Zenith Spark</p></div>
        <p class="box7 head">pens</p>
        <p class="box7 price"><i class="fa-solid fa-indian-rupee-sign"></i>200</p>
        <button class="add-to-cart-btn">Add to Cart</button>
      </div>
    </div>
    <div class="product-box8">
      <div class="productimg8">
        <img src="pics/table.jpg" style="height: 250px; width: 290px;" alt="">
      </div>
      <div class="box8-dis">
        <div class="box name"><p>Arbor & Co</p></div>
        <p class="box8 head">Table,Recycled,Black</p>
        <p class="box8 price"><i class="fa-solid fa-indian-rupee-sign"></i>1000</p>
        <button class="add-to-cart-btn">Add to Cart</button>
      </div>
    </div>
  </div>
  <div class="copyright">
    <p class="copy">© Trinity. All rights reserved.</p>
  </div>
  <!-- Add this script tag at the end of your HTML body, after the product list -->


</body>
</html>
