<?php
if ($_SESSION['clientData']['clientLevel'] == 1) {
    header('location: ../view/home.php');
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

                <form method="post" action="../product/inputproduct.php">
                <h1>Add Product</h1>
               

                    Category<br>
                    <?php echo $catList; ?><br>

                   
                    Product Name<br>
                    <input type="text" name="newProduct" id="invName"> <br>
                                      
                    Product Description<br>
                    <input type="text" name="desc" id="invDescription" >
                    
                                    
                    Product Price<br>
                    <input type="text" name="newPrice" id="invPrice">
                    <br>
                  
                    # in Stock<br>
                    <input type="text" name="numStock" id="invStock"><br>

                    Shipping Size ( W x H x L in inches )<br>
                    <input type="text" name="newSize" id="invSize" value=""><br>
                    Weight (lbs.)<br>
                    <input type="text" name="newWeight" id="invWeight" value=""><br>
                    Location (city name)<br>
                    <input type="text" name="newLocation" id="invLocation" value=""><br>

                    Vendor Name<br>
                    <input type="text" name="vendor" id="invVendor"><br>

                    <input class="button" type="submit"  >
                    
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