<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flyimals</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel = "stylesheet" type = "text/css" href = "CSS/main.css" />
    <link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon">
    <link rel="icon" href="imgs/favicon.ico" type="image/x-icon">
</head>
<?php
    session_start();
    if ($_SESSION["loggedout"] == true){
        echo '<script type = "text/javascript">alert("Your session has timed out, please log in again.")</script>';
        $_SESSION["loggedout"] = false;
    }
    // Check if the user is already logged in
    $showhide = "hide";
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        $showhide = "show";
    }else{
        $showhide = "hide";
    }
    $name = basename($_SERVER["PHP_SELF"]);
?>
<!--Code for the header-->
<div class = "header txt">
    <img src="imgs/Logo.png" alt="Logo" class="logo">
    <button class="button <?php if($name == 'index.php'){echo 'outline';}?>" onclick="window.location.href='index.php'">Home</button>
    <button class="button <?php if($name == 'about.php'){echo 'outline';}?>" onclick="window.location.href='about.php'">About</button>
    <button class="button <?php if($name == 'products.php'){echo 'outline';}?>" onclick="window.location.href='products.php'">Products</button>
    <button class="button <?php if($name == 'contact.php'){echo 'outline';}?>" onclick="window.location.href='contact.php'">Contact</button>
    <button class="<?php echo $showhide; if($name == 'account.php'){echo ' outline';}?> button" onclick="window.location.href='account.php'">Account</button>
    <button id="login" class = "<?php if($name == 'login.php'){echo 'outline';}?>" onclick="window.location.href='login.php'"><?php
        // Check if the user is already logged in
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            echo "Logout as ".$_SESSION['username'];
        }else{
            echo "Login";
        }
    ?></button>
    <button class = "<?php if($showhide == "show"){echo "hide";} else if ($showhide == "hide") {echo "show";} if($name == 'signup.php'){echo ' outline';}?>" id="login" onclick="window.location.href='signup.php'">Sign Up</button>
</div>
<div class = "topmargin"></div>