<?php
    include "includes/session.php";
    include "includes/connect.php";
    $id = $_GET["id"];
    $sql = "DELETE FROM cart WHERE orderid = '$id'";
    mysqli_query($mySQLI, $sql);
    header("Location: cart.php");
?>