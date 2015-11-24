<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="toys";
    $conn=new mysqli($servername, $username, $password, $dbname);
    $sql="SELECT * FROM toys WHERE deleted = 0 ORDER BY toy_id desc limit 5;";
    $recent=$conn->query($sql);
    $sql = "SELECT * FROM category;";
    $category = $conn->query($sql);
    $sql = "SELECT * FROM age;";
    $age = $conn->query($sql);
    $sql = "SELECT * FROM gender;";
    $gender = $conn->query($sql);
    $x = 0;
    while($row = $category->fetch_assoc()){
        $category_name[$x] = $row['category_name'];
        $x++;
    }
    $sql = "SELECT * FROM category;";
    $category = $conn->query($sql);
    $conn->close();
?>

<aside class="col-md-4 ccr-home">
    <section id="sidebar-popular-post">
        <div class="ccr-gallery-ttile">
            <span></span>
            <p><strong>New Toys</strong></p>
        </div>
        <ul>
            <?php
                while($row = $recent->fetch_assoc()){
                    echo "<li>";
                        echo "<img src='".$row['image_url']."' alt='Toy Image'>";
                        echo "<a href='toyDetails.php?toy_id=".$row['toy_id']."'>".substr($row['toy_name'],0,33)." ...</a>";
                        echo "<div class='date-like-comment'>";
                        $cat_id = $row['category_id'];
                        $cat_id--;
                        echo "<br/>Category : $category_name[$cat_id]";
                        echo "</div>";
                    echo "</li>";
                }
            ?>
        </ul>
    </section>
    <section id="ccr-sidebar-newslater">
        <div class="ccr-gallery-ttile">
            <span></span>
            <p><label for="sb-newslater"><strong>Search for specific toy</strong></label></p>
        </div>
        <div class="sidebar-newslater-form">
            <form class="ccr-gallery-ttile" action="searchResults.php" method="post">
                <input type="text" id="sb-newslater" name="specific" placeholder="Enter the toy name">
                <button type="submit" class="experiment">Search</button>
            </form>
        </div>
    </section>
    <section id="sidebar-popular-post">
        <div class="ccr-gallery-ttile">
            <span></span>
            <p><strong>Filter toys</strong></p>
        </div>
        <ul><li>
            <form action="searchResults.php" method="post" id="commentform">
                <select id="specialSidebar" name="category">
                    <option disabled="disabled" selected="selected">Category</option>
                    <?php
                        while($row = $category->fetch_assoc()){
                            echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
                        }
                    ?>
                </select>
                <div class="col-md-6">
                    <select id="specialSidebar" name="gender">
                        <option disabled="disabled" selected="selected">Gender</option>
                        <?php
                            while($row = $gender->fetch_assoc()){
                                echo "<option value='".$row['gender_id']."'>".$row['gender_name']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <select id="specialSidebar" name="age">
                        <option disabled="disabled" selected="selected">Age Group</option>
                        <?php
                            while($row = $age->fetch_assoc()){
                                echo "<option value='".$row['age_id']."'>".$row['age']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <input name="submit" type="submit" id="submit" value="Search" />
                </div>
            </form>
        </li></ul>
    </section>
    <section id="ccr-find-on-fb">
        <div class="find-fb-title">
            <span><i class="fa fa-facebook"></i></span> Find us on Facebook
        </div>
        <div class="find-on-fb-body">
            <img src="img/1.jpg" />
            <a href="https://www.facebook.com/abhimanyu.rana.92" target="_blank">Abhimanyu Rana</a>
            <a href="https://www.facebook.com/balaramsai92" target="_blank" class="red">Sujit Sajja</a>
            <a href="https://www.facebook.com/varun.stranger" target="_blank" class="orange">Varun Kasturi</a><br/>
        </div>
    </section>
</aside>

<script type="text/javascript">
    $(document).ready(function(){
        $("#sb-newslater").attr("required", true);
        $("#searchXYZ").attr("required", true);
    });
</script>