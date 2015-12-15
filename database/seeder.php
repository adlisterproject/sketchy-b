<?php
require 'migration.php';

$query = "INSERT INTO ads_list (item_name, price, description, contact) 
VALUES (:item_name, :price, :description, :contact)";

$stmt = $dbc->prepare($query);

$ads_list = [

	['item_name' => 'Nintendo 64', 'price' => '75.00', 'description' => 'An old nintendo 64.', 'contact' => 'alex@alex.gmail']

];

foreach ($ads_list as $ad) {
	$stmt->bindValue(':item_name', $ad['item_name'], PDO::PARAM_STR);
	$stmt->bindValue(':price', $ad['price'], PDO::PARAM_STR);
	$stmt->bindValue(':description', $ad['description'], PDO::PARAM_STR);
	$stmt->bindValue(':contact', $ad['contact'], PDO::PARAM_STR);
	$stmt->execute();
}

$query = "INSERT INTO users (email, password) VALUES (:email, :password)";
$stmt = $dbc->prepare($query);

$users= [
	['email' => 'randy@randy.com', 'password' => 'tell34324']
];

foreach ($users as $user){
	$stmt->bindValue(':email', $user['email'], PDO::PARAM_STR);
	$stmt->bindValue(':password', $user['password'], PDO::PARAM_STR);
	$stmt->execute();
}
