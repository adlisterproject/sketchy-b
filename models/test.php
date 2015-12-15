<?php

require "User.php";

$user = new User();

$user->username = 'orange';
$user->email = 'orange@email.com';
$user->password = 'apple';

$user->save();


?>