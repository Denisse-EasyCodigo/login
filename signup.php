<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>

    <link rel="shortcut icon" href="img/login.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <div class="container signup__container">
        <div class="row mt-5">
            <div class="col-md-6 g-0 signup-form__image">
                <img src="img/login.png" />
            </div>

            <div class="col-md-6 signup-form__container">
                <h2 class="mb-3 signup-form__title">Registrate</h2>

                <form class="signup-form__form">
                    <div class="mb-3">
                        <label>Ingresa tu nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label>Ingresa tu correo</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label>Ingresa tu contraseña</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label>Confirma tu contraseña</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-3 signup-form__btn-signup">Registrarte</button>
                    <hr>
                    <a class="btn btn-info signup-form__btn-login mt-3" href="index">Iniciar Sesión</a>
                </form>

                <div class="alert alert-warning mt-4" role="alert">Las contraseñas no coinciden, verifica nuevamente</div>

                <div class='alert alert-success signup__success mt-4' role='alert'>La cuenta se creo correctamente!</div>

                <div class='alert alert-danger signup__fail mt-4' role='alert'>Ocurrio un error intenta nuevamente</div>

            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            $(".signup-form__form").submit(function(e) {
                e.preventDefault();

                var pass1 = $("#password").val();
                var pass2 = $("#confirm_password").val();
                validarPass(pass1, pass2);
            });

            function validarPass(pass1, pass2) {

                if (pass1 != pass2) {
                    $(".alert-warning").css("display", "inherit");
                } else {
                    $(".alert-warning").css("display", "none");

                    $.ajax({
                            url: 'database/__signup.php',
                            type: 'POST',
                            data: {
                                nombre: $("#nombre").val(),
                                email: $("#email").val(),
                                password: pass1,
                                confirm_password: pass2
                            }
                        })
                        .done(function(data) {
                            if (data == 'OK') {
                                $(".signup__success").css("display", "inherit");
                            } else {
                                $(".signup__fail").css("display", "inherit");
                            }
                        })

                }
            }
        });
    </script>
</body>

</html>