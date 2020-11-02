<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<?php
require_once '../connect-db.php';
require_once '../functions.php';

 
 require_once '../model/account.php';
 require_once '../model/product-model.php';
 require_once '../model/product.php';


 $action = filter_input(INPUT_POST, 'action');
 if ($action == NULL) {
     $action = filter_input(INPUT_GET, 'action');
 }
 
 switch ($action) {
    

     case 'register':
        header("location: ../view/registration.php");
     break;
     
 
     case 'updateClient':
         $clientFullname = filter_input(INPUT_POST, 'clientFullname', FILTER_SANITIZE_STRING);
         $email = filter_input(INPUT_POST, 'email');        
         $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
         $checkEmail = checkEmail($clientEmail);
 
         $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
 
 
         if (empty($clientFullname) || empty($userName) || empty($email)) {
             $message = '<p>Please complete all information for the updated the contact information.</p>';
             include '../view/client-update.php';
             exit;
         }
         $updateResult = updateClient($clientFullname, $userName, $clientEmail, $id);
 var_dump($updateResult);
 
         if ($updateResult === 1) {
             $clientData = getClientInfo($clientId);
             $_SESSION['loggedin'] = TRUE;
 // Remove the password from the array
 // the array_pop function removes the last
 // element from an array
             array_pop($clientData);
 // Store the array into the session
             $_SESSION['clientData'] = $clientData;
             $message = "<p>Congratulations, $clientFirstname  was successfully updated.</p>";
             $_SESSION['message'] = $message;
 // Send them to the admin view
             include '../view/admin.php';
             exit;
         } else {
             $message = "<p>Error. The client was not modify.</p>";
             include '../view/client-update.php';
             exit;
         }
         break;
 
     case 'mod':
         $clientId = $_SESSION['clientData']['id'];
         $clientInfo = getClientInfo($clientId);
         if (count($clientInfo) < 1) {
             $message = 'Sorry, your information could be found.';
         }
         include '../view/client-update.php';
         exit;
         break;
 
     case 'registration':
         
         $clientEmail = filter_input(INPUT_POST, 'clientEmail');
         
       
         $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
         $checkPassword = checkPassword($clientPassword);
 
         $CheckExistingEmail = checkEmail($clientEmail);
 
         // Check for existing email address in the table
         if ($CheckExistingEmail) {
             $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
             include '../view/login.php';
             exit;
         }
 
         // Check for missing data
         if (empty($clientEmail) || empty($clientPassword)) {
             $message = "<p>Please provide information for all empty form fields.</p>";
             include '../view/registration.php';
             exit;
         }
 
         // Hash the checked password
         $password = password_hash($password, PASSWORD_DEFAULT);
 
         //Send the data to the model
         $regOutcome = regVisitor($clientEmail, $password);
         // Check and report the result --- COOKIES ----
         if ($regOutcome === 1) {
             setcookie('clientEmail', $clientEmail, strtotime('+1 year'), '/');
             echo("Thanks for registering $clientEmail. Please use your email and password to login.");
             include '../view/login.php';
             exit;
         } else {
             $message = "<p>Sorry $ClientFullname, but the registration failed. Please try again.</p>";
             include '../view/registration.php';
             exit;
         }
         break;
 
         case 'logging':

            $loginEmail = filter_input(INPUT_POST,'loginEmail', FILTER_SANITIZE_EMAIL);
            $loginEmail = checkEmail($loginEmail);
            $loginPassword = filter_input(INPUT_POST, 'loginPassword', FILTER_SANITIZE_STRING);
            $passwordCheck = checkPassword($loginPassword);
            

            $_SESSION['loggedin'] = True;

            if(empty($loginEmail)|| empty($passwordCheck)) {
                $_SESSION['message'] = 'Please provide information for all empty form fields.';
                include '../view/category.php';
                exit;
            }


            $clientData = getClient($loginEmail);

            //$hashCheck = password_verify($password, $clientData['password']);

            if ($passwordCheck) {
                    $hashCheck = password_verify($loginPassword, $clientData['password']);
            
            }

            if(!$hashCheck){
                $message = '<p>Incorrect password.</p>';
                include '../view/login.php';
            }

            if (isset($_COOKIE['email'])) {
                setcookie('email', "", time() -3600, '/');
            }

            setcookie('email', $clientData['email'], strtotime('+1 year'), '/');

            
            

            array_pop($clientData);
            
            


//          $email = filter_input(INPUT_POST, 'email');
//          $email = checkEmail($email);
//          $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
//          $passwordCheck = checkPassword($password);
 
//  // Run basic checks, return if errors
//          if (empty($email) || empty($passwordCheck)) {
//              $message = '<p class="notice">Please provide a valid email address and password.</p>';
//              include '../view/login.php';
//              exit;
//          }
 
//  // A valid password exists, proceed with the login process
//  // Query the client data based on the email address
//          $clientData = getClient($email);
//  // Compare the password just submitted against
//  // the hashed password for the matching client
//          $hashCheck = password_verify($password, $clientData['password']);
         
//  // If the hashes don't match create an error
//  // and return to the login view
//          
//  //A valid user exists, log them in
//          $_SESSION['loggedin'] = TRUE;
//  // Remove the password from the array
//  // the array_pop function removes the last
//  // element from an array
//          array_pop($clientData);
//  // Store the array into the session
//          $_SESSION['clientData'] = $clientData;
         
//  // Send them to the admin view
//          include '../view/admin.php';
//          exit;
         break;
 
     case 'logout':
         session_destroy();
         header('Location: ../index.php');
         exit;
}
?>