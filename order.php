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
        $sql = "SELECT * FROM cart WHERE userid = '$uid'";
        $result = mysqli_query($mySQLI, $sql);
        $count = mysqli_num_rows($result);
        $delete = false;
        if ($count > 0) {
            while($row = $result->fetch_assoc()) {
                $qty = $row["quantity"];
                $email = $_SESSION["email"];
                $userid = $row["userid"];
                $orderid = $row["orderid"];

                $product = $row["item"];
                $qty = $row["quantity"];

                $sql2 = "SELECT qty FROM products WHERE product = '$product'";
                $rslt = mysqli_query($mySQLI, $sql2);
                $returned = mysqli_fetch_assoc($rslt);


                if($qty <= $returned["qty"]){
                    $delete = true;

                    $date = date("Y/m/d");
                    $sql3 = "INSERT INTO OrderHistory (product, date, orderno, userid) VALUES ('$product', '$date', '$qty', '$userid')";
                    mysqli_query($mySQLI, $sql3);

                    $cqty = "SELECT * FROM products WHERE product = '$product'";
                    $result2 = mysqli_query($mySQLI, $cqty);
                    $itm = mysqli_fetch_assoc($result2);

                    $quantity = $returned["qty"] - $qty;
                    $sql5 = "UPDATE products SET qty = '$quantity' WHERE product = '$product'";
                    mysqli_query($mySQLI, $sql5);

                    
                    $sql4 = "DELETE FROM cart WHERE userid = '$userid' and orderid = '$orderid'";
                    mysqli_query($mySQLI, $sql4);
                }
            }
            header("Location: orders.php?".$count);
            exit();
        }else{
            header("Location: cart.php");
        }
        
    ?>
</body>