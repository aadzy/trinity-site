<?php
  include("connection.php");
  session_start();

  if (isset($_SESSION["user_id"])) {
    // Fetch cart items for the logged-in user
    $cid = $_SESSION["user_id"];
    $cart_query = "SELECT c.cart_id as cart_id ,c.prod_id, c.quantity, p.product_title, p.prices, p.img1 FROM cart c INNER JOIN productlist p ON c.prod_id = p.Sno WHERE c.c_id = $cid";
    $cart_result = mysqli_query($conn, $cart_query);

    // Check if cart items are fetched successfully
    if ($cart_result) {
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="tracking.css">
    <title>Trinity product</title>
  </head>
  <body>
      <div class="navbar">
        <div class="navheading">
          <p>Cart</p>
        </div>
        <div class="nav-search">
          <input placeholder="Trinity Search" class="search-input">
          <div class="search-icon">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
          <div class="navkart">
              <a href="tracking.php"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
        </div>
        <div class="nav-logo border">
        <a href="home.html"><div class="logo"></div></a>
        </div>
      </div>
    </header>
    <div class="small-container cart-page">
      <table>
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
        <?php
            $total_price = 0; // Initialize total price
            while ($row = mysqli_fetch_assoc($cart_result)) {
                $subtotal = $row['quantity'] * $row['prices'];
                $total_price += $subtotal; // Add subtotal to total price
        ?>
        <tr>
          <td><div class="cart-info">
            <img src="<?php echo $row['img1']; ?>" alt="">
            <div>
              <p><?php echo $row['product_title']; ?></p>
              <small>Price: ₹<?php echo $row['prices']; ?></small>
              <br>
              <form action="remove_item.php" method="post">
                <input type="hidden" name="cart_id" id="cart_id" value="<?php echo $row['cart_id']; ?>">
                <button type="submit">remove</button>
              </form>
            </div>
          </div></td>
          <td><input type="number" value="<?php echo $row['quantity']; ?>"></td>
          <td>₹<?php echo number_format($subtotal, 2); ?></td>     
        </tr>
        <?php
            }
        ?>
      </table>
      <div class="total-price">
        <table>
          <tr>
            <td>Sub total</td>
            <td>₹<?php echo number_format($total_price, 2); ?></td>
          </tr>
          <tr>
            <td>Delivery</td>
            <td>₹0</td>
          </tr>
          <tr>
            <td>Total</td>
            <td>₹<?php echo number_format($total_price, 2); ?></td>
          </tr>
        </table>
      </div>
    </div>
    </body>
    </html>
  <?php
      } else {
          // Error handling if fetching cart items fails
          echo "Error: " . mysqli_error($conn);
      }
  } else {
      // Redirect to login page if user is not logged in
      header("Location: login.php");
      exit();
  }



// Check if the user is logged in

?>
