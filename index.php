<!DOCTYPE html>
<html lang = "en">
<body>
    <?php
        include "includes/header.php";
    ?>

    <!--Code for the Welcome Slide-->
    <div class="slideshow txt hidden" style = "height: 500px;">
        <img src = "imgs/pig.png" class = "image" alt = "In loving memory of Timmy.">
        <h1 class = "pc">Welcome to Flyimals!</h1>
        <h3 class = "pc">Helping animals fly since 2019</h3>
        <div class="content pc">
            <h4>Questions? Comments? Concerns? Your feedback is our most helpful tool! <button class="ab txt" onclick="window.location.href='contact.php'">Contact Us!</button></h4>
        </div>
    </div>
    
    <!--Code for the products-->
    <div class="slideshow txt" style = "overflow-x: scroll; height: 500px; display: grid; position: relative;">
        <h1>Some of Our Products</h1>
        <!--Model M product slide-->
        <div onclick = "window.location.href='products.php'"class = "product2 overflowItem" style = "left: 0;">
            <h1 class = "pc">Model M</h1>
            <img src = "imgs/Model_M.png" class = "image" alt="Model A">
        </div>
        <!--Model Z product slide-->
        <div onclick = "window.location.href='products.php'"class = "product2 overflowItem" style = "left: 50%;">
            <h1 class = "pc">Model Z</h1>
            <img src = "imgs/Model_z.png" class = "image" alt="Model Z">
        </div>
            
    </div>

    <?php 
        include "includes/footer.php";
    ?>
    
</body>
</html> 