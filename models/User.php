<?php
require_once 'BaseModel.php';

class User extends BaseModel{
	protected static $table = 'users';

	protected function insert()
	{
		$create = "INSERT INTO " . static::$table . " (username, email, password) VALUES (:username, :email, :password)";
		$stmt = self::$dbc->prepare($create);
		$stmt->bindValue(':username', $this->attributes['username'], PDO::PARAM_STR);
		$stmt->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);
		$stmt->bindValue(':password', $this->attributes['password'], PDO::PARAM_STR);
		$stmt->execute();
	}

	
}


?>