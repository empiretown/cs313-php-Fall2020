<?php
if ($_SESSION['clientData']['clientLevel'] == 1) {
    header('location: /acme/');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>SpeedX Buy Cars - Registration</title>
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
            <form method="post" action="/acme/products/index.php">
                <h1>Add Category</h1>
                <p>Add a new category of products below:<p>
                        New Category Name<br>
                        <input type="text" name="categoryName" id="categoryName" required placeholder="Enter a valid category" <?php if (isset($categoryName)) { echo "value='$categoryName'" ; } ?> required><br><br>
                        <input class="buttons" type="submit" name="submit" value="Add Category">
                        <input type="hidden" name="action" value="newCategory"><br>
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