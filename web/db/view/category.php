<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <title>Shed Market</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../../db/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>
<div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto ">
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
        <a class="nav-link" href="../view/registration.php">Sign Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../view/new-prod.php">Add Product</a>
      </li>
    </ul>
  </div>
</nav>
    
    </header>
        <main>

            <h1>
                <?php echo $type; ?> Products </h1>
            <?php if (isset($message)) { echo $message; }?>
            <div id="prod-display">
            <?php if (isset($prodDisplay)) { echo $prodDisplay; } ?>
            </div>
        </main>
    </div>
    <footer>
        <hr>
        <br />
        <p>&copy; 2020 SHEDMARKET.com<p>
                <br />
    </footer>
    <script src="../js/nav.js">
    </script>
</body>

</html>
