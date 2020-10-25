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
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($dbHost["PHP_SELF"]); ?>" method="post">
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
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <?php
            try
            {
                // Notice that we do not use "SELECT *" here. It is best practice
                // to only bring back the fields that you need.
            
                // prepare the statement
                $statement = $db->prepare('SELECT id, first_name, last_name,username, password, address, city FROM user1');
                $statement->execute();
            
                // Go through each result
                while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                {
                    $id = $row['id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $username = $row['last_name'];
                    $password = $row['password'];
                    $address = $row['address'];
                    $city = $row['city'];

            
                    // Notice that we want the value of the checkbox to be the id of the label
                    echo "<input type='text' name='chkUser[]' id='chkUser$id' value='$id'>";
            
                    // Also, so they can click on the label, and have it select the checkbox,
                    // we need to use a label tag, and have it point to the id of the input element.
                    // The trick here is that we need a unique id for each one. In this case,
                    // we use "chkTopics" followed by the id, so that it becomes something like
                    // "chkTopics1" and "chkTopics2", etc.
                    echo "<label for='chkUser$id'>$first_name</label><br />";
                    echo "<label for='chkUser$id'>$last_name</label><br />";
                    echo "<label for='chkUser$id'>$username</label><br />";
                    echo "<label for='chkUser$id'>$password</label><br />";
                    echo "<label for='chkUser$id'>$address</label><br />";
                    echo "<label for='chkUser$id'>$city</label><br />";
            
                    // put a newline out there just to make our "view source" experience better
                    echo "\n";
                }
            
            }
            catch (PDOException $ex)
            {
                // Please be aware that you don't want to output the Exception message in
                // a production environment
                echo "Error connecting to DB. Details: $ex";
                die();
            }
            
            ?>
            
                <br />
            
                
            
            </form>
            
            
            </div>
            
            </body>
            </html>
            
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>
</html>