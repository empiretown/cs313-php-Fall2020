<?php
function registerClient() {

    $clientEmail = $this->clientEmail($_POST['clientEmail']);
    if ($clientEmail) {
        $response = array(
            "status" => "error",
            "message" => "Email already exists"
        );
    } else {
        if (!empty($_POST["registration"]))
        {
            $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
        }
    }
    //Database Connection
    $db = connectDb();

    //SQL statement
    $sql = 'INSERT INTO usersta (email, password)
    VALUES (:clientEmail, :clientPassword)';

    //Prepare Statement
    $stmt = $db->prepare($sql);

    //Replace placeholders with variables
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);

    //Execute statement
    $stmt->execute();

    //Verify results
    $rowsChanged = $stmt->rowCount();

    //Close connection
    $stmt->closeCursor();

    //Return rows changed
    return $rowsChanged;
}

function emailConfirmation($clientEmail) {  
    $db = connectDb(); 
    $sql = 'SELECT email FROM users WHERE email = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if(empty($matchEmail)){
     return 0;
    } else {
     return 1;
    }
   }

   function getClient($clientEmail){
    $db = connectDb();
    $sql = 'SELECT id, email, password FROM customer WHERE email = :clientEmail';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientEmail', $clientUsername, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
   }
?>

//require ('../connect-db.php');
// function updatePassword($clientPassword, $clientId) {
//     $db = connectDb();


//     $sql = 'UPDATE customer
//               SET password = :clientPassword
//               WHERE id = :clientId';
//     $stmt = $db->prepare($sql);
//     $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
//     $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

//     $stmt->execute();
//     $rowsChanged = $stmt->rowCount();

//     $stmt->closeCursor();

//     return rowChanged();

// }

// function updateClient($clientFullname, $userName, $email, $id) {
//     $db = connectDb();


//     $sql = 'UPDATE customer
//               SET customerName = :clientFullname,
//               email = :clientEmail,
//               userName = :clientUsername
//               WHERE id = :clientId';
//     $stmt = $db->prepare($sql);
//     $stmt->bindValue(':clientFullname', $clientFirstname, PDO::PARAM_STR);
//     $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_INT);
//     $stmt->bindValue(':clientUsername', $clientLastname, PDO::PARAM_INT);
//     $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

//     $stmt->execute();
//     $rowsChanged = $stmt->rowCount();

//     $stmt->closeCursor();

//     return rowsChanged();

// }

// function getClientInfo($clientid) {
//     $db = connectDb();


//     $sql = 'SELECT * FROM customer WHERE id = :clientId';
//     $stmt = $db->prepare($sql);
//     $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    

//     $stmt->execute();
//     $clientInfo = $stmt->fetch(PDO::FETCH_NAMED);

//     $stmt->closeCursor();

//     return $clientInfo;

// }


// function regVisitor($clientEmail, $clientPassword) {
//     $db = connectDb();

//    $sql = 'INSERT INTO customer (email, password)
//               VALUES (:clientEmail, :clientPassword)';
//     $stmt = $db->prepare($sql);
//     $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    
//     $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
   
    

//     $stmt->execute();
//     $rowsChanged = $stmt->rowCount();

//     $stmt->closeCursor();

//     return rowsChanged();

// }

// // function passwordCheck($clientPassword) {
// //     $db = connectDb();


// //     $sql = 'SELECT password FROM customer WHERE password = :clientPassword';
// //     $stmt = $db->prepare($sql);
// //     $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
    

// //     $$stmt->execute();
// //     $rowsChanged = $stmt->rowCount();

// //     $stmt->closeCursor();

// //     return rowChanged();


// // }

// function checkExistingEmail($clientEmail) {
//     $db = connectDb();


//     $sql = 'SELECT email FROM customer WHERE email = :email';
//     $stmt = $db->prepare($sql);
//     $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
    

//     $stmt->execute();
//     $matchEmail = $stmt->fetch(PDO::FETCH_NUM);

//     $stmt->closeCursor();

//    if(empty($matchEmail)) {
//        return 0;
//    } else {
//        return 1;
//    }

// }

// function getClient($clientEmail) {
//     $db = connectDb();


//     $sql = 'SELECT id,email, username, password  FROM customer WHERE email = :clientEmail';
//     $stmt = $db->prepare($sql);
//     $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    

//     $stmt->execute();
//     $clientData = $stmt->fetch(PDO::FETCH_ASSOC);

//     $stmt->closeCursor();

//     return $clientData;

// }

