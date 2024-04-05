<?php
  session_start();
  include("connection.php");

  $sql = "SELECT SUM(weight) AS total_weight FROM waste";
  $result = mysqli_query($conn, $sql);

  // Check if query execution was successful
  if ($result) {
      // Fetch the sum of weights
      $row = mysqli_fetch_assoc($result);
      $totalWeight = $row['total_weight'];

      echo "<script>console.log('Total weight: " . $totalWeight . "');</script>";
      echo "<script>createOdometer(document.querySelector('.counter'), $totalWeight);</script>";

      echo "<script>
              const totalWeight = $totalWeight;
              const xhr = new XMLHttpRequest();
              xhr.open('GET', 'home.js?totalWeight=' + totalWeight, true);
              xhr.send();
            </script>"; 

  } else {
      // Handle error if query execution failed
      echo "Error executing SQL query: " . mysqli_error($connection);
  } 


  // Close database connection
  mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="home.css">
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/themes/odometer-theme-default.css"
      integrity="sha512-kMPqFnKueEwgQFzXLEEl671aHhQqrZLS5IP3HzqdfozaST/EgU+/wkM07JCmXFAt9GO810I//8DBonsJUzGQsQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
  />
  <title>Trinity</title>
</head>
<body>
  
  <div class="navbar">

    <div id="sidebar">

      <div class="nav-logo" >
        <img src="logo.png" class="logo" onclick="toggleSidebar(this)">  
      </div>
      
      <div class="list">
        <a href="../recycle/recycleschedule.php" class="item">Schedule a pickup</a>
        <a href="../productpage/productlist.php" class="item">Buy handcrafted products</a>
        <a href="../dashboard/dash.php" class="item">Dashboard</a>
        <a href="#feedback" class="item">Feedback</a>
      </div>
    </div>
    
    
    <div class="profile">
      <?php
        if(isset($_SESSION['user_id'])) {
          echo "<a href='../login-new/logout.php' class='button'>Logout</a>";
        } else {
          echo "<a href='../login-new/login.html' class='button'>Login/Signup</a>";
        }
      ?>
    </div>


  </div>
    
  <div class="hero-section">
    <div class="hero-bg">
      <div class="counter kg">0</div>
      <div class="type">of waste recycled through Trinity</div>
    </div>
  </div>

  <script
      src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/odometer.min.js"
      integrity="sha512-v3fZyWIk7kh9yGNQZf1SnSjIxjAKsYbg6UQ+B+QxAZqJQLrN3jMjrdNwcxV6tis6S0s1xyVDZrDz9UoRLfRpWw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    >
  </script>
  <script src="home.js"></script>

  <div class="links-container">
    <div class="link">
      <a href="#whatisTrinity" class="type">What is Trinity?</a>
    </div>
    <div class="link">
      <a href="#donateWaste" class="type">Donate waste</a>
    </div>
    <div class="link">
      <a href="#buyRecycle" class="type">Buy recycled products</a>
    </div>
    <div class="link">
      <a href="#aboutUs" class="type">About us</a>
    </div>
  </div>

  <div class="details">
    <section  id="whatisTrinity" class="tab-content">
      <div class="content1">
        <div class="about">
          <h2 class="heading">Trinity: Where Convenience Meets Green Living. </h2>
          <p class="cont">
            Imagine living sustainably without the hassle. Trinity makes it possible. We handle your waste removal, collecting it directly from your home when you schedule online. We sort and process it responsibly, ensuring recyclables find new life and other materials stay out of landfills. But that's not all! We connect your waste with manufacturers who create amazing new products, fostering a circular economy.
            <br><br>
            Want to make a difference with your daily purchases? Explore our online shop filled with unique, handcrafted treasures made from recycled materials by small businesses and local artisans. By choosing these eco-friendly gems, you reduce your carbon footprint and empower creative minds, while giving waste a beautiful second chance.
            <br><br>
            At Trinity, we believe sustainability shouldn't be complicated. Small actions, like choosing convenient waste removal and eco-conscious shopping, add up to a big impact. Join us on your journey to a greener lifestyle, where waste becomes opportunity, one click at a time.
          </p>
            
          </div>          
          
      </div>
      
      <img src="sylwia-bartyzel-amAhBrvmVQc-unsplash.jpg" class="bigpic">
      <img src="lacey-williams-Jwh_k0K_QOM-unsplash.jpg" class="pic">
      <img src="collab-media-GmqezLxud8g-unsplash.jpg" class="pic">

    </section>

    <section  id="donateWaste" class="tab-content">
      <div class="content">
      
        <div class="objectives">
          <h2 class="heading">Recycle your waste</h2>
          <p class="cont">Trinity makes waste removal as easy as pie. Forget lugging heavy bags to the curb or remembering complex schedules. Head to our website, select your preferred date and time, and voila! We'll be at your doorstep to collect your waste, leaving you with more time for the things you love. <br>

            But convenience isn't all we offer. We're passionate about protecting the planet, so we sort and process your waste responsibly. Recyclables find new life, and non-recyclables are diverted from landfills whenever possible. With Trinity, your waste becomes an opportunity to contribute to a more sustainable future. <br>
            
            Schedule your pickup today and experience the seamless efficiency of eco-friendly waste removal. Whether you're a busy professional or a family on the go, we cater to your unique needs. Join us in creating a cleaner, greener future, one convenient pickup at a time!</p>
        </div>
      </div>


      
      <img src="wynand-van-poortvliet-kWUZKKBR2Ag-unsplash.jpg" class="lbigpic">

      <div class="button">
        <a href="../recycle/recycleschedule.php" class="r-button">
          Schedule your pickup right now!
        </a>
      </div>
    </section>

    <section  id="buyRecycle" class="tab-content">
      <div class="content1">
        <h2 class="heading">Shop with Purpose: Discover Treasures Made from Trash</h2>
        <div class="cont">
          <p>
          Trinity's online shop is your go-to destination for unique, handcrafted treasures made from recycled materials. Support small businesses and local artisans who breathe new life into waste, transforming it into beautiful and useful products you'll love. <br>

          From statement jewelry crafted from vintage tins to cozy throws woven from repurposed fabrics, discover a diverse range of treasures that reflect your individual style. But the benefits go beyond aesthetics. <br>By choosing these locally made gems, you're: <br></p>
          <ul>
            <li>Reducing your carbon footprint: Say goodbye to the environmental impact of long-distance shipping and embrace locally crafted goods.</li>
            <li>Empowering creativity: Support the livelihood of passionate artisans who turn waste into stunning pieces.</li>
            <li>Making a statement for the planet: Choose sustainability without sacrificing style, and show the world that eco-conscious living can be beautiful.</li>
          </ul>
          <p>Explore our curated collection and discover treasures that make a difference for you and the environment. Join the movement towards a more sustainable future, one stylish purchase at a time!
          </div>
      </div>
      
      
      <img src="sara-groblechner-7TgbRVEYdYY-unsplash.jpg" class="bigpic">

      <div class="button">
        <a href="../productpage/productlist.php" class="p-button">
          Buy eco-friendly products and help sustainable businesses!
        </a>
      </div>
    </section>

    <section id="aboutUs" class="tab-content">
      <div class="content">
        <h2 class="heading">The Team Behind Trinity</h2>
        <p class="cont">Our team of passionate individuals are committed to making a difference in the world through innovation.</p>
      </div>

      <img src="marvin-meyer-SYTO3xs06fU-unsplash.jpg" class="team-pic">

      <div class="members">
        <div class="member">
          <h2>Aadharsh Krishnaa G</h2>
          <p>2241001</p>
        </div>

        <div class="member">
          <h2>Elena Elsa Manoj</h2>
          <p>2241016</p>
        </div>

        <div class="member">
          <h2>Joel Johnson</h2>
          <p>2241023</p>
        </div>
        
          
      </div>
    </section>

  </div>

  <button id="back-to-top-btn" title="Go to top">▲</button>

  <div class="copyright">
    <p class="copy">© Trinity. All rights reserved.</p>
  </div>
</body>
</html>
