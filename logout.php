<?php
    unset($_COOKIE['user']);
    setcookie('user', null);
    setcookie("login", "Successfully logged out", time()+1);
    header("Location: http://localhost:81/toysfortots/login.php");
?>