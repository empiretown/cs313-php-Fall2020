<?php
require_once '../connectDb.php';

$addProduct = filter_input($_POST["newProduct"], FILTER_SANITZE_STRING);
$addDesc = filter_input($_POST["desc"], FILTER_SANITZE_STRING);
$addPrice = filter_input($_POST["newprice"], FILTER_SANITZE_STRING);
$addStock = filter_input($_POST["numStock"], FILTER_SANITZE_STRING);
$addSize = filter_input($_POST["newSize"], FILTER_SANITZE_STRING);
$addweight = filter_input($_POST["numWeight"], FILTER_SANITZE_STRING);
$addLocation = filter_input($_POST["numLocation"], FILTER_SANITZE_STRING);
$addvendor= filter_input($_POST["vendor"], FILTER_SANITZE_STRING);

try {
    $db = connectDb();
    $sql = 'INSERT INTO category (invName, invDescription, invPrice, invStock, invVendor) VALUES ( :inv_name, :inv_description, :inv_price, :inv_stock, :inv_vendor)';
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':inv_name', $addProduct);
    $stmt->bindValue(':inv_description', $addDesc);
    $stmt->bindValue(':inv_price', $addPrice);
    $stmt->bindValue(':inv_stock', $addstock);
    $stmt->bindValue(':inv_vendor', $addVendor);
    $stmt->execute();
    $stmt->closeCursor();
  



}
catch (Exception $ex) {
    echo "Error with DB. Details: $ex";
    die();
}
header("Location: ../view/home.php");
exit;