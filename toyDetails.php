<?php include 'header.php';?>
<?php include 'sidebar.php';?>
<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="toys";
    $conn=new mysqli($servername, $username, $password, $dbname);
    $toyid=$_GET['toy_id'];
    $sql="SELECT * FROM toys WHERE toy_id = $toyid;";
    $result=$conn->query($sql);
    while($row = $result->fetch_assoc()){
        $toyname = $row['toy_name'];
        $description = $row['description'];
        $cat_id = $row['category_id'];
        $age_id = $row['age_group_id'];
        $sex_id = $row['gender_id'];
        $price = $row['price'];
        $img = $row['image_url'];
    }
    $sql="SELECT * FROM category WHERE category_id = $cat_id;";
    $result=$conn->query($sql);
    while($row = $result->fetch_assoc()){
        $cat_name = $row['category_name'];
    }
    $sql="SELECT * FROM gender WHERE gender_id = $sex_id;";
    $result=$conn->query($sql);
    while($row = $result->fetch_assoc()){
        $gender = $row['gender_name'];
    }
    $sql="SELECT * FROM age WHERE age_id = $age_id;";
    $result=$conn->query($sql);
    while($row = $result->fetch_assoc()){
        $age_group = $row['age'];
    }
    $conn->close();
?>

<section class="col-md-1"></section>
<section id="ccr-left-section" class="col-md-7">
    <span class="green mytext">
    <?php
        if (isset($_COOKIE["edittoy"])) {
            echo $_COOKIE["edittoy"];
        }
    ?>
    </span>
    <section id="ccr-category-2">
        <div class="ccr-category-featured">
            <div class="ccr-thumbnail">
                <img src="<?php echo $img; ?>" alt="Toy Image">
                <div class="like-comment-readmore">
                    <?php
                        if(!isset($_COOKIE["user"])){
                            echo "<a class='read-more' href='login.php'>Please Login to buy</a>";
                        }
                        else{
                            if($_COOKIE["role"]==1){
                                echo "<a class='read-more' href='deleteToy.php?toy_id=$toyid'>Delete</a>";
                                echo "<a class='read-more' href='editToy.php?toy_id=$toyid'>Update</a>";
                            }
                            else{
                                echo "<a class='read-more' href='cart.php?toy_id=$toyid'>Add to Cart</a>";
                            }
                        }
                    ?>
                </div>
            </div>
            <article>
                <h2><?php echo $toyname; ?></h2><br/>
                <h4>
                <table class="mytable">
                    <tr>
                        <td>Age Group</td>
                        <td>: <?php echo $age_group; ?></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>: <?php echo $gender; ?></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>: <?php echo $cat_name; ?></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>: $<?php echo $price; ?></td>
                    </tr>
                </table>
                </h4>
            </article>
        </div>
    </section>
    <h4><?php echo $description; ?></h4>
</section>

<?php include 'footer.php';?>