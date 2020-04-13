<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flyimals</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel = "stylesheet" type = "text/css" href = "CSS/main.css" />
    <link rel = "stylesheet" type = "text/css" href = "CSS/login.css" />
</head>
<body>
    <?php
        session_start();
        // Check if the user is already logged in
        $showhide = "hide";
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            $showhide = "show";
        }else{
            $showhide = "hide";
        }
    ?>
    <div class = "header txt">
        <img src="imgs/Logo.png" alt="Logo" class="logo">
        <button class="button" onclick="window.location.href='index.php'">Home</button>
        <button class="button" onclick="window.location.href='about.php'">About</button>
        <button class="button" onclick="window.location.href='products.php'">Products</button>
        <button  class="button" onclick="window.location.href='contact.php'">Contact</button>
        <button class="<?php echo $showhide ?> button" onclick="window.location.href='account.php'">Account</button>
        <button id="login" style="border: 2px solid #000;"  onclick="window.location.href='login.php'">Login</button>
        <button class = "<?php if($showhide == "show"){echo "hide";} else if ($showhide == "hide") {echo "show";} ?>" id="login" onclick="window.location.href='signup.php'">Sign Up</button>
    </div>
    <div class = "topmargin"></div>
    <br>
    <div class="loginform">
        <form class="logincontent" method="post">
            <br>
            <input type="text" name="username" placeholder="Username"><br><br>
            <input class="formcontent" type="password" name="password" placeholder="Password"><br><br><br><br>
            <button class = "button loginbutton" value="submit" class = "button" name="login-submit">Log In</button><br><br><br>
        </form>
        <button class = "button loginbutton" onclick="window.location.href='signup.php'">No account? Sign up here.</button><br>
        
        <?php
            
            // Check if the user is already logged in, if yes then redirect him to welcome page
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                header("location: logout.php");
                exit;
            }
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
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                if(isset($_POST['login-submit'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                    $result = mysqli_query($mySQLI, $sql);
                    $count = mysqli_num_rows($result);
                    $row = mysqli_fetch_assoc($result);
                    if($count > 0){
                        header("Location: index.php");
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username; 
                        $_SESSION["password"] = $password;
                        $_SESSION["loggedout"]  = false;
                        $_SESSION["deleted"] = false;
                        $_SESSION['email'] = $row["email"];
                    }else{
                        header("Location: login.php?error=incorrectcreds");
                    }
                }
            }
            $mySQLI->close();
        ?>
    </div>
    <br>
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