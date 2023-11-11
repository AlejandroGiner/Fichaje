<?php
//Inicio la sesión
session_start();

//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
if(isset($_SESSION['username'])){
    //si no existe, envio a la página de autentificacion
    header("Location: /");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fichajes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    
    <div class="container-sm border">
        <div class="panel panel-primary">
            <div class="panel-heading text-center"><h2>Fichaje</h2></div>

            <h1>Iniciar sesión</h1>
            <form class="container border pt-5 pb-5 " action="/control.php" method="POST">
                <?php
                    if (array_key_exists('login_error',$_GET)){ ?>
                    <div class="alert alert-danger" role="alert">
                        Usuario o contraseña incorrectos.
                    </div>
                <?php } ?>
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control form-control-lg" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="passwd" class="form-label">Contraseña</label>
                    <input type="password" class="form-control form-control-lg" id="passwd" name="passwd">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="keepSession">
                    <label class="form-check-label" for="keepSession">Mantener sesión iniciada</label>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </form>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>