<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fichajes</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="/css/theme.css" rel="stylesheet">
</head>
<body>
    <!-- Fixed navbar -->
    <?php
        include("header.php");
    ?>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading text-center"><h2>Fichaje</h2></div>

            <h1>Iniciar sesión</h1>
            <form class="container border pt-5 pb-5 " action="control.php" method="POST">
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>