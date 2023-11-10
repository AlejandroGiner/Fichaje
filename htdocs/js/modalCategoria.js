const eliminarCategoriasModal = document.getElementById('eliminarCategoriasModal')
if (eliminarCategoriasModal) {
    eliminarCategoriasModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const botonEliminar = event.relatedTarget
    // Extract info from data-bs-* attributes
    const id_categoria = botonEliminar.getAttribute('data-bs-id-categoria')

    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.

    // Update the modal's content.
    //const modalTitle = modificarEmpleadosModal.querySelector('.modal-title')
    const modal_id_categoria = eliminarCategoriasModal.querySelector('.modal-body #id_categoria_eliminar')

    //modalTitle.textContent = `New message to ${recipient}`
    modal_id_categoria.value = id_categoria
  })
}


const modificarCategoriasModal = document.getElementById('modificarCategoriasModal')
if (modificarCategoriasModal) {
    modificarCategoriasModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const nombre = button.getAttribute('data-bs-nombre')
    const sueldo_base = button.getAttribute('data-bs-sueldo-base')
    const id_departamento = button.getAttribute('data-bs-departamento')

    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.

    // Update the modal's content.
    const modal_nombre = modificarEmpleadosModal.querySelector('.modal-body input[name="nombre"]')
    const modal_sueldo_base = modificarCategoriasModal.querySelector('.modal-body input[name="sueldo_base"]')
    const modal_departamento = modificarCategoriasModal.querySelector('.modal-body #departamento')

    //modalTitle.textContent = `New message to ${recipient}`
    modal_nombre.value = nombre
    modal_sueldo_base.value = sueldo_base
    modal_departamento.querySelector(`option[value="${id_departamento}"]`).selected = true
  })
}