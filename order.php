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
        include "includes/session.php";
        include "includes/connect.php";


        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        $uid = $_SESSION["uid"];
        $sql = "SELECT item, quantity, userid FROM cart WHERE userid = '$uid'";
        $result = mysqli_query($mySQLI, $sql);
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            $returned = null;
            while($row = mysqli_fetch_assoc($result)) {
                $qty = $row["quantity"];
                $email = $_SESSION["email"];
                $userid = $row["userid"];

                $product = $row["item"];
                $qty = $row["quantity"];

                $sql = "SELECT qty FROM products WHERE product = '$product'";
                $rslt = mysqli_query($mySQLI, $sql);
                $returned = mysqli_fetch_assoc($rslt);


                if($qty <= $returned["qty"]){

                    $date = date("Y/m/d");
                    $sql = "INSERT INTO OrderHistory (product, date, orderno, userid) VALUES ('$product', '$date', '$qty', '$userid')";
                    mysqli_query($mySQLI, $sql);
                    $sql = "DELETE FROM cart WHERE userid = '$userid'";
                    mysqli_query($mySQLI, $sql);

                    $cqty = "SELECT * FROM products WHERE product = '$product'";
                    $result = mysqli_query($mySQLI, $cqty);
                    $itm = mysqli_fetch_assoc($result);
                    $quantity = $returned["qty"] - $qty;
                    $sql2 = "UPDATE products SET qty = '$quantity' WHERE product = '$product'";
                    mysqli_query($mySQLI, $sql2);

                    header("Location: orders.php?".$qty);
                    exit();

                }else{

                    header("Location: cart.php?error=outofstock");

                }
            }
        }else{
            header("Location: cart.php");
        }
    ?>
</body>