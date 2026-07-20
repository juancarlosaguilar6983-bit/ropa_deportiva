const formulario = document.getElementById("formRegistro");

formulario.addEventListener("submit", function(e){

const nombre = document.getElementById("nombre").value.trim();

const paterno = document.getElementById("apellido_paterno").value.trim();

const materno = document.getElementById("apellido_materno").value.trim();

const correo = document.getElementById("correo").value.trim();

const usuario = document.getElementById("usuario").value.trim();

const password = document.getElementById("password").value;

const confirmar = document.getElementById("confirmar").value;

const letras = /^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/;

const usuarioRegex = /^[A-Za-z0-9_]+$/;

const correoRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

if(!letras.test(nombre)){
alert("El nombre solo puede contener letras.");
e.preventDefault();
return;
}

if(!letras.test(paterno)){
alert("El apellido paterno solo puede contener letras.");
e.preventDefault();
return;
}

if(materno !== "" && !letras.test(materno)){
alert("El apellido materno solo puede contener letras.");
e.preventDefault();
return;
}

if(!correoRegex.test(correo)){
alert("Correo electrónico inválido.");
e.preventDefault();
return;
}

if(!usuarioRegex.test(usuario)){
alert("El usuario solo puede contener letras, números y guion bajo.");
e.preventDefault();
return;
}

if(!passwordRegex.test(password)){
alert("La contraseña debe tener mínimo 8 caracteres, una mayúscula, una minúscula y un número.");
e.preventDefault();
return;
}

if(password !== confirmar){
alert("Las contraseñas no coinciden.");
e.preventDefault();
return;
}

});