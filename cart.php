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
            header("Location: login.php?products");
        }
    ?>
    <div class = "header txt">
        <img src="imgs/Logo.png" alt="Logo" class="logo">
        <button class="button" onclick="window.location.href='index.php'">Home</button>
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
    <div class = "topmargin"></div>
    <div class = "content txt">
        <h2>Cart</h2>
        <form method = "post">
            <button class = "button2" name = "empty" value = "submit">Empty Cart</button>
        </form>
        <div class = "content txt">
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
                $email = $_SESSION['email'];
                if(isset($_POST["empty"])){
                    $sql = "DELETE FROM cart WHERE username = '$username' AND email = '$email'";
                    mysqli_query($mySQLI, $sql);
                    header("Location:cart.php");
                }
                $sql = "SELECT item, quantity FROM cart WHERE username = '$username' and email = '$email'";
                $result = mysqli_query($mySQLI, $sql);
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "Product: " . $row["item"] . "<br>";
                        echo "<u>" . "____Qty: ". $row["quantity"] . "____<u><br><br>";
                    }
                }else{
                    echo "Any items you add to your cart will appear here";
                }
            ?>
        </div><br>
        <button class = "button2" onclick = "window.location.href='order.php'">Place Order</button>
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