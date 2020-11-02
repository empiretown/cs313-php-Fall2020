<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<?php
require ('../connectDb.php');
require_once '../functions.php';

 
 require_once '../model/account.php';
 require_once '../model/product-model.php';
 //require_once '../model/account.php';


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
         
         $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
         
       
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
             setcookie('firstname', $fullname, strtotime('+1 year'), '/');
             echo("Thanks for registering $email. Please use your email and password to login.");
             include '../view/login.php';
             exit;
         } else {
             $message = "<p>Sorry $ClientFullname, but the registration failed. Please try again.</p>";
             include '../view/registration.php';
             exit;
         }
         break;
 
         case 'logging':

            $loginEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
            $loginPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        
            $checkLoginPassword = checkPassword($loginPassword);
        
            if (empty($loginEmail) || empty($checkLoginPassword)) {
              $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
              header("Location: /week7ta/registration.php");
              exit;
            }
        
            //Get client data based on email email
            $clientData = getClient($loginEmail);
        
            if($checkLoginPassword) {
              $hashCheck = password_verify($loginPassword, $clientData['password']);
            }
            if(!$hashCheck) {
              $_SESSION['message'] = '<p>Incorrect password. Please check your password and try again.</p>';
              header("Location: ../view/login.php");
              exit;
            }
        
            if(isset($_COOKIE['username'])) {
              setcookie('username', "", time() -3600, '/');
            }
        
            setcookie('username', $clientData['username'], strtotime('+1 year'), '/');
        
            $_SESSION['loggedin'] = TRUE;
        
            //Remove password data from clientData
            array_pop($clientData);
        
            $_SESSION['clientData'] = $clientData;
        
            header("Location: /view/admin.php");
          
            break;

         break;
 
     case 'logout':
         session_destroy();
         header('Location: ../index.php');
         exit;
}
?>