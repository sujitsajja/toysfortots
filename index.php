<?php include 'header.php';?>
<?php include 'sidebar.php';?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toys";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM category;";
    $categories = $conn->query($sql);
    $numberOfRows = mysqli_num_rows($categories);
    for ($x = 0; $x < $numberOfRows; $x++){
        $row = $categories->fetch_assoc();
        $id = $row["category_id"];
        $sql = "SELECT * FROM toys where category_id = $id and deleted = 0 ORDER BY toy_id desc LIMIT 3;";
        $result[$x] = $conn->query($sql);
    }
?>

<section id="ccr-left-section" class="col-md-8">
    <span class="mytext red">
        <?php
            if (isset($_COOKIE["delete"])) {
                echo $_COOKIE["delete"];
            }
        ?>
    </span>
    <?php
        for ($x = 0; $x < $numberOfRows; $x++){
            $id = $x + 1;
            $sql = "SELECT * FROM category where category_id = $id";
            $cat = $conn->query($sql);
            while($row = $cat->fetch_assoc()){
                $catname = $row["category_name"];
                $catid = $row["category_id"];
            }
            echo "<section id='ccr-latest-post-gallery'>";
                echo "<div class='ccr-gallery-ttile'>";
                    echo "<span></span>";
                    echo "<p>";
                        echo $catname;
                        echo "<a href='searchResults.php?cat_id=".$catid."' class='fr'>similar toys -></a>";
                    echo "</p>";
                echo "</div>";
                echo "<ul class='ccr-latest-post'>";
                    while($row = $result[$x]->fetch_assoc()){
                        echo "<li>";
                            echo "<div class='ccr-thumbnail'>";
                                echo "<img src='".$row['image_url']."' alt='Toy Image'>";
                                echo "<p><a href='toyDetails.php?toy_id=".$row['toy_id']."'>Read More</a></p>'";
                            echo "</div>";
                            echo "<h4><a href='#'>".$row['toy_name']."</a></h4>";
                        echo "</li>";
                    }
                echo "</ul>";
            echo "</section>";
            echo "<section class='bottom-border'></section>";
        }
    ?>
</section>

<?php $conn->close(); ?>
<?php include 'footer.php';?>