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

    <!--Code for the top margin-->
    <div class = "topmargin"></div>

    <!--Code for the content-->
    <div class = "content txt">
            <h3>You are about to delete your account, this can not be undone.</h3>
            <form class = "logincontent content" action = "delete.php" method = "post">
                <h3>Please insert your password to continue.</h3>
                <input type="password" name = "password" placeholder = "Password"><br><br>
                <button name = "confirm" class = "button2">CONFIRM</button>
            </form>
            <?php
                session_start();
                if($_SESSION['loggedin'] == false){
                    $_SESSION["loggedout"] = true;
                    header("Location: index.php");
                }
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
                if(isset($_POST["confirm"])){
                    $password = $_POST["password"];
                    if($_SESSION["password"] == $password){
                        $sql = "DELETE FROM users WHERE password = '$password'";
                        mysqli_query($mySQLI, $sql);
                        $_SESSION = array();
                        session_destroy();
                        header("Location: index.php");
                        exit;
                    }else{
                        header("Location: delete.php?error=password");
                    }
                }
            ?>
            <button class = "button2" onclick = "window.location.href='index.php'">CANCEL</button>
        </h3>
    </div>
</body>
</html>