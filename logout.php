<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flyimals</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel = "stylesheet" type = "text/css" href = "CSS/main.css" />
    <link rel = "stylesheet" type = "text/css" href = "CSS/login.css" />
</head>
<body>
    <?php
        //Logout the user
        session_start();
        $_SESSION = array();
        session_destroy();
        header("location: index.php");
        exit;
    ?>
</body>
</html>