<?php

require '../utils/ads_login.php';
require '../utils/db_connect.php';

$query= "DROP TABLE IF EXISTS ads_list";
$dbc->exec($query);

$query = "CREATE TABLE ads_list (
	id int(10) unsigned NOT NULL AUTO_INCREMENT,
	item_name varchar(100) NOT NULL,
	price double NOT NULL,
	description varchar(500) NOT NULL,
	contact varchar(200) NOT NULL,
	PRIMARY KEY (id)
	)";

$dbc->exec($query);

$query= "DROP TABLE IF EXISTS users";
$dbc->exec($query);

$query = "CREATE TABLE users (
	id int(10) unsigned NOT NULL AUTO_INCREMENT,
	email varchar(100) NOT NULL,
	password varchar(100) NOT NULL,
	PRIMARY KEY (id)
	)";
$dbc->exec($query);
echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";