<!DOCTYPE html>
<html>

<head>
    <title>SpeedX Buy Cars - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../../db/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>
<div class="wrapper">
        <div id="top-header">
            <a class="logo" href="../../db/view/home.php"><img  class="large-logo" src="../../db/images/shed.png" alt=""></a>
            <div class="small-logo">
                    <img src="../../db/images/loginlogo.png" alt="" />
                <span><a href="?action=login.php">Login</a></span>
                <img src="../../db/images/cart.png" alt=""><span>Cart</span>
            </div>
        </div>
    </div>
    <header class="header">
        <nav class="header-nav" role="navigation">
            <div class="header-nav-brand"></div>
            <ul class="header-nav-list">
                <?php echo $navlist; ?>
            </ul>

        </nav>
    </header>
        <main>

           <?php
            if (isset($_SESSION['message'])) {
                $message = $_SESSION['message'];
                echo $message;
            }
            
            ?>
            <h1><?php echo $_SESSION['clientData']['customername'] . " " . $_SESSION['clientData']['username']; ?></h1>

            <ul>
                <li>First Name: <?php echo $_SESSION['clientData']['customername']; ?></li>
                <li>Username: <?php echo $_SESSION['clientData']['username']; ?></li>
                <li>Email: <?php echo $_SESSION['clientData']['email']; ?></li>
                <!--            ENHANCEMENT 7 WE ARE NOT SHOWING THE LEVEL DATA FOR THIS ENHANCEMENT
                    <li>User Lever: //<?php // echo $_SESSION['clientData']['clientLevel'];  ?></li>-->
            </ul>

            <a href='../account/index.php'>Click to modify your Information</a>

            <?php
            if ($_SESSION['clientData']['clientLevel'] > 2) {
                echo "<p> <a href='../../product/'>Products</a></p>";
            }
            ?>
            
        </main>
    </div>
    <footer>
        <hr>
        <br />
        <p>&copy; 2020 ShedMarket.com<p>
        <br />
    </footer>
    <script src="../js/car.js">
    </script>
</body>

</html>