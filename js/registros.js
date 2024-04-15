var letras = document.querySelector("td");
var botao = document.getElementById("botao");

window.addEventListener('resize', function () {

    var screenWidth = window.innerWidth;

    if (screenWidth < 768) {
        botao.style.color = "red";
        console.log("mobile")
    } else {


    }
});

console.log("teste");