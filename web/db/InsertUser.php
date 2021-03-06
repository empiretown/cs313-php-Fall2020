

<?php 
require ("connect-db.php");
$error_message = "";$success_message = "";

// Register user
if(isset($_POST['btnsignup'])){
   $fname = trim($_POST['fname']);
   $lname = trim($_POST['lname']);
   $password = trim($_POST['password']);
   $confirmpassword = trim($_POST['confirmpassword']);

   $isValid = true;

   // Check fields are empty or not
   if($fname == '' || $lname == '' || $email == '' || $password == '' || $confirmpassword == ''){
     $isValid = false;
     $error_message = "Please fill all fields.";
   }

   // Check if confirm password matching or not
   if($isValid && ($password != $confirmpassword) ){
     $isValid = false;
     $error_message = "Confirm password not matching";
   }

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
     $insertSQL = "INSERT INTO user1(first_name,last_name,user,password ) values(?,?,?,?)";
     $stmt = $con->prepare($insertSQL);
     $stmt->bind_param("ssss",$fname,$lname,$email,$password);
     $stmt->execute();
     $stmt->close();

     $success_message = "Account created successfully.";
   }
}
?>
