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
		//password hashbrowns for security
		$stmt->bindValue(':password', password_hash($this->attributes['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
		$stmt->execute();
	}

	protected function update($id)
    {
        $update = "UPDATE " . static::$table . " SET username = :username WHERE id =" . $this->attributes['id'];  
        $stmt= self::$dbc->prepare($update); 
        $stmt->bindValue(':username', $this->attributes['username'], PDO::PARAM_STR);
        $stmt->execute();

        $update = "UPDATE " . static::$table . " SET email = :email WHERE id =" . $this->attributes['id'];  
        $stmt= self::$dbc->prepare($update); 
        $stmt->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);
        $stmt->execute();

        $update = "UPDATE " . static::$table . " SET password = :password WHERE id =" . $this->attributes['id'];  
        $stmt= self::$dbc->prepare($update); 
        $stmt->bindValue(':password', password_hash($this->attributes['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stmt->execute();
    }

	public static function checkMatch($string1, $string2){
	    if (strcmp($string1, $string2) !==0){
	        throw new Exception("Passwords must match!");
	    }

	    return true;
	}

	 public static function findUserByUserName($username)
    {
        // Get connection to the database
        self::dbConnect();

        // @TODO: Create select statement using prepared statements
        $query = "SELECT * FROM ". static::$table . " WHERE username = :username";
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':username', $username, PDO::PARAM_INT);
        $stmt->execute();
        
        // @TODO: Store the resultset in a variable named $result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // The following code will set the attributes on the calling object based on the result variable's contents

        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }

	
}


?>