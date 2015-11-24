<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toys";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $toy_id = $_POST["toy_id"];
    $name = $_POST["toyname"];
    $category_id = $_POST["category"];
    $gender_id = $_POST["gender"];
    $price = $_POST["price"];
    $age_id = $_POST["agegroup"];
    if(empty($_POST["url"])){
        $url = "img/default.jpg";
    }
    else{
        $url = $_POST["url"];
    }
    $description = $_POST["description"];
    $sql = "UPDATE toys SET category_id = $category_id, gender_id = $gender_id, age_group_id = $age_id, price = $price, toy_name = '$name', description = '$description', image_url = '$url' WHERE toy_id = $toy_id;";
    $conn->query($sql);
    $conn->close();
    setcookie("edittoy", "Toy details have been updated", time()+1);
    header("Location: http://localhost:81/toysfortots/toyDetails.php?toy_id=$toy_id");
?>