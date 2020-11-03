<!DOCTYPE html>
<html>

<head>
    <title>SHED MARKET | Registration</title>
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
                <span><a href="../../db/view/login.php">Login</a></span>
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
            if (isset($message)) {
                echo $message;
            }
            ?>
        <form action="../account/index.php" method="post" >
            <h1>SHED MARKET</h1>
            Email Address<br>
            <input type="email" name="clientEmail" id="email" <?php if(isset($clientEmail)){echo "value='$clientEmail'" ;} ?> /><br>
            Password<br><b><span class="spancss">Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span></b><br>
            <input type="password" name="clientPassword" id="password" value="" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
            <input class="buttons" type="submit" name="submit" value="Login">
            <input type="hidden" name="action" value="logging"><br>
        </form>
        </main>
    </div>
    <footer>
        <hr>
        <br />
        <p>2020<p>
                <br />
    </footer>
    <script src="../js/car.js">
    </script>
</body>

</html>
