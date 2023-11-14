const modificarDepartamentoModal = document.getElementById('modificarDepartamentoModal')
if (modificarDepartamentoModal) {
    modificarDepartamentoModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const nombre = button.getAttribute('data-bs-nombre')
    const presupuesto = button.getAttribute('data-bs-presupuesto')
    const id_departamento = button.getAttribute('data-bs-id-departamento')

    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.

    // Update the modal's content.
    const modal_nombre = modificarDepartamentoModal.querySelector('.modal-body input[name="nombre"]')
    const modal_presupuesto = modificarDepartamentoModal.querySelector('.modal-body input[name="presupuesto"]')
    const modal_id_departamento = modificarDepartamentoModal.querySelector('.modal-body input[name="id_departamento"]')


    //modalTitle.textContent = `New message to ${recipient}`
    modal_nombre.value = nombre
    modal_presupuesto.value = presupuesto
    modal_id_departamento.value = id_departamento
  });
}