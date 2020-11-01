<?php
session_start();

require ('../connect-db.php');
require_once '../functions.php';

 
 require_once '../model/account.php';
 require_once '../model/account.php';
 require_once '../model/account.php';


 $action = filter_input(INPUT_POST, 'action');
 if ($action == NULL) {
     $action = filter_input(INPUT_GET, 'action');
 }
 
 switch ($action) {
     case 'login':
        header("location: ../view/admin.php");
     break;

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
         $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
         $email = filter_input(INPUT_POST, 'email');
         $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);        
         $phonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_STRING);
         $checkEmail = checkEmail($email);
         $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
         $checkPassword = checkPassword($password);
 
         $CheckExistingEmail = checkEmail($email);
 
         // Check for existing email address in the table
         if ($CheckExistingEmail) {
             $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
             include '../view/login.php';
             exit;
         }
 
         // Check for missing data
         if (empty($fullname) || empty($username) || empty($checkEmail) || empty($checkPassword)) {
             $message = '<p>Please provide information for all empty form fields.</p>';
             include '../view/registration.php';
             exit;
         }
 
         // Hash the checked password
         $password = password_hash($password, PASSWORD_DEFAULT);
 
         // Send the data to the model
         $regOutcome = regVisitor($fullname, $email, $username, $password, $phonenumber);
         // Check and report the result --- COOKIES ----
         if ($regOutcome === 1) {
             setcookie('firstname', $firstname, strtotime('+1 year'), '/');
             $message = "<p>Thanks for registering $firstname. Please use your email and password to login.</p>";
             include 'view/login.php';
             exit;
         }
         break;
 
     
 
     case 'logout':
         session_destroy();
         header('Location: ../index.php');
         exit;
}
?>