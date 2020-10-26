<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Shed Market</title>
    <meta name="viewport" content="width=device-width">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../../db/css/style.css" rel="stylesheet" type="text/css">
  </head>

  <body>
    <div class="wrapper">
        <div id="top-header">
            <a href="../../db/view/home.php"><img src="../../db/images/logoshed.png" alt=""></a>
            <div class=small-logo>
                <img src="../../db/images/loginlogo.png" alt=""/>
                <span><a href="?action=login">Login</a></span>
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


    <footer>
        <hr>
        <br>
        <p>&copy; 2020 SHED MARKET</p>
    </footer>

  </body>
</html>