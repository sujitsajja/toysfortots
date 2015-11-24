<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toys";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $toy_id = $_GET["toy_id"];
    $sql = "UPDATE toys SET deleted = 1 WHERE toy_id = $toy_id;";
    $conn->query($sql);
    $conn->close();
    setcookie("delete", "The selected toy has been deleted ...", time()+1);
    header("Location: http://localhost:81/toysfortots/index.php");
?>