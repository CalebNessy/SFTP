<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flyimals</title>
    <link rel = "stylesheet" type = "text/css" href = "main.css" />
    <link rel = "stylesheet" type = "text/css" href = "login.css" />
</head>
<body>
    <div class = "header">
        <img src="Logo.png" alt="Logo" class="logo">
        <button class="button" onclick="window.location.href='index.php'">Home</button>
        <button class="button" onclick="window.location.href='about.php'">About</button>
        <button id="login"  style="border: 2px solid #000;" onclick="window.location.href='signup.php'">Sign Up</button>
        <button  class="button">Contact</button>
        <button id="login"  onclick="window.location.href='login.php'">Login</button>
    </div>
    <div class = "topmargin"></div>
    <br>
    <div class="loginform">
        <form action="signup.php">
            First Name: <input type="text" name="firstname"><br><br>
            Last Name: <input type="text" name="lastname"><br><br>
            Username: <input type="text" name="username"><br><br>
            Email: <input type="text" name="email"><br><br>
            Password: <input type="text" name="password"><br><br>
            <button value="submit" class = "button" name="Submit">Submit</button>
        </form>
    </div>
    <?php
        $mySQLI = new mysqli("localhost", "nfh_cness", "homeschool");
        if(isset($_POST['login-submit'])){
            $username = $_POST['username'];
        }
        $mySQLI->close();
    ?>
</body>
</html>