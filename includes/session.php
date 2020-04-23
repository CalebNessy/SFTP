<?php
    //initialize the session
    session_start();
    if($_SESSION["loggedin"] === false){
        $showhide = "hide";
        header("Location: login.php");
    }
?>