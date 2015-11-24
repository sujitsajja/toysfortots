<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toys";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $purchase_id = $_GET["purchase_id"];
    $sql = "delete from purchased where purchase_id = $purchase_id";
    $conn->query($sql);
    $conn->close();
    header("Location: http://localhost:81/toysfortots/cart.php");
?>