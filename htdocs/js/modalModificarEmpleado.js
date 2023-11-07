
  const modificarEmpleadosModal = document.getElementById('modificarEmpleadosModal')
  if (modificarEmpleadosModal) {
    modificarEmpleadosModal.addEventListener('show.bs.modal', event => {
      // Button that triggered the modal
      const button = event.relatedTarget
      // Extract info from data-bs-* attributes
      const dni = button.getAttribute('data-bs-dni')
      const nombre = button.getAttribute('data-bs-nombre')
      const apellido1 = button.getAttribute('data-bs-apellido1')
      const apellido2 = button.getAttribute('data-bs-apellido2')

      // If necessary, you could initiate an Ajax request here
      // and then do the updating in a callback.

      // Update the modal's content.
      //const modalTitle = modificarEmpleadosModal.querySelector('.modal-title')
      const modalDNI = modificarEmpleadosModal.querySelector('.modal-body input[name="dni"]')
      const modalNombre = modificarEmpleadosModal.querySelector('.modal-body input[name="nombre"]')
      const modalApellido1 = modificarEmpleadosModal.querySelector('.modal-body input[name="apellido1"]')
      const modalApellido2 = modificarEmpleadosModal.querySelector('.modal-body input[name="apellido2"]')

      //modalTitle.textContent = `New message to ${recipient}`
      modalDNI.value = dni
      modalNombre.value = nombre
      modalApellido1.value = apellido1
      modalApellido2.value = apellido2
    })
  }
