<?php include 'header.php';?>
<?php include 'sidebar.php';?>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toys";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $userid = $_COOKIE['userID'];
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
    <br/><br/><br/>
    <span class="mytext">
        Enter the address for packages to be delivered ...
    </span>
    <section id="ccr-contact-form">
        <form action="checkOut_form.php" method="post" id="commentform">
            <textarea id="comment" name="address" placeholder="Address" rows="8"></textarea>
            <span class="mytext">
                Total price : $<?php echo $sum; ?>(<?php echo $total; ?> items)
            </span>
            <br/>
            <input name="submit" type="submit" id="submit" value="Place Order" />
        </form>
    </section>
</section>

<script type="text/javascript">
$(document).ready(function(){
   $("#comment").attr("required", true); 
});
</script>

<?php include 'footer.php';?>