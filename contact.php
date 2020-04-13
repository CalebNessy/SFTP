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
        <button  class="button" style="border: 2px solid #000;" onclick="window.location.href='contact.php'">Contact</button>
        <button class="<?php echo $showhide ?> button" onclick="window.location.href='account.php'">Account</button>
        <button id="login" onclick="window.location.href='login.php'"><?php
            // Check if the user is already logged in
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                echo "Logout as ".$_SESSION['username'];
            }else{
                echo "Login";
            }
        ?></button>
        <!--Signup Page Button-->
        <button class = "<?php if($showhide == "show"){echo "hide";} else if ($showhide == "hide") {echo "show";} ?>" id="login" onclick="window.location.href='signup.php'">Sign Up</button>
    </div>
    <div class = "topmargin"></div>
    <div class = "content txt">
        <h3>Contact us</h3>
        <!--Code for contact form-->
        <form method = "post" class = "contact">
            <input type = "text" placeholder = "Full Name" name = "name" required = "required"><br><br>
            <input type = "text" placeholder = "Email" name = "email" required = "required"><br><br>
            <textarea type = "text" placeholder="Message" name = "message" id = "message" required = "required"></textarea><br><br>
            <button class = "button2" value="submit" class = "button" name = "submit">Submit</button>
        </form>
        <br>
        <?php
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];
                $from = 'From: Flyimals Customer';
                $to = 'calebness75@gmail.com';
                $subject = 'Customer Message';

                $body = "From: " . $name . "\n E-Mail: " . $email . "\n Message:\n" . $message;

                $sent = mail($to, $subject, $body, $from);
                if($sent){
                    echo "Your message has been sent.";
                }else{
                    echo "We have encountered a problem, please try again.";
                }
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