<?php>

//include connect-db.php
require_once "connect-db.php";
$db = get_db;

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($dbHost["REQUEST_METHOD"] == "POST") {
    If(empty(trim($_POST["Username"]))) {
        $username_err = "Please enter a username.";
    } else {
       $pgsql = "SELECT id FROM seller WHERE username = :username";

       if ($stmt = $pdo->prepare($pgsql)) {
          $stmt-> bindParam(":username", $param_username, PDO::PARAM_STR);

          $param_username = trim($_POST["username"]);

          If($stmt->execute()) {}
          if($stmt->rowCount() == 1) {
            $username_err = "This username is already taken.";
          } else {
            $username = trim($_POST["username"]);

          } else {
            echo "Oops! Something went wrong. Try again later.";
          }
           unset($stmt);
       }
    }

}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($dbHost["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>
</html>