/**
 * Obtiene el tipo de un objeto dado.
 *
 * @return {string} strResultado: cadena descriptiva del tipo de objeto.
 * @param objParam
 */

function getType(objParam) {
    var strResultado = "";
    strTipo = Object.prototype.toString.call(objParam);

    switch (strTipo) {
        case "[object String]":
            strResultado = "string";
            break;

        case "[object Number]":
            strResultado = "number";
            break;

        case "[object Boolean]":
            strResultado = "boolean";
            break;

        case "[object Array]":
            strResultado = "array";
            break;

        case "[object Null]":
            strResultado = "null";
            break;

        case "[object Object]":
            strResultado = "object";
            break;

        case "[object Undefined]":
            strResultado = "undefined";
            break;

        default:
            strResultado = "error";
            break;
    }

    return strResultado;
}

console.log('app.js');
