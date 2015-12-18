<?php
switch ($_SERVER['REQUEST_URI']) {
    case '/ads':
        include '../views/ads/index.php';
        break;
    case '/ads/show':
        include '../views/ads/show.php';
        break;
    case '/ads/create':
        include '../views/ads/create.php';
        break;
    case '/ads/edit':
    	include '../views/ads/edit.php';
    	break;
    case '/users':
    	include '../views/users/show.php';
    	break;
    case '/users/edit':
    	include '../views/users/edit.php';
    	break;
    case '/users/create':
    	include '../views/users/create.php';
    	break;
    case '/auth/login':
    	include '../views/auth/login.php';
    	break;	
    case '/auth/logout':
    	include '../views/auth/logout.php';
    	break;
    default:
        include 'home.php';
        break;
}
?>


