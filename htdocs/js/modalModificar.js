const modificarEmpleadosModal = document.getElementById('modificarEmpleadosModal')
if (modificarEmpleadosModal) {
    modificarEmpleadosModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-nombre')
    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.

    // Update the modal's content.
    const modalTitle = modificarEmpleadosModal.querySelector('.modal-title')
    const modalBodyInput = modificarEmpleadosModal.querySelector('.modal-body input[name="nombre"]')

    //modalTitle.textContent = `New message to ${recipient}`
    modalBodyInput.value = recipient
  })
}