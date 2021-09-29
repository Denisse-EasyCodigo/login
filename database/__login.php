<?php

session_start();

require 'conexion.php';

    if( isset($_POST['email']) && isset($_POST['password']) ){

        $sql = $conn->prepare('SELECT id, email, password FROM usuarios WHERE email = :email');
	 	
		$sql->bindParam(':email', $_POST['email']);

	 	$sql->execute();

	 	$results = $sql->fetch(PDO::FETCH_ASSOC);

	 	if (count($results) >0 && password_verify($_POST['password'], $results['password'])) {
			 
			$_SESSION['user_id'] = $results['id'];
			header('Location: ../dashboard');

		} else{
			header('Location: ../index?acceso=error');
	 	}
       
        
    }
?>