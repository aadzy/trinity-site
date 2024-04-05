<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trinity | Dashboard</title>
    <link  rel= "stylesheet" href="dash.css" >
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
                    <a href="#schedule" class="item">Name</a>
                    <a href="#products" class="item">Address</a>
                    <a href="#support" class="item">Most contributed</a>
                    </div>

                </div>
            </div>


        
            <div class="nav-logo" >
                <img src="logo.png" class="logo" onclick="toggleSidebar(this)">  
            </div>

        </div> 
    </header> 


      
    <div class="hero-section">
        <div class="hero-bg">
        <div class="counter kg">0</div>

            <div class="pie-wrapper">

                items-contributed-pie-chart

                <script>

                    var pie = new ej.charts.AccumulationChart({
                        //Initializing Series
                        series: [
                            {
                                dataSource: [
                                    /* { 'x': 'Chrome', y: 37 }, { 'x': 'UC Browser', y: 17 },
                                    { 'x': 'iPhone', y: 19 },
                                    { 'x': 'Others', y: 4 }, { 'x': 'Opera', y: 11 },
                                    { 'x': 'Android', y: 12 } */
                                ],
                                dataLabel: {
                                    visible: true,
                                    position: 'Inside',
                                },
                                xName: 'x',
                                yName: 'y'
                            }
                        ],
                    });
                    pie.appendTo('#container');
                </script>

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
            <a href="../recycle/recyclepage.php">
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