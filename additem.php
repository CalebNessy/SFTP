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
        
        include "includes/session.php";
        include "includes/connect.php";
        $userid = $_SESSION['uid'];
        $product = $_GET["product"];
        $qty = $_POST["qty"];
        if($qty>0){
            $sql = "INSERT INTO cart (item, quantity, userid) VALUES ('$product', '$qty', '$userid')";
            mysqli_query($mySQLI, $sql);
        }
        header("Location: cart.php");
        exit();
    ?>
</body>