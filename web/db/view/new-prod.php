<?php
if ($_SESSION['clientData']['clientLevel'] == 1) {
    header('location: /acme/');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>SHED MARKET | Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../../PROYECT/css/style.css" rel="stylesheet" type="text/css">

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
                <h1>Add Product</h1>
                <p>Add a new product below. All fields are requiered!<p>

                    Category<br>
                    <?php echo $catList; ?><br>

                    <!--                    in DB-->
                    Product Name<br>
                    <input type="text" name="invName" id="invName" <?php if (isset($invName)) {
                        echo "value='$invName'";
                    } ?>><br>
                    <!--                    in DB-->                    
                    Product Description<br>
                    <input type="text" name="invDescription" id="invDescription" <?php if (isset($invDescription)) {
                        echo "value='$invDescription'";
                    } ?> ><br>
                    <!--                    in DB-->
                    Product Image (path to image)<br>
                    <input type="text" name="invImage" id="invImage" <?php if (isset($invImage)) {
                        echo "value='$invImage'";
                    } ?> ><br>

                    Product Thumbnail (path to thumbnail)<br>
                    <input type="text" name="invThumbnail" id="invThumbnail" value=""><br>

                    <!--                    in DB-->                    
                    Product Price<br>
                    <input type="text" name="invPrice" id="invPrice" <?php if (isset($invPrice)) {
                        echo "value='$invPrice'";
                    } ?> ><br>
                    <!--                    in DB-->
                    # in Stock<br>
                    <input type="text" name="invStock" id="invStock" <?php if (isset($invStock)) {
                        echo "value='$invStock'";
                    } ?> ><br>

                    Shipping Size ( W x H x L in inches )<br>
                    <input type="text" name="invSize" id="invSize" value=""><br>
                    Weight (lbs.)<br>
                    <input type="text" name="invWeight" id="invWeight" value=""><br>
                    Location (city name)<br>
                    <input type="text" name="invLocation" id="invLocation" value=""><br>

                    <!--                    in DB-->
                    Vendor Name<br>
                    <input type="text" name="invVendor" id="invVendor" <?php if (isset($invVendor)) {
                        echo "value='$invVendor'";
                    } ?> ><br>

                    Primary Material<br>
                    <input type="text" name="invMaterial" id="invMaterial" value=""><br><br>

                    <input class="buttons" type="submit" name="submit" value="Add Product">
                    <input type="hidden" name="action" value="newProduct"><br>
            </form>
        </main>
    </div>
    <footer>
        <hr>
        <br />
        <p>&copy;  2020 SHED MARKET<p>
        <br />
    </footer>
    <script src="../js/car.js">
    </script>
</body>

</html>
