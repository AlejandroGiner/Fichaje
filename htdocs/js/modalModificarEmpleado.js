
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
    const id_categoria = button.getAttribute('data-bs-categoria')

    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.

    // Update the modal's content.
    //const modalTitle = modificarEmpleadosModal.querySelector('.modal-title')
    const modalDNI = modificarEmpleadosModal.querySelector('.modal-body input[name="dni"]')
    const modalNombre = modificarEmpleadosModal.querySelector('.modal-body input[name="nombre"]')
    const modalApellido1 = modificarEmpleadosModal.querySelector('.modal-body input[name="apellido1"]')
    const modalApellido2 = modificarEmpleadosModal.querySelector('.modal-body input[name="apellido2"]')
    const modalCategoria = modificarEmpleadosModal.querySelector('.modal-body #categoria')

    //modalTitle.textContent = `New message to ${recipient}`
    modalDNI.value = dni
    modalNombre.value = nombre
    modalApellido1.value = apellido1
    modalApellido2.value = apellido2
    modalCategoria.querySelector(`option[value="${id_categoria}"]`).selected = true
  })
}

const eliminarEmpleadosModal = document.getElementById('eliminarEmpleadosModal')
if (eliminarEmpleadosModal) {
  eliminarEmpleadosModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const dni = button.getAttribute('data-bs-dni')

    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.

    // Update the modal's content.
    //const modalTitle = modificarEmpleadosModal.querySelector('.modal-title')
    const modalDNI = eliminarEmpleadosModal.querySelector('.modal-body #eliminardni')

    //modalTitle.textContent = `New message to ${recipient}`
    modalDNI.value = dni
  })
}

const nuevoEmpleadoCategoria = document.getElementById('categoria1')
  if (nuevoEmpleadoCategoria){
    nuevoEmpleadoCategoria.addEventListener('change', event => {
      const opcion = nuevoEmpleadoCategoria.querySelector('#categoria1 option:checked')

      const depto = opcion.getAttribute('data-bs-departamento')

      document.querySelector('input[name="departamento"]').value = depto
    })
  }