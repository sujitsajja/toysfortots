<?php include 'header.php';?>
<?php include 'sidebar.php';?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toys";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if(!empty($_GET)){
        $catid = $_GET['cat_id'];
        $sql = "SELECT * FROM toys WHERE category_id = $catid and deleted = 0 ORDER BY toy_id desc;";
    }
    else{
        if(!empty($_POST['specific'])){
            $toy_name = $_POST['specific'];
            $sql = "SELECT * FROM toys WHERE toy_name like '%$toy_name%' and deleted = 0 ORDER BY toy_id desc;";
        }
        else{
            if(!empty($_POST['entire'])){
                $search = $_POST['entire'];
                $sql = "SELECT * FROM toys WHERE (toy_name like '%$search%' or description like '%$search%') and deleted = 0 ORDER BY toy_id desc;";
            }
            else{
                if(!empty($_POST['category'])){
                    $catid = $_POST['category'];
                    $sql = "SELECT * FROM toys WHERE category_id = $catid and deleted = 0 ORDER BY toy_id desc;";
                    if(!empty($_POST['gender'])){
                        $gender = $_POST['gender'];
                        $sql = "SELECT * FROM toys WHERE category_id = $catid and gender_id = $gender and deleted = 0 ORDER BY toy_id desc;";
                        if(!empty($_POST['age'])){
                            $age = $_POST['age'];
                            $sql = "SELECT * FROM toys WHERE category_id = $catid and gender_id = $gender and age_group_id = $age and deleted = 0 ORDER BY toy_id desc;";
                        }
                    }
                    else{
                        if(!empty($_POST['age'])){
                            $age = $_POST['age'];
                            $sql = "SELECT * FROM toys WHERE category_id = $catid and age_group_id = $age and deleted = 0 ORDER BY toy_id desc;";
                        }
                    }
                }
                else{
                    if(!empty($_POST['gender'])){
                        $gender = $_POST['gender'];
                        $sql = "SELECT * FROM toys WHERE gender_id = $gender and deleted = 0 ORDER BY toy_id desc;";
                        if(!empty($_POST['age'])){
                            $age = $_POST['age'];
                            $sql = "SELECT * FROM toys WHERE gender_id = $gender and age_group_id = $age and deleted = 0 ORDER BY toy_id desc;";
                        }
                    }
                    else{
                        if(!empty($_POST['age'])){
                            $age = $_POST['age'];
                            $sql = "SELECT * FROM toys WHERE age_group_id = $age and deleted = 0 ORDER BY toy_id desc;";
                        }
                        else{
                            $sql = "SELECT * FROM toys WHERE deleted = 0 ORDER BY toy_id desc;";
                        }
                    }
                }
            }
        }
    }
    $result = $conn->query($sql);
    $numberOfRows = mysqli_num_rows($result);
    $msg = "Found $numberOfRows results ...";
    $conn->close();
?>

<section class="col-md-1"></section>
<section id="ccr-left-section" class="col-md-6">
    <section id="ccr-commnet">
        <ol class="commentlist">
        <?php
            echo "<span class='mytext green'>";
                echo $msg;
            echo "</span>";
            while($row = $result->fetch_assoc()){
                echo "<li  class='comment'>";
                    echo "<article>";
                        echo "<div class='comment-authore'>";
                            echo "<img src='".$row['image_url']."' alt='Toy Image'>";
                        echo "</div>";
                        echo "<div class='comment-content'>";
                            echo "<h3><a href='#'>".substr($row['toy_name'],0,25)."...</a></h3><br/>";
                            echo "<p>".substr($row['description'],0,100)."...</p>";
                            echo "<div class='meta-data reply'>";
                                echo "<span class='read-more'><a href='toyDetails.php?toy_id=".$row['toy_id']."'>Read More</a></span>";
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