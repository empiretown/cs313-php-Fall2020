<?php

//include connect-db.php
require ("connect-db.php");
$db = get_db;

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
        <?php 
            // Display Error message
            if(!empty($error_message)){
            ?>
            <div class="alert alert-danger">
              <strong>Error!</strong> <?= $error_message ?>
            </div>

            <?php
            }
            ?>

            <?php 
            // Display Success message
            if(!empty($success_message)){
            ?>
            <div class="alert alert-success">
              <strong>Success!</strong> <?= $success_message ?>
            </div>

            <?php
            }
            ?>

        <p>Please fill this form to create an account.</p>
        <form id="mainForm" action="" method="POST">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Firstname</label>
                <input type="text" name="firstname" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Lastname</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            
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
                <label>Address</label>
                <input type="password" name="addr" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>City</label>
                <input type="text" name="city" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" name="btnsignup" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>

            <?php
                $error_message = "";

                // Register user
                if(isset($_POST['btnsignup'])){
                   $first_name = trim($_POST['first_name']);
                   $last_name = trim($_POST['last_name']);
                   $username = trim($_POST['username']);
                   $password = trim($_POST['password']);
                   $Address= trim($_POST['Address']);
                   $city = trim($_POST['city'])

                
                   //$isValid = true;
                
                   // Check fields are empty or not
                   if($fname == '' || $lname == '' || $email == '' || $password == '' || $confirmpassword == ''){
                     $isValid = false;
                     $error_message = "Please fill all fields.";
                   }
                
                //    // Check if confirm password matching or not
                //    if($isValid && ($password != $confirmpassword) ){
                //      $isValid = false;
                //      $error_message = "Confirm password not matching";
                //    }
                
                   // Check if Email-ID is valid or not
                   
                //    if($isValid){
                
                //      // Check if Email-ID already exists
                //      $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
                //      $stmt->bind_param("s", $email);
                //      $stmt->execute();
                //      $result = $stmt->get_result();
                //      $stmt->close();
                //      if($result->num_rows > 0){
                //        $isValid = false;
                //        $error_message = "Email-ID is already existed.";
                //      }
                
                //    }
                
                   // Insert records
                   if($isValid){
                     $stmt = "INSERT INTO users(first_name,last_name,username,password,Address, city) values(?,?,?,?)";
                     $stmt = $db->prepare($stmt);
                     $stmt->bind_param("ssss",$first_name,$last_name,$username,$password, $Address, $city);
                     $stmt->execute();
                     $stmt->close();
                
                     $success_message = "Account created successfully.";
                   }
                }
            ?>
            
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>
</html>