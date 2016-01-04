<?php

require_once "Validate.php";

class ValidateAd extends Validate
{
	public static function getItemName()
	{
		try{
			return Input::getString('item_name', 0, 50);
		} catch(Exception $e){
			self::addError($e->getMessage());
		}
	}

	public static function getPrice()
	{
		try{
			return Input::getNumber('price');
		} catch (Exception $e){
			self::addError($e->getMessage());
		}
	}

	public static function getDescription()
	{
		try{
			return Input::getString('description', 0, 50);
		} catch(Exception $e){
			self::addError($e->getMessage()); 
		} 
	}

	public static function getContact()
	{
		try{
			return Input::getString('contact', 0, 50);
		} catch(Exception $e){
			self::addError($e->getMessage()); 
		}
	}
}

?>