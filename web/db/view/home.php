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
            <a class="logo" href="../../db/view/home.php"><img  class="large-logo" src="../../db/images/shed.png" alt=""></a>
            <div class="small-logo">
                    <img src="../../db/images/loginlogo.png" alt="" />
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

    <section>
        <img src="../../db/images/shop3.png" alt="shed in the streets in nigeria">
    </section>
    <br>

    <section class="cars-section">
        <h1> 30% Discount Product </h1>
        <div class="goods">
            <img src="../../db/images/goldenmorn.jpg" alt="cereal">
        </div>
        <div class="goods">
            <img src="../../db/images/dettolsoap.jpg" alt="cereal">
        </div>



    </section>

    <footer>
        <hr>
        <br>
        <p>&copy; 2020 SHED MARKET</p>
    </footer>

  </body>
</html>