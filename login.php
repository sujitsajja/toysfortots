<?php include 'header.php';?>
<?php include 'sidebar.php';?>

<section class="col-md-2"></section>
<section id="ccr-left-section" class="col-md-4">
    <br/><br/>
    <span class="red">
    <?php
        if (isset($_COOKIE["login"])) {
            echo $_COOKIE["login"];
        }
    ?>
    </span>
    <br/>
    <span class="mytext">
        Login credentials please ...
    </span>
    <section id="ccr-contact-form">
        <form action="login_form.php" method="post" id="commentform">
            <span class="red" id="unavailable">Username not registered</span>
            <input id="username" name="username" type="text" placeholder="Username" />
            <input id="url" name="pwd" type="password" placeholder="Password" />
            <input name="submit" type="submit" id="submit" value="Login" />
        </form>
        <a href="register.php" class="orange">New user??? Register here ...</a>
    </section>
</section>

<script type="text/javascript">
    $(document).ready(function(){
       $("input").attr("required", true);
       $('#unavailable').hide();
       $('#username').keyup(function(){
            var username = $('#username').val();
            if(username.length > 0){
                var UrlToPass = 'username='+username;
                $.ajax({
                    type : 'POST',
                    url  : 'checkUsername.php',
                    data : UrlToPass,
                    success: function(result){
                        if(result == 0){
                            $('#unavailable').show();
                            $('input[type="submit"]').attr('disabled', true);
                        }
                        else{
                            $('#unavailable').hide();
                            $('input[type="submit"]').attr('disabled', false);
                        }
                    }
                });
            }
            else{
                $('#unavailable').hide();
                $('input[type="submit"]').attr('disabled', true);
            }
        });
    });
</script>

<?php include 'footer.php';?>