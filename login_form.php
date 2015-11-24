<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toys";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $user = $_POST["username"];
    $pwd = $_POST["pwd"];
    $sql = "SELECT * FROM user WHERE user_name = '".$user."';";
    $result = $conn->query($sql);
    $conn->close();
    while($row = $result->fetch_assoc()) {
        if(strcmp($pwd,$row["password"])==0){
            setcookie("user", $row["user_name"]);
            setcookie("userID", $row["user_id"]);
            setcookie("role", $row["role_id"]);
            header("Location: http://localhost:81/toysfortots");
        }
        else {
            setcookie("login", "Username and password do not match", time()+1);
            header("Location: http://localhost:81/toysfortots/login.php");
        }
    }
?>