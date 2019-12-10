<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flyimals</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel = "stylesheet" type = "text/css" href = "main.css" />
    <link rel = "stylesheet" type = "text/css" href = "login.css" />
</head>
<body>
    <div class = "header txt">
        <img src="/imgs/Logo.png" alt="Logo" class="logo">
        <button class="button" onclick="window.location.href='index.php'">Home</button>
        <button class="button" onclick="window.location.href='about.php'">About</button>
        <button id="login"  style="border: 2px solid #000;" onclick="window.location.href='signup.php'">Sign Up</button>
        <button  class="button">Contact</button>
        <button id="login"  onclick="window.location.href='login.php'">Login</button>
    </div>
    <div class = "topmargin"></div>
    <br>
    <div class="loginform txt">
        <h5>
        <?php
            $fname = "";
            $lname = "";
            $uid = "";
            $mail = "";
            $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            if(strpos($url, 'error')){
                if($_GET['error']=="invaliduid"){
                    echo("Invalid Username");
                    if(strpos($url, 'mail')){
                        $mail = $_GET['mail'];
                    }
                    if(strpos($url, 'fname')){
                        $fname = $_GET['fname'];
                    }
                    if(strpos($url, 'lname')){
                        $lname = $_GET['lname'];
                    }
                }
                if($_GET['error'] == "emptyfields"){
                    echo("You still have empty fields.");
                    if(strpos($url, 'mail')){
                        $mail = $_GET['mail'];
                    }
                    if(strpos($url, 'fname')){
                        $fname = $_GET['fname'];
                    }
                    if(strpos($url, 'lname')){
                        $lname = $_GET['lname'];
                    }
                    if(strpos($url, 'uid')){
                        $uid = $_GET['uid'];
                    }
                }
                if($_GET['error'] == "invalidemail"){
                    echo("Invalid email.");
                    if(strpos($url, 'fname')){
                        $fname = $_GET['fname'];
                    }
                    if(strpos($url, 'lname')){
                        $lname = $_GET['lname'];
                    }
                    if(strpos($url, 'uid')){
                        $uid = $_GET['uid'];
                    }
                }
                if($_GET['error'] == "passwordcheck"){
                    echo("Passwords do not match.");
                    if(strpos($url, 'fname')){
                        $fname = $_GET['fname'];
                    }
                    if(strpos($url, 'lname')){
                        $lname = $_GET['lname'];
                    }
                    if(strpos($url, 'uid')){
                        $uid = $_GET['uid'];
                    }
                    if(strpos($url, 'mail')){
                        $mail = $_GET['mail'];
                    }
                }
                if($_GET['error'] == "uidtaken"){
                    echo("That username is taken.");
                    if(strpos($url, 'fname')){
                        $fname = $_GET['fname'];
                    }
                    if(strpos($url, 'lname')){
                        $lname = $_GET['lname'];
                    }
                    if(strpos($url, 'mail')){
                        $mail = $_GET['mail'];
                    }
                }
                if($_GET['error'] == "sqlerror"){
                    echo("There was an error, please try again.");
                    if(strpos($url, 'fname')){
                        $fname = $_GET['fname'];
                    }
                    if(strpos($url, 'lname')){
                        $lname = $_GET['lname'];
                    }
                    if(strpos($url, 'uid')){
                        $uid = $_GET['uid'];
                    }
                    if(strpos($url, 'mail')){
                        $mail = $_GET['mail'];
                    }
                }
            }
        ?>
        </h5>
        <form action="signup.php"  class="logincontent" method="post">
            <br>
            <input type="text" placeholder="First Name" name="firstname" value="<?php echo($fname);?>"><br><br>
            <input type="text" placeholder="Last Name" name="lastname" value="<?php echo($lname);?>"><br><br>
            <input type="text" placeholder="Username" name="username"value="<?php echo($uid);?>"><br><br>
            <input type="text" placeholder="Email" name="email" value="<?php echo($mail);?>"><br><br>
            <input type="password" placeholder="Password" name="password"><br><br>
            <input type="password" placeholder="Repeat Password" name="repeat-pwd"><br><br><br><br>
            <button class="button loginbutton" value="submit" class = "button" name="signup-submit">Sign Up</button><br>
        </form>
        <?php
            $mySQLI = new mysqli("localhost:3306", "nfh_cness", "homeschool");
            if($mySQLI->connect_error){
                die("Error connecting to server: " . $mySQLI->connect_error);
            }
            if(isset($_POST['signup-submit'])){
                $username = $_POST['username'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $pwdrepeat = $_POST['repeat-pwd'];
                if(empty($username) || empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($pwdrepeat)){
                    header("Location: signup.php?error=emptyfields&uid=".$username."&mail=".$email."&fname=".$firstname."&lname=".$lastname);
                    exit();
                }
                else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
                    header("Location: signup.php?error=invaliduidemail");
                }
                else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    header("Location: signup.php?error=invalidemail&uid=".$username."&fname=".$firstname."&lname=".$lastname);
                    exit();
                }else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
                    header("Location: signup.php?error=invaliduid&mail=".$email."&fname=".$firstname."&lname=".$lastname);
                    exit();
                }
                else if($password !== $pwdrepeat){
                    header("Location: signup.php?error=passwordcheck&uid=".$username."&mail=".$email."&fname=".$firstname."&lname=".$lastname);
                    exit();
                }else{
                    $sql = "SELECT username FROM users WHERE username=?";
                    $stmt = mysqli_stmt_init($mySQLI);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: signup.php?error=sqlerror&&uid=".$username."&mail=".$email."&fname=".$firstname."&lname=".$lastname);
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt, "s", $username);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        $resultCheck = mysqli_stmt_num_rows($stmt);
                        if($resultCheck>0){
                            header("Location: signup.php?error=uidtaken&mail=".$email."&fname=".$firstname."&lname=".$lastname);
                            exit();
                        }
                        else {
                            $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
                            
                        }
                    }
                }
            }
            $mySQLI->close();
        ?>
    </div>
</body>
</html>