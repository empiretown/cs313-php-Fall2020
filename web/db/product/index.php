<?php

session_start();

require ('../connectDb.php');
//require_once '../model/product.php';

require_once '../model/account.php';
require_once '../model/product-model.php';
require_once '../functions.php';

$seller = getSellers();

$navlist .= '<li><a href="../db/product/index.php?action=category&type=' . $seller["companyName"] . '" title=View our ' . $seller["companyName"] . 'product line>' . $seller["companyName"] . '</a></li>';

$action = filter_input(INPUT_POST, 'action');

if($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL) {
        $action = 'prod-mgmt';
        header('location: ../db/product/index.php?action=prod-mgmt');
        exit;
    }
}

switch ($action) {

   

    case 'detailProduct':
        $prodId = filter_input(INPUT_GET, 'prodId', FILTER_VALIDATE_INT);
        $item = getProductsById($prodId);
        if (!count($item)) {
            $message = "<p class='notice'>Sorry, no $item products ccould be found.</p>";
        } else {
            $prodDisplay = productInformation($item);
        }   
        include '../view/productdetail.php';
    exit;
    break;  
    
    case 'category':
             $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
             $product = getProductByCategory($type);
              if(!count($product)) {
                $message = "<p class='error'>Sorry, no $item products could be found.</p>";
            } else {
                $prodDisplay = buildImageDisplay($product);
            }
            include '../view/category.php';
        break;
        
        case 'deleteProduct':
            $prodName = filter_input(INPUT_POST, 'prodName', FILTER_SANITIZE_STRING);
            $prodId = filter_input(INPUT_POST, 'prodId', FILTER_SANITIZE_STRING);
        
            $deleteResult = deleteProduct($prodId);
        
            if ($deleteResult) {
                $message = "<p>Congratulations, $prodName was deleted sucessfully.</p>";
                $_SESSION['message'] = $message;
                //header('location: /acme/product/');
                exit;
            }
        break;
        
        case 'del':
            $prodId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $prodInfo = getProductInfo($prodId);
            if(count($prodInfo) < 1) {
                $message = 'Sorry, no product information is available.';
            }
            include '../view/delete-prod.php';
            exit;
        break;

        case 'prodUpdate':
                $catType = filter_input(INPUT_POST, 'categoryType', FILTER_SANITIZE_NUMBER_INT);
                $prodName = filter_input(INPUT_POST, 'prodName', FILTER_SANITIZE_NUMBER_INT);
                $prodDesc = filter_input(INPUT_POST, 'prodDesc', FILTER_SANITIZE_NUMBER_INT);
                $prodImg = filter_input(INPUT_POST, 'prodImg', FILTER_SANITIZE_NUMBER_INT);
                $prodPrice= filter_input(INPUT_POST, 'prodPrice', FILTER_SANITIZE_NUMBER_INT);
                $prodStock = filter_input(INPUT_POST, 'prodStock', FILTER_SANITIZE_NUMBER_INT);
                $prodVendor = filter_input(INPUT_POST, 'prodVendor', FILTER_SANITIZE_NUMBER_INT);
                $prodId = filter_input(INPUT_POST, 'prodId', FILTER_SANITIZE_NUMBER_INT);
            
                if(empty($catType) || empty($prodName) || empty($prodDesc) || empty($prodImg) || empty($prodPrice) || empty($prodStock) || empty($prodVendor) || empty($prodId)) {
                    $message = '<p> Please complete all the information for the updated item! check the category of the item.</p>';
                    include '../view/update-prod.php';
                    exit;
                }
            
                $updateResult = productUpdate($catType, $prodName, $prodDesc, $prodImg, $prodPrice, $prodStock, $prodVendor, $prodId);
            
                if(updateResult) {
                    $message = "<p>Congratulations, $prodName has been successfully updated.</p>";
                    $_SESSION['message'] = $message;
                    //header ('location: //product/');
                    exit;
                }else {
                    $message = "<p>Error. The new product was not modified.</p>";
                    include '../view/updateproduct.php';
                    exit;
                }
            break;

            case 'mod':
                    $prodId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
                    $prodInfo = getProductInfo($prodId);
                    if(count(prodInfo) < 1) {
                        $message = 'Sorry, no product information can be found.';
                    }
                    $catType = $prodInfo["CategoryID"];
                    include '../view/updateproduct.php';
                    exit;
                break;

                case 'prod-mgmt':
                        $products = getProductBasics();
                    
                        if (count($products) > 0) {
                            $prodList = '<table>';
                            $prodList .= '<thead>';
                            $prodList .= '<tr><th>Product Name</th><td>&nbsp;</td><td>&nbsp;</td></tr>';
                            $prodList .= '</thead>';
                            $prodList .= '<tbody>';
                            foreach ($products as $product) {
                                $prodList .= "<tr><td>$product[invName]</td>";
                                $prodList .= "<td><a href='/acme/products?action=mod&id=$product[invId]' title='Click to modify'>Modify</a></td>";
                                $prodList .= "<td><a href='/acme/products?action=del&id=$product[invId]' title='Click to delete'>Delete</a></td></tr>";
                            }
                            $prodList .= '</tbody></table>';
                        } else {
                            $message = '<p class="notify">Sorry, no products were returned.</p>';
                        }
                    
                        include '../view/prod-mgmt.php';
                        break;

                case 'newProductForm':

                        include '../view/new-prod.php';
                        break;
                
                    case 'newProduct':
                // get data from (inventory table) form
                        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
                        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
                        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
                        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT);
                        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
                        $categoryId = filter_input(INPUT_POST, 'catType', FILTER_SANITIZE_NUMBER_INT);
                        $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
                
                
                        if (empty($invName) || empty($invDescription) || empty($invImage) || empty($invPrice) || empty($invStock) || empty($categoryId) || empty($invVendor)) {
                            $message = '<p class="bad">Please provide information for all empty form fields.</p>';
                
                            include '../view/new-prod.php';
                            exit;
                        }
                
                
                        $regOutcome = regProducts($invName, $invDescription, $invImage, $invPrice, $invStock, $categoryId, $invVendor);
                
                // Check and report the result
                        if ($regOutcome === 1) {
                            $message = "<p class='good'>Thanks for registering $invName as a new product.</p>";
                            include '../view/new-prod.php';
                            exit;
                        } else {
                            $message = "<p class='bad'>Sorry $invName, but the registration for the product failed. Please try again.</p>";
                            include '../view/new-prod.php';
                            exit;
                        }
                
                        break;
                
                    case 'newCategoryForm':
        
                    include '../view/new-cat.php';
                    break;
                
                    case 'newCategory':
            
                        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
                
                
                        if (empty($categoryName)) {
                            $message = '<p class="bad"> * Please provide information for all empty form fields.</p>';
                            include '../view/new-cat.php';
                            exit;
                        }
                
                
                        $dbCheck = getCategoryByName($categoryName);
                    
                        if (count($dbCheck) && count($dbCheck[0])) {
                            $message = '<p class="bad"> * ERROR: This category already exist.</p>';
                            include '../view/new-cat.php';
                            exit;
                        }
                
                        $regOutcome = regCategories($categoryName);
                
            
                        if ($regOutcome === 1) {
                            $message = "<p class='good'>Thanks for registering $categoryName as a new category.</p>";
                            header('location: ../index.php');
                            exit;
                        } else {
                            $message = "<p class=bad'>Sorry $categoryName, but the registration for the category failed. Please try again.</p>";
                            include '../view/new-cat.php';
                            exit;
                        }
                        break;
                
                

        
        


}
?>
