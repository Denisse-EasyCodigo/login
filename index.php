<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard');
}

$acceso = "";

if (isset($_GET['acceso'])) {
    $acceso = $_GET['acceso'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

    <link rel="shortcut icon" href="img/login.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

    <div class="container login__container">
        <div class="row mt-5 login__box">

            <div class="col-md-6 g-0 login-form__image">
                <img src="img/login.png" class="login-form__img" />
            </div>

            <div class="col-md-6 login-form__form">
                <h2 class="mb-3 login-form__title">Iniciar Sesión</h2>

                <form action="database/__login.php" method="POST">
                    <div class="mb-3">
                        <label>Ingresa tu correo</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Ingresa tu contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-3 login-form__btn-login">Iniciar sesión</button>
                    <hr>
                    <a class="btn btn-info mt-3 form__button-signup login-form__btn-signup" href="signup">Crear cuenta</a>
                </form>

                <?php
                if ($acceso == "error") {
                    echo "<div class='alert alert-danger mt-4' role='alert'>No se encontro el usuario intenta nuevamente.</div>";
                }
                ?>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>