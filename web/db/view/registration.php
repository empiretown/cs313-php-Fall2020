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
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form method="post" action="/db/accounts/index.php">
                <h1>Acme Registration</h1>
                <p>All fields are requiered.<p>
                        Full Name<br>
                        <input type="text" name="fullname" id="fullname" <?php if(isset($fullName)){echo "value='$fullName'" ;} ?> /><br>

                        Email Adress<br>
                        <input type="email" name="email" id="email" <?php if(isset($email)){echo "value='$email'" ;} ?> /><br>

                        Username<br>
                        <input type="text" name="username" id="username" <?php if(isset($username)){echo "value='$username'" ;} ?> /><br>

                        Password<br><b><span class="spancss">Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span></b><br>
                        <input type="password" name="password" id="password" value="" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>

                        Phone Number<br>
                        <input type="tel" id="phonenumber" name="phonenumber" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" <?php if(isset($phoneNumber)){echo "value='$phoneNumber'" ;} ?>/><br><br>

                        <input class="buttons" type="submit" name="submit" value="Register">
                        <input type="hidden" name="action" value="registration"><br>
            </form>
        </main>
    </div>
    <footer>
        <hr>
        <br />
        <p>&copy; 2018 speedxcars.com<p>
                <br />
    </footer>
    <script src="../js/car.js">
    </script>
</body>

</html>
© 20