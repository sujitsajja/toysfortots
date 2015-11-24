<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toys";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $address = $_POST["address"];
    $userid = $_COOKIE['userID'];
    $sql = "UPDATE purchased LEFT JOIN toys ON purchased.toy_id = toys.toy_id SET status = 1,address = '$address' WHERE user_id = $userid and status = 0 and deleted = 0;";
    $conn->query($sql);
    $conn->close();
    setcookie("orders", "Your orders have been placed, Thank you for purchasing ... ", time()+1);
    header("Location: http://localhost:81/toysfortots/ordersHistory.php");
?>