<?php
function getSellers() {

    $db = connectDb();

    $sql = 'SELECT companyName FROM seller ORDER BY companyName ASC';

    $stmt = $db->prepare($sql);

    $stmt->execute();

    $sellers = $stmt->fetchAll();

    $stmt->closeCursor();

    return $sellers;


}