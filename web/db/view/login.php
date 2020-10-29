<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Shed Market | Login</title>
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

    <main>
        <?php
            if(isset($message)) {
                echo $message;
            }
        ?>

        <form action="/db/account/index.php" method="post">
            Email <br>
            <input type="email" name="email" value="" required><br> 
            Password <br>
            <input type="password" name="password"><br>

        <input type="button" type="submit" value="Login">
        <input type="hidden" name="action" value="login">
        <br>
        <br>
        <p class="negrita">Not a member?</p>
        </form>

        <form action="">
            <input type="submit" class="button" value="Register">
            <input type="hidden" name="action" value="registration">
        </form>
    </main>
</body>
</html> 
    </section>

    <footer>
        <hr>
        <br>
        <p>&copy; 2020 SHED MARKET</p>
    </footer>

  </body>
</html>