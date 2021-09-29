<?php 

	require 'conexion.php';

	if(isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])){

		$sql = "INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";

		$stmt = $conn->prepare($sql);
		
		$stmt->bindParam(':nombre', $_POST['nombre']);

		$stmt->bindParam(':email', $_POST['email']);

		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

		$stmt->bindParam(':password', $password);

		if($stmt->execute()){
			echo "OK";		
		}else{
			echo "FAIL";
		}

	}

?>
