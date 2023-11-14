<!-- MODAL seleccionar fecha -->

<div class="modal modal-lg fade" id="nuevoTurnoPublicado_1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Publicar turnos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <div class="row mb-3">
            <label for="fecha_inicio" class="form-label">Fecha inicial</label>
            <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio">
          </div>
          <div class="row mb-3">
            <label for="fecha_fin" class="form-label">Fecha final</label>
            <input class="form-control" type="text" name="fecha_fin" id="fecha_fin">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" data-bs-target='nuevoTurnoPublicado_2' data-bs-toggle='modal'>Siguiente</button>
        </div>
    </div>
  </div>
</div>

<!-- MODAL seleccionar turnos -->
<div class="modal modal-lg fade" id="nuevoTurnoPublicado_2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Publicar turnos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-target='nuevoTurnoPublicado_1' data-bs-toggle='modal'>Close</button>
          <button type="submit" class="btn btn-primary" data-bs-target='nuevoTurnoPublicado_3' data-bs-toggle='modal'>Save changes</button>
        </div>
    </div>
  </div>
</div>