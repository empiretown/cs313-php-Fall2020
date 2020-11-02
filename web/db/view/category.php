<!DOCTYPE html>
<html>

<head>
    <title>SHEDMARKET | Category</title>
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
                    <li><a href="#">Friuts</a></li>
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
                <div id="prod-display">
            <a href="../product/index.php?=catergory&type=<?php { echo $prodDisplay; } ?>">
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
