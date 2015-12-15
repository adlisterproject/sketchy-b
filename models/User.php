<?php
require_once 'BaseModel.php';

class User extends BaseModel{
	protected static $table = 'users';

	function insert($dbc, $username, $password){
	$create = "INSERT INTO " . static::$table . "username, email, password) VALUES(:username, :email, :password)";
	$stmt = $dbc->prepare($create);
	$stmt->bindValue(':username', $username, PDO::PARAM_STR);
	$stmt->bindValue(':email', $email, PDO::PARAM_STR);
	$stmt->bindValue(':password', $password, PDO::PARAM_STR);
	$stmt->execute();
}
}


?>