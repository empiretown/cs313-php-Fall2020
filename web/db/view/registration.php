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
			<h1>Registration</h1>
​
            <div id="form">
​
<?php
          
          if (isset($_SESSION['message'])) {
              echo $_SESSION['message'];
          }
          ?>
​
          <form action="accounts/index.php" method="post">
                  <label for="username">User Name: </label><input type="text" name="clientUsername" id="uname" required <?php if(isset($clientUsername)){echo "value='$clientUsername'";}  ?>><br>
                  <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span> 
                  <label for="password">Password: </label>
                  <input type="password" name="clientPassword" id="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
              <input type="submit" name="submit" id="regbtn" value="Register">
​
              <input type="hidden" name="action" value="registration">
          </form
            </div>
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
