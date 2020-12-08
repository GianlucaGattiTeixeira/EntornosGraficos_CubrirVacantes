function validacion_registro(){
    if(document.getElementById('inputDni')){
        var dni = document.getElementById('inputDni').value;
    }
    if(document.getElementById('inputNombre').value){
        var nombre = document.getElementById('inputNombre').value
    }
    if(document.getElementById('inputApellido').value){
        var apellido = document.getElementById('inputApellido').value
    }
    if(document.getElementById('inputUsuario').value){
        var usuario = document.getElementById('inputUsuario').value
    }
    if(document.getElementById('inputContrasena').value){
        var contrasena = document.getElementById('inputContrasena').value
    }
    if(document.getElementById('inputEmail').value){
        var email = document.getElementById('inputEmail').value
    }
    if (document.getElementById('inputDireccion')){
        var direccion = document.getElementById('inputDireccion').value
    }
    if (document.getElementById('legajo')){
        var legajo = document.getElementById('legajo').value
    }
    if  (dni && dni.length < 7 | dni.length > 8){
        alert("El DNI ingresado es incorrecto, la longitud del mismo debe ser igual a 7 u 8");
        return false;
    }
    else if  (dni && /^\s+$/.test(dni)){
        alert("El DNI ingresado es incorrecto,no puede estar formado por espacios en blanco");
        return false;
    }
    else if  (nombre && /^\s+$/.test(nombre)){
        alert("El nombre ingresado solo está formado por espacios en blanco");
        return false;
    }
    else if  (apellido && /^\s+$/.test(apellido)){
        alert("El apellido ingresado solo está formado por espacios en blanco");
        return false;
    }
    else if  (usuario &&/^\s+$/.test(usuario)){
        alert("El usuario ingresado solo está formado por espacios en blanco");
        return false;
    }
    else if  (usuario && usuario.length < 4){
        alert("El usuario debe tener una longitud mayor o igual a 4");
        return false;
    }
    else if  (contrasena && /^\s+$/.test(contrasena)){
        alert("La contraseña ingresada solo está formada por espacios en blanco");
        return false;
    }
    else if  (contrasena && (contrasena.length < 6 || contrasena.length > 16)){
        alert("La contraseña debe tener una longitud entre 6 y 16 caracteres");
        return false;
    }
    else if  (email && /^\s+$/.test(email)){
        alert("El email ingresado solo está formado por espacios en blanco");
        return false;
    }
    else if  (email && !(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(email))){
        alert("El formato del email es inválido");
        return false;
    }
    else if  (direccion && /^\s+$/.test(direccion)){
        alert("La dirección ingresada solo está formada por espacios en blanco");
        return false;
    }
    else if (legajo && legajo.length != 5){
        alert("La longitud del legajo debe ser igual a 5");
        return false;
    }
    else{
        return true;
    }
}

function validacion_alta_vacante(){
    var fecha_desde = document.getElementById('fecha_desde').value.split("-");
    fecha_desde = new Date(fecha_desde[0],fecha_desde[1]-1,fecha_desde[2]);
    var fecha_hasta = document.getElementById('fecha_hasta').value.split("-");
    fecha_hasta = new Date(fecha_hasta[0],fecha_hasta[1]-1,fecha_hasta[2]);
    var hoy = new Date()
    fecha_desde.setHours(0,0,0,0)
    fecha_hasta.setHours(0,0,0,0)
    hoy.setHours(0,0,0,0)
    if  (fecha_desde.getTime() < hoy.getTime()){
        alert("La fecha desde debe mayor o igual a la fecha de hoy");
        return false;
    }
    else if  (fecha_desde.getTime() >= fecha_hasta.getTime()){
        alert("La fecha desde debe ser menor que la fecha hasta");
        return false;
    }else{
        return true;
    }
}