<?php

require_once "Validate.php";


class ValidateUser extends Validate
{

	public static function getUsername ()
	{
		try{
			return Input::getString('username', 0, 50);
		} catch (OutOfRangeException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (InvalidArgumentException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (DomainException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(LengthException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(Exception $e){
			$error = $e->getMessage();
			array_push($errors, $error); 
		} 
	}

	public static function getEmail()
	{
		try{
			return Input::getString('email', 0, 50);
		} catch (OutOfRangeException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (InvalidArgumentException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (DomainException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(LengthException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(Exception $e){
			$error = $e->getMessage();
			array_push($errors, $error); 
		}
	}

	public static function getPassword()
	{
		try{
			return Input::getString('password', 0, 50);
		} catch (OutOfRangeException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (InvalidArgumentException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (DomainException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(LengthException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(Exception $e){
			$error = $e->getMessage();
			array_push($errors, $error); 
		}
	}

	public static function getPasswordMatch()
	{
		try{
			return Input::getString('passwordmatch', 0, 50);
		} catch (OutOfRangeException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (InvalidArgumentException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (DomainException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(LengthException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(Exception $e){
			$error = $e->getMessage();
			array_push($errors, $error); 
		} 
	}

}


?>