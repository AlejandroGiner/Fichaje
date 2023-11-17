<?php include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fichajes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
<body>
    <!-- Fixed navbar -->
    <?php
        include($_SERVER['DOCUMENT_ROOT']."/header.php");
    ?>
<section class="vh-100 bg-secondary">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="card-body p-4 p-lg-5 text-black">
                        <form class="container border pt-5 pb-5 " action="register.php" method="POST">
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="bi bi-clock-history me-3" style="font-size: 5rem;"></i>
                                <span class="h1 fw-bold mb-0">Cuándo libro</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Registro de usuario</h5>

                                            <?php
                                                if (array_key_exists('user_exists',$_GET)){ ?>
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    Este usuario ya existe.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                            <button type="submit" class="btn btn-primary">Registrar usuario</button>

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</section>
</body>
</html>