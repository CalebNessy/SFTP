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
    <!--PHP for adding an item to the cart-->
    <?php
        //initialize the session
        session_start();
        if($_SESSION["loggedin"] === false){
            $showhide = "hide";
            header("Location: login.php");
        }
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
        $uid = $_SESSION["username"];
        $email = $_SESSION["email"];
        $product = $_GET["product"];
        $qty = $_POST["qty"];
        if($qty>0){
            $sql = "INSERT INTO cart (item, quantity, username, email) VALUES ('$product', '$qty', '$uid', '$email')";
            mysqli_query($mySQLI, $sql);
        }
        header("Location: cart.php");
        exit();
    ?>
</body>