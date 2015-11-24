<?php include 'header.php';?>
<?php include 'sidebar.php';?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toys";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM category;";
    $category = $conn->query($sql);
    $sql = "SELECT * FROM age;";
    $age = $conn->query($sql);
    $sql = "SELECT * FROM gender;";
    $gender = $conn->query($sql);
    $conn->close();
?>

<section class="col-md-1"></section>
<section id="ccr-left-section" class="col-md-6">
    <br/><br/>
    <span class="green">
    <?php
        if (isset($_COOKIE["addtoy"])) {
            echo $_COOKIE["addtoy"];
        }
    ?>
    </span>
    <br/>
    <span class="mytext">
        Toy details please ...
    </span>
    <section id="ccr-contact-form">
        <form action="addtoys_form.php" method="post" id="commentform">
            <input id="url" name="toyname" type="text" placeholder="Name of the toy" class="required" />
            <select id="author" name="category" class="required">
                <option disabled="disabled" selected="selected">Choose a category</option>
                <?php
                    while($row = $category->fetch_assoc()) {
                        echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
                    }
                ?>
            </select>
            <select id="email" name="gender" class="required">
                <option disabled="disabled" selected="selected">Choose a gender</option>
                <?php
                    while($row = $gender->fetch_assoc()) {
                        echo "<option value='".$row['gender_id']."'>".$row['gender_name']."</option>";
                    }
                ?>
            </select>
            <select id="author" name="agegroup" class="required">
                <option disabled="disabled" selected="selected">Select an age group</option>
                <?php
                    while($row = $age->fetch_assoc()) {
                        echo "<option value='".$row['age_id']."'>".$row['age']."</option>";
                    }
                ?>
            </select>
            <input id="price" name="price" type="text" placeholder="Price" class="required" />
            <div id="price-info">
                <span class="red fr">Price format is wrong</span>
            </div>
            <input id="url" name="url" type="text" placeholder="URL for image of the toy" />
            <textarea id="comment" name="description" placeholder="Description" rows="8"></textarea>
            <input name="submit" type="submit" class="addtoy" id="submit" value="Add Toy" />
        </form>
    </section>
</section>

<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       $(".required").attr("required", true);
       $('#price-info').hide();
       $('#price').keyup(function(){
            var regex = /^\d*(.\d{2})?$/;
            if(regex.test($('#price').val())){
                $('#price-info').hide();
                $('input[type="submit"]').attr('disabled', false);
            }
            else{
                $('#price-info').show();
                $('input[type="submit"]').attr('disabled', true);
            }
       });
    });
</script>

<?php include 'footer.php';?>