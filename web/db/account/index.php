<?php
session_start();

require_once '../connectDb.php';
require_once '../functions.php';

 
 require_once '../model/account.php';
 require_once '../model/product-model.php';
 //require_once '../model/account.php';


 $action = filter_input(INPUT_POST, 'action');
 if ($action == NULL) {
     $action = filter_input(INPUT_GET, 'action');
 }
 
 switch ($action) {
   case 'registration':
   echo ("here");
   include '../view/login.php';
   break;
    // case 'login':
    //     header("Location: ../view/login.php");
    //     break;
    
    //   case 'register':
    //     header("Location: ../view/registration.php");
    //     break;
    
    //   case 'registration':
    
    //     $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
    //     $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        
    //     $checkPassword = checkPassword($clientPassword);
    
    //     if (empty($clientEmail) || empty($checkPassword)) {
    //       $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
    //       header("Location: ../view/registration.php");
    //       exit;
    //     }
    
    //     $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
    
    //     $regOutcome = registerClient($clientEmail, $hashedPassword);
    
    //     if($regOutcome === 1){
    //       setcookie('firstname', $clientEmail, strtotime('+1 year'), '/');
    //       $_SESSION['message'] = "<p>Thanks for registering, $clientFullname. Please use your email and password to login.</p>";
    //       header("Location: ../view/login.php");
    //       exit;
    //      } else {
    //       $_SESSION['message'] = "<p>Sorry $clientFulltname, but the registration failed. Please try again.</p>";
    //       header("Location: ../view/registration.php");
    //       exit;
    //      }
    
    //     break;
    
    //   case 'Logging':
    
    //     $loginUsername = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
    //     $loginPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
    
    //     $checkLoginPassword = checkPassword($loginPassword);
    
    //     if (empty($loginUsername) || empty($checkLoginPassword)) {
    //       $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
    //       header("Location: ../view/registration.php");
    //       exit;
    //     }
    
    //     //Get client data based on email email
    //     $clientData = getClient($loginUsername);
    
    //     if($checkLoginPassword) {
    //       $hashCheck = password_verify($loginPassword, $clientData['password']);
    //     }
    //     if(!$hashCheck) {
    //       $_SESSION['message'] = '<p>Incorrect password. Please check your password and try again.</p>';
    //       header("Location: ../view/login.php");
    //       exit;
    //     }
    
    //     if(isset($_COOKIE['email'])) {
    //       setcookie('email', "", time() -3600, '/');
    //     }
    
    //     setcookie('email', $clientData['email'], strtotime('+1 year'), '/');
    
    //     $_SESSION['loggedin'] = TRUE;
    
    //     //Remove password data from clientData
    //     array_pop($clientData);
    
    //     $_SESSION['clientData'] = $clientData;
    
    //     header("Location: ../view/home.php");
      
    //     break;

    //     case 'logout':
    //         session_destroy();
    //         setcookie('email', "", time() -3600, '/');
    //         header("Location: ../view/category.php");
    //         break;
        
    //       default:
        
    //         header("Location: ../view/home.php");
    //         break;
    }
?>