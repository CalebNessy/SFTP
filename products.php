<!DOCTYPE html>
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
<body>
    
    <!--Initialize the session-->
    <?php
        include "includes/header.php";
    ?>

    <!--Code for the main body-->
    <div class = "slideshow txt">
        <h1>Our Products</h1>
        <!--Button for stores near me-->
        <button class = "buttonC" onclick = "window.location.href='nearme.php'">Stores near me</button>
        <br><br>
        <h2>All models include built in straps</h2>

        <!--Get all of the product stock-->
        <h3><?php
            include "includes/connect.php";
            $sql = "SELECT * FROM products";
            // Perform query
            $result = mysqli_query($mySQLI, $sql);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    $product = $row["product"];
                    $productName = $row["productName"];
                    $description = $row["description"];
                    $qty = $row["qty"];
                    $image = $row["image"];
                    $img = "data:image/jpeg;base64, " . base64_encode( $row['image'] );
                    include "includes/product.php";
                }
            }
            mysqli_close($mySQLI);
        ?></h3>


    </div>
    <?php
        include "includes/footer.php";
    ?>
</body>
</html>