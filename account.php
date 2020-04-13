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
    <?php
        session_start();
        // Check if the user is already logged in
        $showhide = "hide";
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            $showhide = "show";
        }else{
            $showhide = "hide";
        }
    ?>
    <div class = "header txt">
        <img src="imgs/Logo.png" alt="Logo" class="logo">
        <button class="button" onclick="window.location.href='index.php'">Home</button>
        <button class="button" onclick="window.location.href='about.php'">About</button>
        <button class="button" onclick="window.location.href='products.php'">Products</button>
        <button  class="button" onclick="window.location.href='contact.php'">Contact</button>
        <button style="border: 2px solid #000;" class="<?php echo $showhide ?> button" onclick="window.location.href='account.php'">Account</button>
        <button id="login" onclick="window.location.href='login.php'"><?php
            // Check if the user is already logged in
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                echo "Logout as ".$_SESSION['username'];
            }else{
                echo "Login";
            }
        ?></button>
        <!--Signup Page Button-->
        <button class = "<?php if($showhide == "show"){echo "hide";} else if ($showhide == "hide") {echo "show";} ?>" id="login" onclick="window.location.href='signup.php'">Sign Up</button>
    </div>
    <div class = "topmargin"></div>
    <div class = "content">
        <h3 class = "txt">
            <?php
                //create variables for starting the server
                $servername = "localhost:3306";
                $db_username = "nfh_cness";
                $db_password = "homeschool";
                $db_database = "nfh_cness";
                //Initialize the Database
                $mySQLI = new mysqli($servername, $db_username, $db_password, $db_database);
                if($mySQLI->connect_error){
                    die("Connection Failed." . $mySQLI->connect_error);
                }
                $username = $_SESSION['username'];
                $sql = "SELECT email, firstname, lastname FROM users WHERE username = '$username'";
                $result = mysqli_query($mySQLI, $sql);
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "Your username: " . $username . "<br><br>";
                        echo "Your name: " . $row["firstname"] . " " . $row["lastname"] . "<br><br>";
                        echo "Your email: " . $row["email"];
                    }
                }
                if($_SESSION['loggedin'] == false){
                    $_SESSION["loggedout"] = true;
                    header("Location: index.php");
                }
                $mySQLI->close();
            ?><br><br>
            <button class = "button2 center" onclick = "window.location.href='orders.php'">My Orders</button>
            <button class = "button2 center" onclick = "window.location.href='cart.php'">My Cart</button>
            <br><br>
            <button class = "button2 center" name = "delete" onclick = "window.location.href='delete.php'">DELETE ACCOUNT</button>
        </h3>
    </div>
    
    <!--Code for the footer-->
    <div class="footer txt">
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="products.php">Products</a>
        <a href="contact.php">Contact</a>
        <a href="account.php" class = "<?php echo $showhide;?>">Account</a>
        <br>
        <p>2019-2020 Flyimals Inc.</p>
    </div>
</body>
</html>