<?php 

require_once '../models/Ad.php';

$ad= new Ad();
$ad->item_name='Nike shoes';
$ad->price='85.00';
$ad->description='Some old nike shoes';
$ad->contact='raul@gmail.com';
$ad->save();