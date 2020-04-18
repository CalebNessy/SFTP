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
    <link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon">
    <link rel="icon" href="imgs/favicon.ico" type="image/x-icon">
</head>
<body>

    <!--Code for the header-->
    <div class = "header txt">
        <!--Logo Image-->
        <img src="imgs/Logo.png" alt="Logo" class="logo">
        <!--Home Page Button-->
        <button class="button" onclick="window.location.href='index.php'">Home</button>
        <!--About Page Button-->
        <button class="button" onclick="window.location.href='about.php'">About</button>
        <!--Product Page Button-->
        <button class="button" onclick="window.location.href='products.php'">Products</button>
        <!--Contact Page Button-->
        <button  class="button" onclick="window.location.href='contact.php'">Contact</button>
        <!--Signup Page Button-->
        <button id="login"  style="border: 2px solid #000;" onclick="window.location.href='signup.php'">Sign Up</button>
        <!--Login Page Button-->
        <button id="login"  onclick="window.location.href='login.php'">Login</button>
    </div>

    <!--Code for the top margin-->
    <div class = "topmargin"></div>
    <br>

    <!--Code for the main content-->
    <div class = "loginform txt" style = "height: 500px;">
        <h1>Sign Up</h1>
        <h5>
        <?php
            //Create variables for the Users Name, UserID, Email
            $fname = "";
            $lname = "";
            $uid = "";
            $mail = "";
            $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            //Check if there are any errors regarding the form fields
            if(strpos($url, 'error')){
                //Check if the UserID is valid
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
                //Check if there are any empty fields
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
                //Check if the email is valid
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
                //Check if the passwords match
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
                //Check if the UserID is taken
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
                //Check if there was an error with the SQL
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
                //Check if the email is taken
                if($_GET['error'] == "emailtaken"){
                    echo("That email is taken.");
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
                /*
                    When one of the errors ^above^ is true,
                    All of the variables are returned into the URL 
                    so that the Signup.php knows what to put in the form boxes
                    However, we do not return the field which the error was in,
                    So if the error was "uidtaken", we do not return the UserID,
                    If the error was "invalidemail", then we do not return the email
                    We never return the password in the URL,
                    If we had the password that the person put in, in the url
                    That would be a way for hackers to figure out peoples passwords.
                */
            }
        ?>
        <!--Signup form-->
        </h5>
        <form action="signup.php"  class="logincontent" method="post">
            <br>
            <input type="text" placeholder="First Name" name="firstname" value="<?php echo($fname);?>"><br><br>
            <input type="text" placeholder="Last Name" name="lastname" value="<?php echo($lname);?>"><br><br>
            <input type="text" placeholder="Username" name="username" value="<?php echo($uid);?>"><br><br>
            <input type="text" placeholder="Email" name="email" value="<?php echo($mail);?>"><br><br>
            <input type="password" placeholder="Password" name="password"><br><br>
            <input type="password" placeholder="Repeat Password" name="repeat-pwd"><br><br><br><br>
            <button class="button loginbutton" value="submit" class = "button" name="signup-submit">Sign Up</button><br>
        </form>
        <!--PHP for inserting the filled out form into the database if there are no errors-->
       <?php
            //create variables for starting the server
            $servername = "localhost:3306";
            $db_username = "nfh_cness";
            $db_password = "homeschool";
            $db_database = "nfh_cness";
            //Initialize the Database
            $mySQLI = new mysqli($servername, $db_username, $db_password, $db_database);
            //detect if there is an error connecting to the database
            if($mySQLI->connect_error){
                header("location: signup.php?error=connecterror");
                die("Error connecting to server: " . $mySQLI->connect_error);
            }
            //Detect if the signup button is pressed
            if(isset($_POST['signup-submit'])){
                //Create variables from the filled out form
                $username = $_POST['username'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $pwdrepeat = $_POST['repeat-pwd'];
                //Detect any errors in the filled out form
                //Detect if any of the fields are empty
                if(empty($username) || empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($pwdrepeat)){
                    header("Location: signup.php?error=emptyfields&uid=".$username."&mail=".$email."&fname=".$firstname."&lname=".$lastname);
                    exit();
                }
                //Detect if the email and username are correct
                else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
                    header("Location: signup.php?error=invaliduidemail");
                }
                //Detect if the email is valid
                else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    header("Location: signup.php?error=invalidemail&uid=".$username."&fname=".$firstname."&lname=".$lastname);
                    exit();
                }
                //Detect if the Username is valid
                else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
                    header("Location: signup.php?error=invaliduid&mail=".$email."&fname=".$firstname."&lname=".$lastname);
                    exit();
                }
                //Detect if the two passwords match
                else if($password !== $pwdrepeat){
                    header("Location: signup.php?error=passwordcheck&uid=".$username."&mail=".$email."&fname=".$firstname."&lname=".$lastname);
                    exit();
                }
                //Insert the form into the database if there were no errors
                else{
                    //Detect if the username is available
                    //Detect if the SQL was able to contact the database
                    if($mySQLI->connect_error){
                        header("Location: signup.php?error=sqlerror&uid=".$username."&mail=".$email."&fname=".$firstname."&lname=".$lastname);
                        exit();
                    }
                    //If it was able to connect, run the code for checking the username
                    else{
                        $user_check_query = "SELECT username FROM users WHERE username='$username'";
                        $result = mysqli_query($mySQLI, $user_check_query);
                        $email_check = "SELECT email FROM users WHERE email='$email'";
                        $res = mysqli_query($mySQLI, $email_check);
                        if(mysqli_num_rows($res) == 1){
                            header("Location: signup.php?error=emailtaken&uid=".$username."&fname=".$firstname."&lname=".$lastname);
                        }else if(mysqli_num_rows($result) == 1){
                            header("Location: signup.php?error=uidtaken&mail=".$email."&fname=".$firstname."&lname=".$lastname);
                        }else{
                            $sql = "INSERT INTO users (firstname, lastname, username, email, password) VALUES ('$firstname', '$lastname', '$username', '$email', '$password');";
                            echo mysqli_query($mySQLI, $sql);
                            $mySQLI->close();
                            header("Location: login.php?signup=success");
                        }
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