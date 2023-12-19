<nav class="navbar navbar-expand-xl navbar-dark bg-dark ">
  <div class="container-fluid">
    <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-decoration-none navbar-brand">
      <i class="bi bi-clock-history px-5" style="font-size: 4rem;"></i>Hola, <?php print($_SESSION['nombre']); ?>
    </a>

    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">

        <a href="/scripts/turnos_publicados" class='nav-link px-5 <?php if(str_contains($_SERVER['PHP_SELF'],'turnos_publicados')){print('active');}?>'>
          <i class='bi-calendar-week d-block mb-1 text-center d-none d-xl-block' style='font-size: 2rem;'></i>Turnos publicados
        </a>
        <?php if($_SESSION['tipo_empleado'] == 3) { ?>
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle px-5" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi-building-fill-gear d-block mb-1 text-center d-none d-xl-block" style="font-size: 2rem;"></i>Administración
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item <?php if(str_contains($_SERVER['PHP_SELF'],'empleados/')){print('active');}?>" href="/admin/empleados">
              <i class="bi-people-fill"></i> Empleados
            </a></li>
            <li><a class="dropdown-item <?php if(str_contains($_SERVER['PHP_SELF'],'turnos/')){print('active');}?>" href="/admin/turnos">
              <i class="bi-clock-fill"></i> Turnos
            </a></li>
            <li><a class="dropdown-item <?php if(str_contains($_SERVER['PHP_SELF'],'departamentos/')){print('active');}?>" href="/admin/departamentos">
            <i class="bi-grid"></i> Departamentos
            </a></li>
            <li><a class="dropdown-item <?php if(str_contains($_SERVER['PHP_SELF'],'categorias/')){print('active');}?>" href="/admin/categorias">
            <i class="bi-diagram-2-fill"></i> Categorías
            </a></li>
            <li><a class="dropdown-item <?php if(str_contains($_SERVER['PHP_SELF'],'register/')){print('active');}?>" href="/admin/register">
              <i class="bi-person-fill-add"></i> Registrar usuario
            </a></li>
            <!-- <li><a class="dropdown-item" href="/scripts/horas/get_horas.php">
              <i class="bi-database-fill-gear"></i> Procesar fichajes
            </a></li> -->
          </ul>
        </div>
        <?php } ?>
          
        <a href="/logout.php" class="nav-link px-5">
          <i class="bi-door-closed d-block mb-1 text-center d-none d-xl-block" style="font-size: 2rem;"></i>Cerrar sesión
        </a>
      </div>
    </div>

  </div>
</nav>
