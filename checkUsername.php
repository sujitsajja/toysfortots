<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toys";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if(isset($_POST['username'])){
        $username = htmlentities($_POST['username']);
        $sql = "SELECT * FROM user WHERE user_name = '".$username."';";
        $result = $conn->query($sql);
        echo mysqli_num_rows($result);
    }
    if(isset($_POST['email'])){
        $email = htmlentities($_POST['email']);
        $sql = "SELECT * FROM user WHERE email_id = '".$email."';";
        $result = $conn->query($sql);
        echo mysqli_num_rows($result);
    }
?>