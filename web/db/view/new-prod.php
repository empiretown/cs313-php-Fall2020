<?php
if ($_SESSION['clientData']['clientLevel'] == 1) {
    header('location: ../view/home.php');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>SHED MARKET | Create a new product</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../../db/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mr-auto">
  <img class="navbar-brand"  style="height:80; min-height:80px"src="../images/logo.jpg"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../view/home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../view/login.php">Login</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    
  </div>
</nav>
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