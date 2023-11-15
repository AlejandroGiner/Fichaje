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
            <input class="form-control" type="date" name="fecha_fin" id="fecha_fin">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" data-bs-target='#nuevoTurnoPublicado_2' data-bs-toggle='modal'>Siguiente</button>
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
          <?php
          $turnos_query = "select * from turno";
          $turnos_result = $conn->query($turnos_query);
          while($row = $turnos_result->fetch_array()){ ?>
            <div>
              <button class='btn btn-primary' data-bs-toggle='collapse' data-bs-target='#turno<?php print($row['id_turno']) ?>' >Turno de <?php print($row['nombre']) ?></button>
              <div class="collapse" id="turno<?php print($row['id_turno']) ?>">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="col">Departamento</th>
                      <th class="col">Categorías</th>
                    </tr>
                  </thead>
                  <tr>
                    <td>a</td>
                    <td>b</td>
                  </tr>
                  <tr>
                    <td>
                      <button class="btn btn-info" id='addDptoTurno<?php print($row['id_turno']); ?>'>Añadir departamento</button>
                    </td>
                  </tr>
                </table>
              </div>
            </div> <?php
          }
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-target='#nuevoTurnoPublicado_1' data-bs-toggle='modal'>Atrás</button>
          <button type="submit" class="btn btn-primary" data-bs-target='#nuevoTurnoPublicado_3' data-bs-toggle='modal'>Save changes</button>
        </div>
    </div>
  </div>
</div>