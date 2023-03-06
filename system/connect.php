<?php
session_start();
error_reporting(0);
function database(){
	$servername = "localhost";
	$db = "pak999tk_22";
	$username = "pak999tk_22";
	$password = "162359";
	try {
		$stmt = new PDO("mysql:host=$servername;dbname=$db;charset=utf8;", $username, $password);
		$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		return $stmt;
	} catch (Exception $e) {
		echo $e->getmessage();
	}
}


?>
