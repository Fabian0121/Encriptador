
const buttonEncriptar = document.getElementById("encriptar");
const labelAlertas = document.getElementById("alertas");
const labelTitulos = document.getElementById("tittle-results");
const labelResultados = document.getElementById("results");

let inputMessagge;
let alfabeto = ["0", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "ñ", "o", "p", "q", "r", "s", "t", "u", "v", "x", "y", "z", "_"];

buttonEncriptar.onclick = pruebas;

function pruebas() {
    labelAlertas.textContent = null;
    labelResultados.textContent = null,
    labelTitulos.textContent = null;
    inputMessagge = document.getElementById("mensaje").value;
    let cadena = String(inputMessagge);
    cadena = cadena.replace(/\s/gi, "0");
    let regex = /^([A-Za-z-0])/g;
    if (cadena.length <= 0) {
        labelAlertas.style.color = "red";
        labelAlertas.textContent = "Ingresa un valor valido";
    }
    else
        if (regex.test(cadena) != true) {
            labelAlertas.style.color = "red";
            labelAlertas.textContent = "Ingresa solamente alfabeto";
        }
        else {
            labelAlertas.style.color = "green";
            labelAlertas.textContent = "Datos correctos";
            //Sustitucion de valores por numeros
            let resultado = sustitucion(cadena, alfabeto);
            console.log(resultado);
            operaciones(resultado);
        }
}

function sustitucion(cadena, alfabeto) {
    let palabra = cadena.split("");
    let alfabeto1 = alfabeto;
    let posicion;
    let arrayVacio = new Array();
    console.log(palabra);
    for (var a = 0; a < cadena.length; a++) {
        posicion = parseInt(alfabeto1.indexOf(palabra[a].toLowerCase()));
        arrayVacio.push(posicion);
    }
    while(arrayVacio.length % 3 != 0)
    {
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
        for(let a = 0; a < matriz.length; a++)
        {
            aux = (matriz[0][a] * array1[b]) + (matriz[1][a] * array1[b + 1]) + (matriz[2][a] * array1[b + 2]);
            resultado = resultado + aux + " ";
        }
        b+=2;
    }
    mensajes(resultado);
    
}

function mensajes(cadena)
{
    var resulados = cadena;
    //Titulo
    labelTitulos.color = "black";
    labelTitulos.textContent = "Resultados de: "+ inputMessagge;
    //Mensaje
    labelResultados.color = "black";
    labelResultados.textContent = resulados;

}