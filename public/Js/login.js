
const btnEnviar = document.getElementById('btnEnviar');
const error = document.getElementById('passError')
const labelAlertas = document.getElementById("passError");
let inputEmail;
let inputPassword;

btnEnviar.onclick = validador;

function validador() {
    labelAlertas.textContent = "";
    inputEmail = document.getElementById('correo').value;
    inputPassword = document.getElementById('pass').value;
    let cadena = String(inputPassword);
    let email = String(inputEmail);
    if (cadena.length <= 7) {
        labelAlertas.textContent = "Minimo 8 caracteres";
    } else {
        let resultado = sustitucion(cadena);
        let encriptado = operaciones(resultado);
        console.log(encriptado);
        //$(document).ready(function(){
        /* $.post('http://localhost/App-encriptador/index.php?controller=usuario&action=iniciarSesion', {
             "correo": email,
             "pass": encriptado
           },function(data) {
             console.log(data.estatus);
             if(data.estatus === 0){
                 labelAlertas.textContent = data.mensaje;
             }
         });*/
        datos = { "correo": email, "pass": encriptado };
        $.ajax({
            url: "http://localhost/App-encriptador/index.php?controller=usuario&action=iniciarSesion",
            type: "POST",
            data: datos
        }).done(function (data) {
            if (data) {
                var output = JSON.parse(data);
                if (output.estatus === 0) {
                    labelAlertas.textContent = output.mensaje;
                }
                if (output.estatus === 1) {
                    window.location.href = "http://localhost/App-encriptador/index.php?controller=usuario&action=inicioView";
                }
            }else{
                labelAlertas.textContent = "Error";
            }

        });
        //});

    }
}
//Sustituir valores para encriptar
function sustitucion(cadena) {
    let palabra = cadena.split("");
    let alfabeto = ["0", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "ñ", "o", "p", "q", "r", "s", "t", "u", "v", "x", "y", "z", "_"];
    let posicion;
    let arrayVacio = new Array();
    console.log(palabra);
    for (var a = 0; a < cadena.length; a++) {
        posicion = parseInt(alfabeto.indexOf(palabra[a].toLowerCase()));
        arrayVacio.push(posicion);
    }
    while (arrayVacio.length % 3 != 0) {
        arrayVacio.push(0);
    }
    return arrayVacio;
}

function operaciones(cadena) {
    let array1 = cadena;
    let matriz = [[1, 2, 1], [0, -1, 3], [2, 1, 0]];
    let resultado = null;
    let aux = 0;
    for (let b = 0; b < array1.length; b++) {
        for (let a = 0; a < matriz.length; a++) {
            aux = (matriz[0][a] * array1[b]) + (matriz[1][a] * array1[b + 1]) + (matriz[2][a] * array1[b + 2]);
            resultado = resultado + aux + " ";
        }
        b += 2;
    }
    return resultado;
}

