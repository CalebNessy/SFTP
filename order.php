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
        $sql = "SELECT item, quantity, username, email FROM cart WHERE username = '$username' and email = '$email'";
        $result = mysqli_query($mySQLI, $sql);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $returned = null;
            while($row = mysqli_fetch_assoc($result)) {
                $uid = $row["username"];
                $product = $row["item"];
                $qty = $row["quantity"];
                $email = $row["email"];
                $sql = "SELECT * FROM products";
                $rslt = mysqli_query($mySQLI, $sql);
                $returned = mysqli_fetch_assoc($rslt);
                if($qty <= $returned[$product]){
                    $date = date("Y/m/d");
                    $sql = "INSERT INTO OrderHistory (username, product, date, email, orderno) VALUES ('$uid', '$product', '$date', '$email', '$qty')";
                    mysqli_query($mySQLI, $sql);
                    $sql = "DELETE FROM cart WHERE username = '$uid' and email = '$email'";
                    mysqli_query($mySQLI, $sql);
                    if($product == "model_m"){
                        $cqty = "SELECT model_m FROM products";
                        $result = mysqli_query($mySQLI, $cqty);
                        $itm = mysqli_fetch_assoc($result);
                        $quantity = $itm["model_m"] - $qty;
                        $sql2 = "UPDATE products SET model_m = '$quantity'";
                        mysqli_query($mySQLI, $sql2);
                        header("Location: orders.php");
                        exit();
                    }
                    if($product == "model_z"){
                        $cqty = "SELECT model_z FROM products";
                        $result = mysqli_query($mySQLI, $cqty);
                        $itm = mysqli_fetch_assoc($result);
                        $quantity = $itm["model_z"] - $qty;
                        $sql2 = "UPDATE products SET model_z = '$quantity'";
                        mysqli_query($mySQLI, $sql2);
                        header("Location: orders.php");
                        exit();
                    }
                    if($product == "model_a"){
                        $cqty = "SELECT model_a FROM products";
                        $result = mysqli_query($mySQLI, $cqty);
                        $itm = mysqli_fetch_assoc($result);
                        $quantity = $itm["model_a"] - $qty;
                        $sql2 = "UPDATE products SET model_a = '$quantity'";
                        mysqli_query($mySQLI, $sql2);
                        header("Location: orders.php");
                        exit();
                    }
                    if($product == "model_b"){
                        $cqty = "SELECT model_b FROM products";
                        $result = mysqli_query($mySQLI, $cqty);
                        $itm = mysqli_fetch_assoc($result);
                        $quantity = $itm["model_b"] - $qty;
                        $sql2 = "UPDATE products SET model_b = '$quantity'";
                        mysqli_query($mySQLI, $sql2);
                        header("Location: orders.php");
                        exit();
                    }
                }else{
                    header("Location: cart.php?error=outofstock");
                }
            }
        }else{
            header("Location: cart.php");
        }
    ?>
</body>