var menu = document.getElementById("meuMenu");
var funperfil = document.getElementById("perfil");
var add = document.getElementById("btn_adicionar");
var header = document.getElementById("header");
var contador = 0;

function mostraMenu2() {


    contador++;

    if (contador === 1) {
        menu.style.animation = "aparecer 2s";
        menu.style.display = "flex";
        console.log("teste 1");
        add.style.transform = "rotate(45deg)";
    } else if (contador === 2) {
        menu.style.animation = "desaparecer 2s";
        add.style.transform = "rotate(0deg)"

        menu.addEventListener("animationend", function () {
            menu.style.display = "none";

            location.reload();
        });

        contador = 0;
    }
}

function fechar() {
    funperfil.style.display = "none";
    contador = 0

}

function fildperfil() {


    contador++;

    if (contador === 1) {
      funperfil.style.display = "flex";
    } else if (contador === 2) {
      funperfil.style.display = "none";
      contador = 0
    }

  }