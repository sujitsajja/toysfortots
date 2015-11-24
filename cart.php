<?php include 'header.php';?>
<?php include 'sidebar.php';?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toys";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $userid = $_COOKIE['userID'];
    if(!empty($_GET)){
        $toyid = $_GET['toy_id'];
        $sql = "Insert into purchased(user_id,toy_id) values('".$userid."','".$toyid."');";
        $conn->query($sql);
    }
    $sql = "select * from purchased LEFT JOIN toys ON toys.toy_id = purchased.toy_id LEFT JOIN category ON category.category_id = toys.category_id where purchased.user_id = $userid and purchased.status = 0 and toys.deleted = 0;";
    $result = $conn->query($sql);
    $sql = "select ROUND(SUM(price),2) as sum,count(*) as total from purchased LEFT JOIN toys ON toys.toy_id = purchased.toy_id where user_id = $userid and status = 0 and deleted = 0;";
    $price = $conn->query($sql);
    while($row = $price->fetch_assoc()){
        $sum = $row['sum'];
        $total = $row['total'];
    }
    $conn->close();
?>

<section class="col-md-1"></section>
<section id="ccr-left-section" class="col-md-6">
    <div class="current-page mytext">
        <?php
            if(mysqli_num_rows($result)==0){
                echo "There are no items in your cart ...";
            }
            else{
                echo "Total price : $ $sum( $total items)";
                echo "<span class='fr read-more'>";
                    echo "<a href='checkOut.php'>Check Out</a>";
                echo "</span>";
            }
        ?>
    </div>
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
                            echo "<br/>";
                            echo "Price : ".$row['price'];
                            echo "<div class='meta-data reply'>";
                                echo "<span class='read-more'><a href='deleteToyCart.php?purchase_id=".$row['purchase_id']."'>Remove from cart</a></span>";
                            echo "</div>";
                        echo "</div>";
                    echo "</article>";
                echo "</li>";
            }
        ?>
        </ol>
    </section>
</section>

<?php include 'footer.php';?>