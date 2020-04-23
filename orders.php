<!DOCTYPE html>
<html lang="en">
<body>

    <!--Code for including-->
    <?php
        include "includes/header.php";
    ?>
    <div class = "content txt">
        <h3>My Orders:</h3>
        <?php
            include "includes/connect.php";

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
                    $product = $row["product"];
                    $sql = "SELECT * FROM products WHERE product = '$product'";
                    $rslt = mysqli_query($mySQLI, $sql);
                    $rw = mysqli_fetch_assoc($rslt);
                    $productName = $rw["productName"];
                    $qty = $row["orderno"];
                    $id = "0";
                    $date = $row["date"];
                    $img = "data:image/jpeg;base64, " . base64_encode($rw['image']);
                    include "includes/orderitem.php";
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
    <br>
    
    <?php
        include "includes/footer.php";
    ?>
</body>
</html>