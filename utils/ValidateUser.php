<?php

require_once "Validate.php";


class ValidateUser extends Validate
{

	public static function getUsername ()
	{
		//no need to differentiate between which exception is thrown. we just want the message
		//this will still catch the differing messages
		try{
			return Input::getString('username', 0, 50);
		} catch(Exception $e){
			self::addError($e->getMessage()); 
		} 
	}

	public static function getEmail()
	{
		try{
			return Input::getString('email', 0, 50);
		} catch(Exception $e){
			self::addError($e->getMessage()); 
		}
	}

	public static function getPassword()
	{
		try{
			return Input::getString('password', 0, 50);
		} catch(Exception $e){
			self::addError($e->getMessage()); 
		}
	}

	public static function getPasswordMatch()
	{
		try{
			return Input::getString('passwordmatch', 0, 50);
		} catch(Exception $e){
			self::addError($e->getMessage()); 
		} 
	}

}


?>