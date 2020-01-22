<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flyimals</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel = "stylesheet" type = "text/css" href = "CSS/main.css" />
</head>
<body>
    <div class = "header txt">
        <img src="imgs/Logo.png" alt="Logo" class="logo">
        <button class="button" onclick="window.location.href='index.php'">Home</button>
        <button class="button" onclick="window.location.href='about.php'">About</button>
        <button id="login" onclick="window.location.href='signup.php'">Sign Up</button>
        <button class="button" style="border: 2px solid #000;" onclick="window.location.href='products.php'">Products</button>
        <button  class="button" onclick="window.location.href='contact.php'">Contact</button>
        <button id="login" onclick="window.location.href='login.php'"><?php
            session_start();
            // Check if the user is already logged in
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                echo "Logout as ".$_SESSION['username'];
            }else{
                echo "Login";
            }
        ?></button>
    </div>
    <div class = "topmargin"></div>
    <div class = "content txt">
        <h2>Our Products</h2>
        <h3><?php 
            //create variables for starting the server
            $servername = "localhost:3306";
            $db_username = "nfh_cness";
            $db_password = "homeschool";
            $db_database = "nfh_cness";
            //Initialize the Database
            $mySQLI = new mysqli($servername, $db_username, $db_password, $db_database);
            if($mySQLI->connect_error){
                echo("Failed to connect: ".$mySQLI->connect_error);
                exit();
            }
            $sql = "SELECT * FROM products";
            // Perform query
            $result = $mySQLI -> query($sql);
            if ($result->num_rows > 0) {
                echo "Returned rows are: " . $result ->num_rows;
                // Free result set
                $result -> free_result();
            }
            mysqli_close($mySQLI);
        ?></h3>
    </div>
</body>
</html>