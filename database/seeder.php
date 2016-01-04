<?php

require 'migration.php';

$query = "INSERT INTO ads_list (item_name, price, description, image_path, contact, user_id) 
VALUES (:item_name, :price, :description, :image_path, :contact, :user_id)";
//seed images as well

$stmt = $dbc->prepare($query);

$ads_list = [

	['item_name' => 'Nintendo 64', 'price' => '75.00', 'description' => 'An old nintendo 64.', 'image_path' => 'upload_images/hammy.jpg', 'contact' => 'alex@alex.gmail', 'user_id'=> '1'],
	['item_name' => 'Playstation', 'price' => '64.00', 'description' => 'An old Playstation.', 'image_path' => 'upload_images/hammy.jpg','contact' => 'alex@gmail.com', 'user_id'=> '1'],
	['item_name' => 'Gameboy', 'price' => '15.00', 'description' => 'An old Gameboy.', 'image_path' => 'upload_images/hammy.jpg','contact' => 'danny@gmail.com', 'user_id'=> '2'],
	['item_name' => 'Xbox', 'price' => '100.00', 'description' => 'An old xbox.', 'image_path' => 'upload_images/hammy.jpg','contact' => 'ryan@gmail.com', 'user_id'=> '3']

];

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

$users= [
	['username' => 'alex', 'email' => 'alex@alex.com', 'password' => 'alex'],
	['username' => 'danny', 'email' => 'danny@danny.com', 'password' => 'danny'],
	['username' => 'ryan', 'email' => 'ryan@ryan.com', 'password' => 'ryan']
];

foreach ($users as $user){
	$stmt->bindValue(':username', $user['username'], PDO::PARAM_STR);
	$stmt->bindValue(':email', $user['email'], PDO::PARAM_STR);
	$stmt->bindValue(':password', password_hash($user['password'], PASSWORD_DEFAULT	), PDO::PARAM_STR);
	$stmt->execute();
}
