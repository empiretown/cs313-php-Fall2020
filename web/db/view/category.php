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
                <span><a href="../..db/view/login.php">Login</a></span>
                <img src="../../db/images/cart.png" alt=""><span>Cart</span>
            </div>
        </div>
    </div>
    <header class="header">
        <nav class="header-nav" role="navigation">
            <div class="header-nav-brand"></div>
            <!--<ul class="header-nav-list">
                    <li><a href="#">Grains</a></li>
                    <li><a href="#">Home products</a></li>
                    <li><a href="#">Friuts/a></li>
                    <li><a href="#">Frozen Foods</a></li>
                </ul>-->
            <ul class="header-nav-list">
                <?php echo $navlist; ?>
            </ul>

        </nav>
    </header>
        <main>

            <h1>
                <?php echo $type; ?> Products </h1>
            <?php if (isset($message)) { echo $message; }?>
            <div id="prod-display">
            <?php if (isset($prodDisplay)) { echo $prodDisplay; } ?>
            </div>
        </main>
    </div>
    <footer>
        <hr>
        <br />
        <p>&copy; 2020 SHEDMARKET.com<p>
                <br />
    </footer>
    <script src="../js/nav.js">
    </script>
</body>

</html>
