const imagen = document.getElementById("imagen");
const vista = document.getElementById("vistaPrevia");
const boton = document.querySelector(".agregarImagen");

imagen.addEventListener("change", function () {

    const archivo = this.files[0];

    if (!archivo) return;

    const lector = new FileReader();

    lector.onload = function(e){

        vista.src = e.target.result;

        vista.style.opacity = "1";

        boton.style.display = "none";

    }

    lector.readAsDataURL(archivo);

});