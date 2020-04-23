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

    <!--Code for the content-->
    <div class = "content txt">
        <h1>Cart</h1>
        <form method = "post">
            <button class = "button2" name = "empty" value = "submit">Empty Cart</button>
        </form>
        <div class = "content txt">
            <?php
                include "includes/connect.php";
                $userid = $_SESSION['uid'];
                if(isset($_POST["empty"])){
                    $sql = "DELETE FROM cart WHERE userid = '$userid'";
                    mysqli_query($mySQLI, $sql);
                    header("Location:cart.php");
                }
                $sql = "SELECT item, quantity FROM cart WHERE userid = '$userid'";
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
                if(isset($_GET["error"])){
                    echo "<script>alert('The number of items you have ordered has exceeded the number we have in stock.')</script>";
                }
            ?>
        </div><br>
        <button class = "button2" onclick = "window.location.href='order.php'">Place Order</button>
    </div>

    <?php
        include "includes/footer.php";
    ?>
    
</body>
</html> 