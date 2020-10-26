<?php
function getSellers() {

    $db = get_db();

    $query = 'SELECT companyName FROM seller ORDER BY companyName ASC';

    $stmt = $db->prepare($query);

    $stmt->execute();

    $sellers = $stmt->fetchAll();

    $stmt->closeCursor();

    return $sellers;


}