<?php include 'header.php';?>
<?php include 'sidebar.php';?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toys";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $toy_id = $_GET['toy_id'];
    $sql = "SELECT * FROM toys where toy_id = $toy_id;";
    $toy = $conn->query($sql);
    while($row = $toy->fetch_assoc()) {
        $toyname = $row['toy_name'];
        $cat_id = $row['category_id'];
        $age_id = $row['age_group_id'];
        $gender_id = $row['gender_id'];
        $price = $row['price'];
        $url = $row['image_url'];
        $description = $row['description'];
    }
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
    <br/><br/><br/>
    <span class="mytext">
        Update the toy details ...
    </span>
    <section id="ccr-contact-form">
        <form action="editToys_form.php" method="post" id="commentform">
            <input type="hidden" name="toy_id" value="<?php echo $toy_id; ?>">
            <input id="url" name="toyname" type="text" placeholder="Name of the toy" value="<?php echo $toyname; ?>" class="required" />
            <select id="author" name="category" class="required">
                <option disabled="disabled">Choose a category</option>
                <?php
                    while($row = $category->fetch_assoc()) {
                        if($row['category_id']==$cat_id){
                            echo "<option value='".$row['category_id']."' selected='selected'>".$row['category_name']."</option>";
                        }
                        else{
                            echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
                        }
                    }
                ?>
            </select>
            <select id="email" name="gender" class="required">
                <option disabled="disabled">Choose a gender</option>
                <?php
                    while($row = $gender->fetch_assoc()) {
                        if($row['gender_id']==$gender_id){
                            echo "<option value='".$row['gender_id']."' selected='selected'>".$row['gender_name']."</option>";
                        }
                        else{
                            echo "<option value='".$row['gender_id']."'>".$row['gender_name']."</option>";
                        }
                    }
                ?>
            </select>
            <select id="author" name="agegroup" class="required">
                <option disabled="disabled">Select an age group</option>
                <?php
                    while($row = $age->fetch_assoc()) {
                        if($row['age_id']==$age_id){
                            echo "<option value='".$row['age_id']."' selected='selected'>".$row['age']."</option>";
                        }
                        else{
                            echo "<option value='".$row['age_id']."'>".$row['age']."</option>";
                        }
                    }
                ?>
            </select>
            <input id="price" name="price" type="text" placeholder="Price" value="<?php echo $price; ?>" class="required" />
            <div id="price-info">
                <span class="red fr">Price format is wrong</span>
            </div>
            <input id="url" name="url" type="text" placeholder="URL for image of the toy" value="<?php echo $url; ?>"/>
            <textarea id="comment" name="description" placeholder="Description" rows="8"><?php echo $description; ?></textarea>
            <input name="submit" type="submit" class="addtoy" id="submit" value="Update Toy" />
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