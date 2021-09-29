<?php 

	$server = 'localhost';
	$username = 'root';
	$password = 'p7a8g5i4';
	$database = 'login-easycodigo';

	try{
		$conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
	} catch(PDOException $e){
		die('Conexión fallida: '.$e->getMessage());
	}
	
?>
