<!DOCTYPE html>
<html lang="en">
<body>
    <?php
        include "includes/header.php";
    ?>
    
    <!--Code for the content-->
    <div class = "slideshow txt" style = "height: 500px;">
        <h1>Contact us</h1>
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
    
    <?php 
        include "includes/footer.php";
    ?>
</body>
</html>