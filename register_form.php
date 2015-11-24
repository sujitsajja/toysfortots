<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toys";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $user = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $cpwd = $_POST["cpwd"];
    $sql = "Insert into user(user_name,password,email_id) values('".$user."','".$pwd."','".$email."');";
    $conn->query($sql);
    $conn->close();
    setcookie("login", "Login with your new account", time()+1);
    header("Location: http://localhost:81/toysfortots/login.php");
?>