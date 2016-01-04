<?php

require 'migration.php';

$query = "INSERT INTO ads_list (item_name, price, description, image_path, contact, user_id) 
VALUES (:item_name, :price, :description, :image_path, :contact, :user_id)";
//seed images as well

$stmt = $dbc->prepare($query);

$ads_list = require "ads.php";

foreach ($ads_list as $ad) {
	$stmt->bindValue(':item_name', $ad['item_name'], PDO::PARAM_STR);
	$stmt->bindValue(':price', $ad['price'], PDO::PARAM_STR);
	$stmt->bindValue(':description', $ad['description'], PDO::PARAM_STR);
	$stmt->bindValue(':image_path', $ad['image_path'], PDO::PARAM_STR);
	$stmt->bindValue(':contact', $ad['contact'], PDO::PARAM_STR);
	$stmt->bindValue(':user_id', $ad['user_id'], PDO::PARAM_STR);
	$stmt->execute();
}

$query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
$stmt = $dbc->prepare($query);

$users = require "users.php";

foreach ($users as $user){
	$stmt->bindValue(':username', $user['username'], PDO::PARAM_STR);
	$stmt->bindValue(':email', $user['email'], PDO::PARAM_STR);
	$stmt->bindValue(':password', password_hash($user['password'], PASSWORD_DEFAULT	), PDO::PARAM_STR);
	$stmt->execute();
}
