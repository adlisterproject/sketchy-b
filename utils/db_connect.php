<?php

// require_once 'config_user.php';
require_once 'ads_login.php';

$dbc = new PDO('mysql:host=' . DB_HOST .  ';dbname=' . DB_NAME, DB_USER,DB_PASSWORD);

$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>