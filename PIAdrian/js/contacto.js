function validarFormulario() {
    var nombre = document.getElementById('nombre').value;
    var email = document.getElementById('email').value;
    var mensaje = document.getElementById('mensaje').value;

    // Validar que los campos no estén vacíos
    if (nombre.trim() === '' || email.trim() === '' || mensaje.trim() === '') {
      alert('Por favor, completa todos los campos.');
      return false;
    }

    // Validar el formato del correo electrónico
    var emailRegExp = /^\S+@\S+\.\S+$/;
    if (!emailRegExp.test(email)) {
      alert('Por favor, ingresa un correo electrónico válido.');
      return false;
    }

    // Si todos los campos son válidos, se envía el formulario
    return true;
  }