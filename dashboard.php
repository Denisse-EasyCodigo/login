<?php 
	
	session_start();

	require 'database/conexion.php';

	if (isset($_SESSION['user_id'])) {

		$sql = $conn->prepare('SELECT id, nombre, email, password FROM usuarios WHERE id = :id');
		$sql->bindParam(':id', $_SESSION['user_id']);
		$sql->execute();
		$results = $sql->fetch(PDO::FETCH_ASSOC);

		$datauser = null;

		if (count($results) >0) {
			$datauser = $results;
		}
	}else{
        header('Location: index');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a EasyCodigo</title>

    <link rel="shortcut icon" href="img/login.png" type="image/x-icon">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

    <div class="container welcome-container">
        <div class="row mt-5">

            <div class="col-md-12">

                <img src="img/welcome.png" class="welcome__img" />   

                <div class="alert alert-info welcome-alert" role="alert">
                    <h4 class="alert-heading">¡Bienvenido a EasyCodigo <?php echo $datauser['nombre'];?>!</h4>
                    <p>Iniciaste sesión correctamente con el correo <?php echo $datauser['email'];?></p>
                    <hr>
                    <p class="mb-0"></p>
                </div>

                <a href="logout.php" class="btn btn-outline-danger dashboard__logout">Cerrar sesión</a>
            </div>

        </div>
    </div>

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>