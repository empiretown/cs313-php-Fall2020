<?php

function getThumbImages($prodId) {
    $db = connectDb();
    $sql = 'SELECT imgId, imgPath, imgName, img.invId, invName FROM images JOIN inventory ON images.invId = inventory.invId WHERE images.invId = :prodType AND imgPath LIKE "%-tn%" ';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':prodType', $prodId, PDO::PARAM_STR);

    $stmt->execute();
    $subitems =$stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $subitems;

}

function getProductsById($prodId) {
    $db = connectDb();
    $sql = 'SELECT * FROM product WHERE id = :prodId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':prodId', $prodId, PDO::PARAM_STR);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::PARAM_ASSOC);
    $stmt->closeCursor();
    return $products;
}

function getProductByCategory($type) {
    $db = connectDb();
    $sql = 'SELECT * FROM product WHERE seller_id IN(SELECT id FROM seller Where companyName = :catType)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':product', $product_item, PDO::PARAM_STR);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::PARAM_ASSOC);
    $stmt->closeCursor();
    return $products;
}

function deleteProduct($prodId) {
    $db = connectDb();
    $sql = 'DELETE FROM inventory where invId = :prodId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':prodId', $prodId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}



function productUpdate($catType, $prodName, $prodDesc, $prodImg, $prodPrice, $prodStock, $prodVendor, $prodId) {
    $db = connectDb();
    $sql = 'UPDATE inventory SET invName invName = :prodName, invDescription = :prodDesc, invImage = :prodImg, invPrice = :prodPrice, invStock = :prodStock, categoryId = :catType, invVendor = :prodVendor WHERE invId = :prodId';
    $stmt = $db->prepare($sql);
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
    $db = connectDb();
    $sql = 'SELECT * FROM product WHERE id = :prodId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':prodId', $prodId, PDO::PARAM_INT);
    $stmt->execute();
    $prodInfo = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $prodInfo;
}

function getProductBasics() {
    $db = connectDb();
    $sql = 'SELECT productName, id FROM product ORDER BY productName ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_NAMED);
    $stmt->closeCursor();
    return $prodInfo;
}

function regProducts($invName, $invDescription, $invImage, $invPrice, $invStock, $categoryId, $invVendor) {
    $db = get_db();
    $sql = 'INSERT INTO inventory  (invName, invDescription, invImage, invPrice, invStock, categoryId, invVendor)
              VALUES (:invName, :invDescription, :invImage, :invPrice, :invStock, :categoryId, :invVendor)';
    $stmt = $db->prepare($sql);
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
    $db = connectDb();
    $sql = 'INSERT INTO categories (categoryName)
              VALUES (:categoryName)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged =$stmt->rowCount();

    $stmt->closeCursor();
    return $rowsChanged;
}
