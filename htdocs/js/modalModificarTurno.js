
const modificarTurnosModal = document.getElementById('modificarTurnosModal')
if (modificarTurnosModal) {
    modificarTurnosModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const id_turno = button.getAttribute('data-bs-id-turno')
    const hora_inicio = button.getAttribute('data-bs-hora-inicio')
    const hora_fin = button.getAttribute('data-bs-hora-fin')
    const plus = button.getAttribute('data-bs-plus')

    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.

    // Update the modal's content.
    //const modalTitle = modificarTurnosModal.querySelector('.modal-title')

    const modalIdTurno = modificarTurnosModal.querySelector('.modal-body #id_turno')
    const modalHoraInicio = modificarTurnosModal.querySelector('.modal-body #hora_inicio')
    const modalHoraFin = modificarTurnosModal.querySelector('.modal-body #hora_fin')
    const modalPlus = modificarTurnosModal.querySelector('.modal-body #plus')

    //modalTitle.textContent = `New message to ${recipient}`
    
    modalHoraInicio.value = hora_inicio
    modalHoraFin.value = hora_fin
    modalIdTurno.value = id_turno

    if(plus==1){
        modalPlus.setAttribute("checked","")
    }
    else{
        modalPlus.removeAttribute("checked")
    }

  })
}
