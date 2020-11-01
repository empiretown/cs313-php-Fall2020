<?php

function getThumbImages($prodId) {
    $db = get_db();
    $query = 'SELECT imgId, imgPath, imgName, img.invId, invName FROM images JOIN inventory ON images.invId = inventory.invId WHERE images.invId = :prodType AND imgPath LIKE "%-tn%" ';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':prodType', $prodId, PDO::PARAM_STR);

    $stmt->execute();
    $subitems =$stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $subitems;

}

function getProductsById($prodId) {
    $db = get_db();
    $query = 'SELECT * FROM product WHERE id = :prodId';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':prodId', $prodId, PDO::PARAM_STR);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::PARAM_ASSOC);
    $stmt->closeCursor();
    return $products;
}

function getProductByCategory($type) {
    $db = get_db();
    $sql = 'SELECT * FROM product WHERE product_item = :product_item';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':product_item', $product_item, PDO::PARAM_STR);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::PARAM_ASSOC);
    $stmt->closeCursor();
    return $products;
}

function deleteProduct($prodId) {
    $db = get_db();
    $query = 'DELETE FROM inventory where invId = :prodId';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':prodId', $prodId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}



function productUpdate($catType, $prodName, $prodDesc, $prodImg, $prodPrice, $prodStock, $prodVendor, $prodId) {
    $db = get_db();
    $query = 'UPDATE inventory SET invName invName = :prodName, invDescription = :prodDesc, invImage = :prodImg, invPrice = :prodPrice, invStock = :prodStock, categoryId = :catType, invVendor = :prodVendor WHERE invId = :prodId';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':catType', $type, PDO::PARAM_STR);
    $stmt->bindValue(':prodName', $prodName, PDO::PARAM_STR);
    $stmt->bindValue(':prodDesc', $prodDesc, PDO::PARAM_STR);
    $stmt->bindValue(':prodImg', $prodImg, PDO::PARAM_INT);
    $stmt->bindValue(':prodPrice', $prodPrice, PDO::PARAM_STR);
    $stmt->bindValue(':prodStock', $prodStock, PDO::PARAM_INT);
    $stmt->bindValue(':prodVendor', $prodVendor, PDO::PARAM_INT);
    $stmt->bindValue(':prodId', $prodId, PDO::PARAM_STR);

    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;


}

function getProductInfo($prodId) {
    $db = get_db();
    $query = 'SELECT * FROM product WHERE id = :prodId';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':prodId', $prodId, PDO::PARAM_INT);
    $stmt->execute();
    $prodInfo = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $prodInfo;
}

function getProductBasics() {
    $db = get_db();
    $query = 'SELECT productName, id FROM product ORDER BY productName ASC';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $prodInfo;
}

function regProducts($invName, $invDescription, $invImage, $invPrice, $invStock, $categoryId, $invVendor) {
    $db = get_db();
    $query = 'INSERT INTO inventory  (invName, invDescription, invImage, invPrice, invStock, categoryId, invVendor)
              VALUES (:invName, :invDescription, :invImage, :invPrice, :invStock, :categoryId, :invVendor)';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
    $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
    $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
    $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
    $stmt->bindValue(':InvStock', $invStock, PDO::PARAM_STR);
    $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_STR);
    $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);

    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;

}

function regCategories($categoryName) {
    $db = get_db();
    $query = 'INSERT INTO categories (categoryName)
              VALUES (:categoryName)';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged =$stmt->rowCount();

    $stmt->closeCursor();
    return $rowsChanged;
}
