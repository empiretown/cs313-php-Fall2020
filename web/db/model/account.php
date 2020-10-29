<?php
require ('../connect-db.php');
function updatePassword($clientPassword, $clientId) {
    $db = get_db();

    $query = 'UPDATE customer
              SET password = :clientPassword
              WHERE id = :clientId';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

    $stmt->execute();
    $rowsChanged = $stmt->rowCount();

    $stmt->closeCursor();

    return rowChanged();

}

function updateClient($clientFullname, $userName, $email, $id) {
    $db = get_db();

    $query = 'UPDATE customer
              SET customerName = :clientFullname,
              email = :clientEmail,
              userName = :clientUsername
              WHERE id = :clientId';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':clientFullname', $clientFirstname, PDO::PARAM_STR);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_INT);
    $stmt->bindValue(':clientUsername', $clientLastname, PDO::PARAM_INT);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

    $stmt->execute();
    $rowsChanged = $stmt->rowCount();

    $stmt->closeCursor();

    return rowsChanged();

}

function getClientInfo($clientid) {
    $db = get_db();

    $query = 'SELECT * FROM customer WHERE id = :clientId';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    

    $stmt->execute();
    $clientInfo = $stmt->fetch(PDO::FETCH_NAMED);

    $stmt->closeCursor();

    return $clientInfo;

}


function regVisitor($fullname, $email, $username, $password, $phonenumber) {
    $db = get_db();

    $query = 'INSERT INTO (customerName, email, userName, password)
              VALUES (:fullname, :email, :username, :password)';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':fullname', $fullname, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    

    $stmt->execute();
    $rowsChanged = $stmt->rowCount();

    $stmt->closeCursor();

    return rowsChanged();

}

function checkExistingEmail($email) {
    $db = get_db();

    $query = 'SELECT email FROM customer WHERE email = :email';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    

    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);

    $stmt->closeCursor();

   if(empty($matchEmail)) {
       return 0;
   } else {
       return 1;
   }

}

function getClient($email) {
    $db = get_db();

    $query = 'SELECT id, customerName, email, userName, phonenumber clientLevel, password  FROM customer WHERE email = :email';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    

    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt->closeCursor();

    return $clientData;

}

