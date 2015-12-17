<?php
require_once 'BaseModel.php';

class Ad extends BaseModel{
	protected static $table = 'ads_list';

	protected function insert(){
		$insert = "INSERT INTO " . static::$table . " (item_name, price, description, contact, user_id)
		VALUES (:item_name, :price, :description, :contact, :user_id)";
		$stmt = self::$dbc->prepare($insert);
		$stmt->bindValue(':item_name', $this->attributes['item_name'], PDO::PARAM_STR);
		$stmt->bindValue(':price', $this->attributes['price'], PDO::PARAM_STR);
		$stmt->bindValue(':description', $this->attributes['description'], PDO::PARAM_STR);
		$stmt->bindValue(':contact', $this->attributes['contact'], PDO::PARAM_STR);
		$stmt->bindValue(':user_id', $this->attributes['user_id'], PDO::PARAM_STR);
		$stmt->execute();
	}
}




?>