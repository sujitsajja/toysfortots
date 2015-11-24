<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toys";
    $conn = new mysqli($servername, $username, $password, $dbname);
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
    $sql = "Insert into toys(category_id,gender_id,age_group_id,price,toy_name,description,image_url) values($category_id,$gender_id,$age_id,$price,'$name','$description','$url');";
    $conn->query($sql);
    $conn->close();
    setcookie("addtoy", "A new toy has been added", time()+1);
    header("Location: http://localhost:81/toysfortots/addtoys.php");
?>