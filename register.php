<?php include 'header.php';?>
<?php include 'sidebar.php';?>

<section id="ccr-left-section" class="col-md-4">
    <br/><br/>
    <span class="red">
    <?php
        if (isset($_COOKIE["register"])) {
            echo $_COOKIE["register"];
        }
    ?>
    </span>
    <br/>
    <span class="mytext">
        New user registration ...
    </span>
    <section id="ccr-contact-form">
        <form action="register_form.php" method="post" id="commentform">
            <span class="green" id="uavailable">Username is available</span>
            <span class="red" id="unavailable">Username is not available</span>
            <input id="username" name="username" type="text" placeholder="Username" class="required" />
            <input id="pwd" name="pwd" type="password" placeholder="Password" class="required" />
            <div id="pass-info"></div>
            <input id="cpwd" name="cpwd" type="password" placeholder="Confirm Password" class="required" />
            <span class="green" id="passwordok">Passwords match ...</span>
            <span class="red" id="passwordnotok">Password and confirm password do not match ...</span>
            <span class="red" id="enavailable">Email ID already registered</span>
            <input id="emailid" name="email" type="email" placeholder="Email ID" class="required" />
            <input name="submit" type="submit" id="submit" value="Register" class="register" />
        </form>
    </section>
</section>
<section class="col-md-4 orange">
    <br/><br/><br/><br/><br/><br/><br/><br/><br/>
    Rules for a strong password:
    <ol>
        <li>Must contain 5 characters or more</li>
        <li>Must contain lower case letters and at least one digit.</li>
        <li>Must contain at least one upper case letter, one lower case letter and one digit.</li>
        <li>Must contain at least one upper case letter, one lower case letter and one digit.</li>
    </ol>
</section>

<script type="text/javascript">
    $(document).ready(function(){
        $("input").attr("required", true);
        //Must contain 5 characters or more
        var WeakPass = /(?=.{5,}).*/;
        //Must contain lower case letters and at least one digit.
        var MediumPass = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/; 
        //Must contain at least one upper case letter, one lower case letter and one digit.
        var StrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/; 
        //Must contain at least one upper case letter, one lower case letter and one digit.
        var VryStrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{5,}$/;
        $('#uavailable').hide();
        $('#unavailable').hide();
        $('#enavailable').hide();
        $('#passwordok').hide();
        $('#passwordnotok').hide();
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
                            $('#uavailable').show();
                            $('#unavailable').hide();
                            $('input[type="submit"]').attr('disabled', false);
                        }
                        else{
                            $('#uavailable').hide();
                            $('#unavailable').show();
                            $('input[type="submit"]').attr('disabled', true);
                        }
                    }
                });
            }
            else{
                $('#uavailable').hide();
                $('#unavailable').hide();
                $('input[type="submit"]').attr('disabled', true);
            }
        });
        $('#emailid').keyup(function(){
            var email = $('#emailid').val();
            if(email.length > 0){
                var UrlToPass = 'email='+email;
                $.ajax({
                    type : 'POST',
                    url  : 'checkUsername.php',
                    data : UrlToPass,
                    success: function(result){
                        if(result == 0){
                            $('#enavailable').hide();
                            $('input[type="submit"]').attr('disabled', false);
                        }
                        else{
                            $('#enavailable').show();
                            $('input[type="submit"]').attr('disabled', true);
                        }
                    }
                });
            }
            else{
                $('#enavailable').hide();
                $('input[type="submit"]').attr('disabled', true);
            }
        });
        $('#pwd').keyup(function(){
            $('#passwordok').hide();
            $('#passwordnotok').hide();
            if(VryStrongPass.test($('#pwd').val()))
            {
                $('#pass-info').removeClass().addClass('green').html("Very Strong!<br/>(Awesome, please don't forget your pass now!)");
                $('input[type="submit"]').attr('disabled', false);
            }   
            else if(StrongPass.test($('#pwd').val()))
            {
                $('#pass-info').removeClass().addClass('strongpass').html("Strong!<br/>(Enter special chars to make even stronger");
                $('input[type="submit"]').attr('disabled', true);
            }   
            else if(MediumPass.test($('#pwd').val()))
            {
                $('#pass-info').removeClass().addClass('goodpass').html("Good!<br/>(Enter uppercase letter to make strong)");
                $('input[type="submit"]').attr('disabled', true);
            }
            else if(WeakPass.test($('#pwd').val()))
            {
                $('#pass-info').removeClass().addClass('orange').html("Still Weak!<br/>(Enter digits and letters to make good password)");
                $('input[type="submit"]').attr('disabled', true);
            }
            else
            {
                $('#pass-info').removeClass().addClass('red').html("Very Weak!<br/>(Must be 5 or more chars)");
                $('input[type="submit"]').attr('disabled', true);
            }
        });
        $('#cpwd').keyup(function(){
            if($('#pwd').val()==$('#cpwd').val()){
                $('#passwordok').show();
                $('#passwordnotok').hide();
                $('input[type="submit"]').attr('disabled', false);
            }
            else{
                $('#passwordok').hide();
                $('#passwordnotok').show();
                $('input[type="submit"]').attr('disabled', true);
            }
        });
    });
</script>

<?php include 'footer.php';?>