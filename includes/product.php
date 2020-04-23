
<div class = "product">
    <img src = "<?php echo $img?>" class = "image" alt="<?php echo $productName;?>">
    <h2 class = "pc"><?php echo $productName;?></h2>
    <h3 class = "pc">In stock: <?php echo $qty;?><h3>
    
    <form class = "pc" method = "post" class = "logincontent" action = "additem.php?product=<?php echo $product;?>">
        <input class = "pc" type = "text" name = "qty" placeholder="Quantity"required="required"><br>
        <button class = "button2 pc">Add to cart</button>
    </form><br>
    <p class = "pc"><?php echo $description;?></p>
</div>
<br>