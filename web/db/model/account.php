<?php
//require ('../connect-db.php');
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


function regVisitor($clientEmail, $clientPassword) {
    $db = get_db();

   $sql = 'INSERT INTO customer (email, password)
              VALUES (:clientEmail, :clientPassword)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    
    $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
   
    

    $stmt->execute();
    $rowsChanged = $stmt->rowCount();

    $stmt->closeCursor();

    return rowsChanged();

}

function passwordCheck($clientPassword) {
    $db = get_db();

    $query = 'SELECT password FROM customer WHERE password = :clientPassword';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
    

    $$stmt->execute();
    $rowsChanged = $stmt->rowCount();

    $stmt->closeCursor();

    return rowChanged();


}

function checkExistingEmail($clientEmail) {
    $db = get_db();

    $sql = 'SELECT email FROM customer WHERE email = :clientEmail';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    

    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);

    $stmt->closeCursor();

   if(empty($matchEmail)) {
       return 0;
   } else {
       return 1;
   }

}

function getClient($clientEmail) {
    $db = get_db();

    $sql = 'SELECT id,email, username, password  FROM customer WHERE email = :clientEmail';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientEmail', $email, PDO::PARAM_STR);
    

    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt->closeCursor();

    return $clientData;

}

