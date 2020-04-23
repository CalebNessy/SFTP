<!DOCTYPE html>
<html lang="en">
<body>
    <!--Code for including-->
    <?php
        include "includes/header.php";
    ?>

    <!--Code for the content-->
    <div class = "content txt">
        <h3>Stores Near Me</h3>
        <form method = "post">
            <br>
            Please input your zip code: <input type = "text" name = "zip"><br><br>
            <button class = "button2" name = "submit">Submit</button>
        </form><br>
        <?php
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
            if(isset($_POST["submit"])){
                $zipcode = $_POST["zip"];
                $sql = "SELECT * from suppliers WHERE Zip = '$zipcode'";
                $result = mysqli_query($mySQLI, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<u>" . "Store: " . $row["Company"] . "</u><br>" . $row["Address"] . "<br>" . $row["City"] . ", " . $row["State"] . " " . $row["Zip"] . "<br><br>";
                    }
                }
                mysqli_close($mySQLI);
            }

        ?>
    </div>
    
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