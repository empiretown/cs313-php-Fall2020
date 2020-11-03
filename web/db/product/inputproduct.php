<?php
require_once '../connectDb.php';

require_once '../account/index.php';
//require_once '../model/product.php';


$addProduct = filter_input($_POST["newProduct"],);
$addDesc = filter_input($_POST["desc"]);
$addPrice = filter_input($_POST["newprice"], NITZE_STRING);
$addStock = filter_input($_POST["numStock"], NITZE_STRING);
$addSize = filter_input($_POST["newSize"], NITZE_STRING);
$addweight = filter_input($_POST["numWeight"], NITZE_STRING);
$addLocation = filter_input($_POST["numLocation"], NITZE_STRING);
$addvendor= filter_input($_POST["vendor"], NITZE_STRING);

try {
    $db = connectDb();
    $sql = 'INSERT INTO category (invName, invDescription, invPrice, invStock, invVendor) VALUES ( :inv_name, :inv_description, :inv_price, :inv_stock, :inv_vendor)';
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':inv_name', $addProduct, );
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