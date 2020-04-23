<!DOCTYPE html>
<html lang="en">
<body>
    <?php
        include "includes/header.php";
    ?>
    <!--Code for the login form-->
    <div class="slideshow txt" style = "height: 500px;">
        <h1>Log In</h1>
        <form class="logincontent" method="post">
            <br>
            <input type="text" name="username" placeholder="Username"><br><br>
            <input class="formcontent" type="password" name="password" placeholder="Password"><br><br><br><br>
            <button class = "buttonC loginbutton" value="submit" class = "button" name="login-submit">Log In</button><br><br><br>
        </form>
        <button class = "buttonC loginbutton" onclick="window.location.href='signup.php'">No account? Sign up here.</button><br>
        
        <?php
            include "includes/connect.php";
            //Initialize the Database
            $mySQLI = new mysqli($servername, $db_username, $db_password, $db_database);
            if($mySQLI->connect_error){
                die("Connection Failed." . $mySQLI->connect_error);
            }
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                if(isset($_POST['login-submit'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                    $result = mysqli_query($mySQLI, $sql);
                    $count = mysqli_num_rows($result);
                    $row = mysqli_fetch_assoc($result);
                    if($count > 0){
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username; 
                        $_SESSION["password"] = $password;
                        $_SESSION["loggedout"]  = false;
                        $_SESSION["deleted"] = false;
                        $_SESSION['email'] = $row["email"];
                        $_SESSION['uid'] = $row['uno'];
                        header("Location: index.php");
                    }else{
                        header("Location: login.php?error=incorrectcreds");
                    }
                }
            }
            $mySQLI->close();
        ?>
    </div>

    
    <br>
    <?php
        include "includes/footer.php";
    ?>
</body>
</html>