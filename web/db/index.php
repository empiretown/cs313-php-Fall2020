<?php

require_once '../connectDb.php';
require_once '../model/product-model.php';

$sellers = getSellers();
// $db = get_db;

$navlist = "<li><a href='.' title='View the Product Homepage'>Home</a></li>";

foreach ($sellers as $seller) {
    $navlist .= '<li><a href="../../product/index.php' . $seller["companyName"] . '" title=View our ' . $seller["companyName"] . 'product line>' . $seller["companyName"] . '</a></li>';
}

$action = filter_input(INPUT_POST, 'action');
	if ($action == NULL){
		$action = filter_input(INPUT_GET, 'action');
		if( $action == NULL){
			$action = 'home';
		}

		switch ($action) {
			case 'home':
				include '../view/home.php';
                break;
                
			case 'login':
				include '../view/login.php';
                break;
                
            case 'registration':
				include '../view/registration.php';
                break;

			case 'error':
				include '../errordocs/500.php';
				break;
		}
	}

?>

