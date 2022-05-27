const btnEnviar = document.getElementById('btnEnviar');
const error = document.getElementById('passError');

var inputnombre;
var inputapellidoP;
var inputapellidoM;
var inputcorreo;
var inputpass1;
var inputpass2;

btnEnviar.onclick = registrar;

function registrar() {
    error.textContent = "";
    inputnombre = String(document.getElementById('nombre').value);
    inputapellidoP = String(document.getElementById('apellidoP').value);
    inputapellidoM = String(document.getElementById('apellidoM').value);
    inputcorreo = String(document.getElementById('correo').value);
    inputpass1 = String(document.getElementById('pass1').value);
    inputpass2 = String(document.getElementById('pass2').value);
    let a = inputpass1.split('');
    let b = inputpass2.split('');
    let ipass1 = a.filter(element => element > 0);
    let ipass2 = b.filter(element => element > 0);
    console.log(b);
    if ((inputnombre == null || inputnombre.length < 2) || (inputapellidoP == null || inputapellidoP.length < 2) || (inputapellidoM == null || inputapellidoM.length < 2) || (inputcorreo == null || inputcorreo.length < 2)) {
        error.textContent = "Revisa los campos minimo 4 caracteres por campo";
    } else {
        if (ipass1 > 0 || inputpass1.length <= 7 || ipass2 > 0 || inputpass2.length <= 7) {
            error.textContent = "Revisa las contraseñas minimo 8 caracterse y solo 'LETRAS'";
        } else {
            //pass1
            let pass1 = sustitucion(inputpass1);
            let encriptado1 = operaciones(pass1);
            //pass2
            let pass2 = sustitucion(inputpass2);
            let encriptado2 = operaciones(pass2);
            //Envio de datos por ajaz
            datos = { "nombre": inputnombre, "apellidoP": inputapellidoP, "apellidoM": inputapellidoM, "correo": inputcorreo, "pass1": encriptado1, "pass2": encriptado2 };
            $.ajax({
                url: "http://localhost/App-encriptador/index.php?controller=usuario&action=crearRegistro",
                type: "POST",
                data: datos
            }).done(function (data) {
                if (data) {
                    console.log(data);
                    var output = JSON.parse(data);
                    console.log(output.mensaje);
                    if (output.estatus === 0) {
                        error.textContent = output.mensaje;
                    }
                    if (output.estatus === 1) {
                        window.location.href = "http://localhost/App-encriptador/index.php?controller=usuario&action=loginView";
                    }
                } else {
                    error.textContent = "Error";
                }

            });
        }
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
//operaciones para realizar el encriptado
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