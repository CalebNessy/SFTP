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
    <div class = "header txt">
        <img src="imgs/Logo.png" alt="Logo" class="logo">
        <button class="button" onclick="window.location.href='index.php'">Home</button>
        <button class="button" onclick="window.location.href='about.php'">About</button>
        <button class="button" onclick="window.location.href='products.php'">Products</button>
        <button  class="button" onclick="window.location.href='contact.php'">Contact</button>
        <button id="login" onclick="window.location.href='signup.php'">Sign Up</button>
        <button id="login" style="border: 2px solid #000;"  onclick="window.location.href='login.php'">Login</button>
    </div>
    <div class = "topmargin"></div>
    <br>
    <div class="loginform">
        <form action="login.php" class="logincontent">
            <br>
            <input type="text" name="username" placeholder="Username"><br><br>
            <input class="formcontent" type="text" name="email" placeholder="Email"><br><br>
            <input class="formcontent" type="password" name="password" placeholder="Password"><br><br><br><br>
            <button class = "button loginbutton" value="submit" class = "button" name="login-submit">Log In</button><br><br><br>
        </form>
        <button class = "button loginbutton" onclick="window.location.href='signup.php'">No account? Sign up here.</button><br>
        
        <?php
            $mySQLI = new mysqli("localhost:3306", "nfh_cness", "homeschool");
            if($mySQLI->connect_error){
                die("Connection Failed." . $mySQLI->connect_error);
            }
            
            echo("Got data succesfully!");
            $mySQLI->close();
        ?>
    </div>
    
</body>
</html>