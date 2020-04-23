
<div class = "content" style = "overflow-y: hidden;">
    <img src = "<?php echo $img?>" class = "image" style = "width: 100%; left: 0px;" alt="<?php echo $productName;?>">
    <h2 class = "pc"><?php echo $productName;?></h2>
    <h3 class = "pc">Quantity: <?php echo $qty;?><h3>
    <?php
        echo '<h3 class = "pc">Price: $'.$price.'</h3> <br> ';
    ?>
     <button class = 'pc' onclick = 'window.location.href = "./removeitem.php?id=<?php echo $id?>"'>Remove Item</button>
</div>