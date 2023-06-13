function validarFormulario() {
  //Codigo para validar el formulario
    var nombre = document.getElementById('nombre').value;
    var email = document.getElementById('email').value;
    var cantidad = document.getElementById('cantidad').value;
    //Para que sepa si los campos estan vacios o no
    if (nombre.trim() === '' || email.trim() === '' || cantidad.trim() === '') {
      alert('Por favor, completa todos los campos.');
      return false;
    }
    //Expresion regular del email
    var emailRegExp = /^\S+@\S+\.\S+$/;
    if (!emailRegExp.test(email)) {
      alert('Por favor, ingresa un correo electrónico válido.');
      return false;
    }
    //Para cantidad valida
    var cantidadNum = parseFloat(cantidad);
    if (isNaN(cantidadNum) || cantidadNum <= 0) {
      alert('Por favor, ingresa una cantidad de donación válida.');
      return false;
    }
    
    return true;
    
  }
// Obtener la referencia al elemento <p> mediante su ID
var parrafo = document.getElementById("miParrafo");

// Agregar un evento de mouseover (paso del ratón por encima)
parrafo.addEventListener("mouseover", function() {
  // Cambiar el color de fondo del párrafo al pasar el ratón por encima
  parrafo.style.backgroundColor = "orange";
});

// Agregar un evento de mouseout (ratón fuera del elemento)
parrafo.addEventListener("mouseout", function() {
  // Restablecer el color de fondo del párrafo cuando el ratón sale del elemento
  parrafo.style.backgroundColor = "black";
});