<!DOCTYPE html>
<html lang = "en">
<body>
    
    <!--Include the Header-->
    <?php
        include "includes/header.php";
    ?>
    
    <!--Code for the content-->
    <div class = "content" style = "height: 500px;">
        <h3 class = "txt">
            <?php
                include "includes/connect.php";
                $username = $_SESSION['username'];
                $sql = "SELECT email, firstname, lastname FROM users WHERE username = '$username'";
                $result = mysqli_query($mySQLI, $sql);
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "Your username: " . $username . "<br><br>";
                        echo "Your name: " . $row["firstname"] . " " . $row["lastname"] . "<br><br>";
                        echo "Your email: " . $row["email"];
                    }
                }
                if($_SESSION['loggedin'] == false){
                    $_SESSION["loggedout"] = true;
                    header("Location: index.php");
                }
                $mySQLI->close();
            ?><br><br>
            <button class = "button2 center" onclick = "window.location.href='orders.php'">My Orders</button>
            <button class = "button2 center" onclick = "window.location.href='cart.php'">My Cart</button>
            <br><br>
            <button class = "button2 center" name = "delete" onclick = "window.location.href='delete.php'">DELETE ACCOUNT</button>
        </h3>
    </div>
    
    <!--Include the footer-->
    <?php
        include "includes/footer.php"
    ?>
</body>
</html>