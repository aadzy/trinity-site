    <?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "trinity"; 

    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$db_name);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Insert user data into the database
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";  
        if (mysqli_query($conn, $sql)) {
            $_SESSION['email'] = $email;
            header("Location: login.html");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
    ?>
