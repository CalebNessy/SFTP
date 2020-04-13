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
    <!--Initialize the session-->
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

    <!--Code for the header-->
    <div class = "header txt">
        <img src="imgs/Logo.png" alt="Logo" class="logo">
        <button class="button" onclick="window.location.href='index.php'">Home</button>
        <button class="button" onclick="window.location.href='about.php'">About</button>
        <button class="button" style="border: 2px solid #000;" onclick="window.location.href='products.php'">Products</button>
        <button  class="button" onclick="window.location.href='contact.php'">Contact</button>
        <button class="<?php echo $showhide ?> button" onclick="window.location.href='account.php'">Account</button>
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

    <!--Code for the margin above all content-->
    <div class = "topmargin"></div>

    <!--Code for the main body-->
    <div class = "slideshow txt">
        <h2>Our Products</h2>

        <!--Get all of the product stock-->
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
            $result = mysqli_query($mySQLI, $sql);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    $modelm = $row["model_m"];
                    $modelz = $row["model_z"];
                    $modelb = $row["model_b"];
                    $modela = $row["model_a"];
                }
            }
            mysqli_close($mySQLI);
        ?></h3>

        <!--Button for stores near me-->
        <button class = "buttonC" onclick = "window.location.href='nearme.php'">Stores near me</button>
        <br><br>
        
        <!--Model M product-->
        <div class = "product">
            <h2>Model M</h2>
            <h3>In stock: <?php echo $modelm;?><h3>
            
            <form method = "post" class = "logincontent" action = "additem.php?product=model_m">
                <input type = "text" name = "qty" placeholder="Quantity"><br>
                <button class = "button2">Add to cart</button>
            </form><br>
        </div>
        <br>

        <!--Model Z product-->
        <div class = "product">
            <h2>Model Z</h2>
            <h3>In stock: <?php echo $modelz;?><h3>

            <form method = "post" class = "logincontent" action = "additem.php?product=model_z">
                <input type = "text" name = "qty" placeholder="Quantity"><br>
                <button class = "button2">Add to cart</button>
            </form><br>
        </div>
        <br>

        <!--Model B product-->
        <div class = "product">
            <h2>Model B</h2>
            <h3>In stock: <?php echo $modelb;?><h3>

            <form method = "post" class = "logincontent" action = "additem.php?product=model_b">
                <input type = "text" name = "qty" placeholder="Quantity"><br>
                <button class = "button2">Add to cart</button>
            </form><br>
        </div>
        <br>
        
        <!--Model A product-->
        <div class = "product">
            <h2>Model A</h2>
            <h3>In stock: <?php echo $modela;?><h3>

            <form method = "post" class = "logincontent" action = "additem.php?product=model_a">
                <input type = "text" name = "qty" placeholder="Quantity"><br>
                <button class = "button2">Add to cart</button>
            </form><br>
        </div>
        <br>

    </div>
</body>
</html>