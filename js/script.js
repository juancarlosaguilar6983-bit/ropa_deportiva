document.addEventListener("DOMContentLoaded", () => {

    const slides = document.querySelectorAll(".slide");
    const puntos = document.querySelectorAll(".indicadores span");

    const btnPrev = document.querySelector(".prev");
    const btnNext = document.querySelector(".next");

    let indice = 0;

    function mostrarSlide(numero){

        slides.forEach(slide => slide.classList.remove("activo"));
        puntos.forEach(punto => punto.classList.remove("activo"));

        slides[numero].classList.add("activo");
        puntos[numero].classList.add("activo");

    }

    function siguienteSlide(){

        indice++;

        if(indice >= slides.length){

            indice = 0;

        }

        mostrarSlide(indice);

    }

    function anteriorSlide(){

        indice--;

        if(indice < 0){

            indice = slides.length - 1;

        }

        mostrarSlide(indice);

    }

    if(btnNext){

        btnNext.addEventListener("click", siguienteSlide);

    }

    if(btnPrev){

        btnPrev.addEventListener("click", anteriorSlide);

    }

    puntos.forEach((punto,i)=>{

        punto.addEventListener("click",()=>{

            indice=i;

            mostrarSlide(indice);

        });

    });

    mostrarSlide(0);

    setInterval(siguienteSlide,5000);

});