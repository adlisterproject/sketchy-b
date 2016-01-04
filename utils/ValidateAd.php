<?php

require_once "Validate.php";

class ValidateAd extends Validate
{
	public static function getItemName()
	{
		try{
			return Input::getString('item_name', 0, 50);
		} catch (OutOfRangeException $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error);
		} catch (InvalidArgumentException $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error);
		} catch (DomainException $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error);
		} catch(LengthException $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error);
		} catch(Exception $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error); 
		}
	}

	public static function getPrice()
	{
		try{
			return Input::getNumber('price');
		} catch (OutOfRangeException $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error);
		} catch (InvalidArgumentException $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error);
		} catch (DomainException $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error);
		} catch(RangeException $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error);
		} catch (Exception $e){
			array_push(self::$errors, $e->getMessage());
		}
	}

	public static function getDescription()
	{
		try{
			return Input::getString('description', 0, 50);
		} catch (OutOfRangeException $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error);
		} catch (InvalidArgumentException $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error);
		} catch (DomainException $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error);
		} catch(LengthException $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error);
		} catch(Exception $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error); 
		} 
	}

	public static function getContact()
	{
		try{
			return Input::getString('contact', 0, 50);
		} catch (OutOfRangeException $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error);
		} catch (InvalidArgumentException $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error);
		} catch (DomainException $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error);
		} catch(LengthException $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error);
		} catch(Exception $e){
			$error = $e->getMessage();
			array_push(self::$errors, $error); 
		}
	}
}

?>