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

    <!--Code for including-->
    <?php
        include "includes/header.php";
    ?>
    <!--Code for the top margin-->
    <div class = "topmargin"></div>

    <!--Code for main content-->
    <div class = "content txt">
        <h3>My Orders:</h3>
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
            //Create variables from the session data
            $username = $_SESSION['username'];
            $email = $_SESSION['email'];
            $uid = $_SESSION['uid'];
            $sql = "SELECT * FROM OrderHistory WHERE userid = '$uid'";
            $result = mysqli_query($mySQLI, $sql);
            $count = mysqli_num_rows($result);
            $number = 0;
            if ($count > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    //Display the users orders
                    echo "Product: " . $row["product"] . "<br>";
                    echo "Quantity: ". $row["orderno"] . "<br>";
                    if($number != $row["orderno"]){
                        echo "<u>" . "_______Date: " . $row["date"] . "_______" . "</u>" . "<br>";
                    }else{
                        $number = $row["orderno"];
                    }
                }
            }else{
                echo "Any orders you make will appear here";
            }
            if($_SESSION['loggedin'] == false){
                //If there is nobody logged in, go to index.php
                header("Location: index.php");
            }
            ?>
        </div>
    </div>
    <br>
    
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