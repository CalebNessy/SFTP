<!DOCTYPE html>
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
        <?php
            include "includes/connect.php";
            $userid = $_SESSION['uid'];
            if(isset($_POST["empty"])){
                $sql = "DELETE FROM cart WHERE userid = '$userid'";
                mysqli_query($mySQLI, $sql);
                header("Location:cart.php");
            }
            $sql = "SELECT item, quantity, orderid FROM cart WHERE userid = '$userid'";
            $result = mysqli_query($mySQLI, $sql);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $qty = $row["quantity"];
                    $product = $row["item"];
                    $id = $row["orderid"];
                    $sql = "SELECT * FROM products WHERE product = '$product'";
                    $rslt = mysqli_query($mySQLI, $sql);
                    $rw = mysqli_fetch_assoc($rslt);
                    $productName = $rw["productName"];
                    $price = $rw["price"];
                    $show = "yes";
                    $img = "data:image/jpeg;base64, " . base64_encode($rw['image']);
                    include "includes/cartitem.php";
                }
            }else{
                echo "<br> <h2>Any items you add to your cart will appear here</h2> <br>";
            }
            if(isset($_GET["error"])){
                echo "<script>alert('The number of items you have ordered has exceeded the number we have in stock.')</script>";
            }
        ?>
        <br>
        <button class = "button2" onclick = "window.location.href='order.php'">Place Order</button>
    </div>

    <?php
        include "includes/footer.php";
    ?>
    
</body>
</html> 