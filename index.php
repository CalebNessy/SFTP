<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flyimals</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel = "stylesheet" type = "text/css" href = "CSS/main.css" />
    <link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon">
    <link rel="icon" href="imgs/favicon.ico" type="image/x-icon">
</head>
<body>
    <!--Initialize the session-->
    <?php
        session_start();
        if ($_SESSION["loggedout"] == true){
            echo '<script type = "text/javascript">alert("Your session has timed out, please log in again.")</script>';
            $_SESSION["loggedout"] = false;
        }
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
        <button class="button" style="border: 2px solid #000" onclick="window.location.href='index.php'">Home</button>
        <button class="button" onclick="window.location.href='about.php'">About</button>
        <button class="button" onclick="window.location.href='products.php'">Products</button>
        <button class="button" onclick="window.location.href='contact.php'">Contact</button>
        <button class="<?php echo $showhide ?> button" onclick="window.location.href='account.php'">Account</button>
        <button id="login" onclick="window.location.href='login.php'"><?php
            // Check if the user is already logged in
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                echo "Logout as ".$_SESSION['username'];
            }else{
                echo "Login";
            }
        ?></button>
        <button class = "<?php if($showhide == "show"){echo "hide";} else if ($showhide == "hide") {echo "show";} ?>" id="login" onclick="window.location.href='signup.php'">Sign Up</button>
    </div>

    <!--Code for the margin above all of the content-->
    <div class = "topmargin"></div>

    <!--Code for the Welcome Slide-->
    <div class="slideshow txt" style = "height: 500px;">
        <h1>Welcome to Flyimals!</h1>
        <h3>Helping animals fly since 2019</h3>
        <div class="content">
            <h4>Questions? Comments? Concerns? Your feedback is our most helpful tool! <button class="ab txt" onclick="window.location.href='contact.php'">Contact Us!</button></h4>
        </div>
    </div>
    
    <!--Code for the products-->
    <div class="slideshow txt" style = "overflow-x: scroll; height: 500px; display: grid; position: relative;">
        <h1>Our products</h1>
        <div onclick = "window.location.href='products.php'"class = "product2 overflowItem" style = "left: 0;">
            <h1 class = "pc">Model M</h1>
            <img src = "imgs/Model_M.png" class = "image" alt="Model A">
        </div>
        <div onclick = "window.location.href='products.php'"class = "product2 overflowItem" style = "left: 50%;">
            <h1 class = "pc">Model Z</h1>
            <img src = "imgs/Model_z.png" class = "image" alt="Model Z">
        </div>
        <div onclick = "window.location.href='products.php'"class = "product2 overflowItem" style = "left: 100%;">
            <h1 class = "pc">Model A</h1>
            <img src = "imgs/Model_a.png" class = "image" alt="Model A">
        </div>
        <div onclick = "window.location.href='products.php'" class = "product2 overflowItem" style = "left: 150%;">
            <h1 class = "pc">Model B</h1>
            <img src = "imgs/Model_b.png" class = "image" alt="Model B">
        </div>
            
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