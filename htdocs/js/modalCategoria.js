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