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

	public static function findByUserId($id)
    {
        // Get connection to the database
        self::dbConnect();

        // @TODO: Create select statement using prepared statements
        $query = "SELECT * FROM ". static::$table . " WHERE user_id = :id";
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;

    }
}




?>