<?php include 'header.php';?>
<?php include 'sidebar.php';?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toys";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $userid = $_COOKIE['userID'];
    $sql = "select * from purchased LEFT JOIN toys ON toys.toy_id = purchased.toy_id LEFT JOIN category ON category.category_id = toys.category_id where user_id = $userid and status = 1 ORDER by purchase_id desc;";
    $result = $conn->query($sql);
    $conn->close();
?>

<section class="col-md-8">
    <br/>
    <span class="green mytext">
    <?php
        if (isset($_COOKIE["orders"])) {
            echo $_COOKIE["orders"];
        }
    ?>
    </span>
    <br/>
</section>
<section class="col-md-1"></section>
<section id="ccr-left-section" class="col-md-6">
    <span class="mytext">
        <?php
            if(mysqli_num_rows($result)==0){
                echo "You did not place any orders ...";
            }
            else{
                echo "Your orders ...";
            }
        ?>
    </span>
    <section id="ccr-commnet">
        <ol class="commentlist">
        <?php
            while($row = $result->fetch_assoc()){
                echo "<li  class='comment'>";
                    echo "<article>";
                        echo "<div class='comment-authore'>";
                            echo "<img src='".$row['image_url']."' alt='Toy Image'>";
                        echo "</div>";
                        echo "<div class='comment-content'>";
                            echo "<h3><a href='#'>".substr($row['toy_name'],0,25)." ...</a></h3>";
                            echo "<p> Category : ".$row['category_name']."</p>";
                            echo "<p>Price : ".$row['price']."</p>";
                            echo "<p>Address Delivered : ".$row['address']."</p>";
                        echo "</div>";
                    echo "</article>";
                echo "</li>";
            }
        ?>
        </ol>
    </section>
</section>

<?php include 'footer.php';?>