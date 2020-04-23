<?php
    //create variables for starting the server
    $servername = "localhost:3306";
    $db_username = "nfh_cness";
    $db_password = "homeschool";
    $db_database = "nfh_cness";
    //Initialize the Database
    $mySQLI = new mysqli($servername, $db_username, $db_password, $db_database);
    if($mySQLI->connect_error){
        echo("Failed to connect: ".$mySQLI->connect_error);
        exit();
    }
?>