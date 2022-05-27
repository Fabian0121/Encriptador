class Operaciones {
    
    constructor() {
        let alfabeto = ["0", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "ñ", "o", "p", "q", "r", "s", "t", "u", "v", "x", "y", "z", "_"];
    }
    //
    pruebas(){
        alert("hola");
    }
    //Sustituir valores para encriptar
    sustitucion(cadena) {
        let palabra = cadena.split("");
        let alfabeto1 = this.alfabeto;
        let posicion;
        let arrayVacio = new Array();
        console.log(palabra);
        for (var a = 0; a < cadena.length; a++) {
            posicion = parseInt(alfabeto1.indexOf(palabra[a].toLowerCase()));
            arrayVacio.push(posicion);
        }
        while (arrayVacio.length % 3 != 0) {
            arrayVacio.push(0);
        }
        return arrayVacio;
    }

    operaciones(cadena) {
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
        return resultado;
    }
}