<nav class="navbar navbar-expand-xl navbar-dark bg-dark ">
  <div class="container-fluid">
    <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-decoration-none navbar-brand">
      <i class="bi bi-clock-history px-5" style="font-size: 2rem;"></i>
    </a>

    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">

        <a href="/scripts/categorias" class="nav-link px-5 <?php if(str_contains($_SERVER['PHP_SELF'],'categorias')){print('active');}?>">
          <i class="bi bi-diagram-2-fill d-block mb-1 text-center d-none d-xl-block" style="font-size: 2rem;"></i>Categorías
        </a>

        <a href="/scripts/departamentos" class="nav-link px-5 <?php if(str_contains($_SERVER['PHP_SELF'],'departamentos')){print('active');}?>">
          <i class="bi bi-grid d-block mb-1 text-center d-none d-xl-block" style="font-size: 2rem;"></i>Departamentos
        </a>

        <a href="/scripts/empleados" class="nav-link px-5 <?php if(str_contains($_SERVER['PHP_SELF'],'empleados')){print('active');}?>">
          <i class="bi bi-people-fill d-block mb-1 text-center d-none d-xl-block" style="font-size: 2rem;"></i>Empleados
        </a>

        <a href="/logout.php" class="nav-link px-5">
          <i class="bi bi-door-closed d-block mb-1 text-center d-none d-xl-block" style="font-size: 2rem;"></i>Cerrar sesión
        </a>
      </div>
    </div>

  </div>
</nav>
