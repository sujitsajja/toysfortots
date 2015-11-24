<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="online toy store">
        <meta name="author" content="Abhimanyu, Varun, Sujit">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Toys For Tots</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>
        <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body>
        <header id="ccr-header">
            <section id="ccr-nav-top" class="fullwidth">
                <div class="">
                    <div class="container">
                        <nav class="top-menu">
                            <ul class="left-top-menu">
                                <li><a href="index.php">Home</a></li>
                                <?php
                                    if (isset($_COOKIE["user"])){
                                        echo "<li><a>Hello ".$_COOKIE['user']." !</a></li>";
                                    }
                                ?>
                            </ul>
                            <ul class="right-top-menu pull-right">
                                <?php
                                    if(!isset($_COOKIE["user"])){
                                        echo "<li><a href='login.php'>Login</a></li>";
                                        echo "<li><a href='register.php'>Register</a></li>";
                                    }
                                    else{
                                        if($_COOKIE["role"]==1){
                                            echo "<li><a href='addtoys.php'>Add toys</a></li>";
                                        }
                                        else{
                                            echo "<li><a href='cart.php'>My Cart</a></li>";
                                            echo "<li><a href='ordersHistory.php'>Orders history</a></li>";
                                        }
                                        echo "<li><a href='logout.php'>Logout</a></li>";
                                    }
                                ?>
                                <li>
                                    <form class="form-inline" role="form" action="searchResults.php" method="post">
                                        <input type="search" id="searchXYZ" placeholder="Search here..." name="entire">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section>
            <section id="ccr-site-title">
                <div class="container">
                    <img src="img/2.jpg" class="logoimg"/>
                    <div class="add-space">
                        Toys that everyone longs for
                    </div>
                </div>
            </section>
            <section id="ccr-nav-main">
                <nav class="main-menu">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".ccr-nav-main">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse ccr-nav-main">
                            <ul class="nav navbar-nav">
                                <li><a class="active" href="index.php">Home</a></li>
                                <li><a href="searchResults.php">List all toys</a></li>
                                
                            </ul>
                        </div>
                        <div id="currentTime" class="pull-right current-time">
                            <i class="fa fa-clock-o"></i>
                            <?php
                                $t=time();
                                echo(date("m-d-Y",$t));
                            ?>
                        </div>
                    </div>
                </nav>
            </section>
        </header>
        <section id="ccr-main-section">
            <div class="container">