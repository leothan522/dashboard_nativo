/**
 * Envía notificaciones del sistema con un toast.
 *
 * Usando Toasts de Bootstrap 5
 * @param options
 */
function toastBootstrap(options = {}) {

    let html = '<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true"> ' +
        '<div class="toast-header" id="liveToastClass"> ' +
        '<span class="ms-2 me-3" id="liveToastIcon"> ' +
        '<i class="fa-regular fa-circle-exclamation"></i> ' +
        '</span> ' +
        '<strong class="me-auto" id="liveToastTitle">¡Éxito!</strong> ' +
        '<small class="d-none" id="liveToastTime">11 mins ago</small> ' +
        '<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button> ' +
        '</div> ' +
        '<div class="toast-body" id="liveToasMessage">' +
        'Hello, world! This is a toast message. ' +
        '</div> ' +
        '</div>';

    document.getElementById('toastBootstrap').innerHTML = html;

    const toastLive = document.getElementById('liveToast');
    const toast = bootstrap.Toast.getOrCreateInstance(toastLive);

    const liveToastClass = document.getElementById('liveToastClass');
    const liveToastIcon = document.getElementById('liveToastIcon');
    const liveToastTitle = document.getElementById('liveToastTitle');
    const liveToasMessage = document.getElementById('liveToasMessage');
    const liveToastTime = document.getElementById('liveToastTime');

    const colores = {
        success: "text-bg-success",
        info: "text-bg-info",
        error: "text-bg-danger",
        warning: "text-bg-warning"
    };

    const iconos = {
        success: '<i class="fa-solid fa-check"></i>',
        info: '<i class="fa-solid fa-info"></i>',
        error: '<i class="fa-regular fa-triangle-exclamation"></i>',
        warning: '<i class="fa-regular fa-circle-exclamation"></i>'
    };

    const titulos = {
        success: "¡Éxito!",
        info: "Información",
        error: "¡Error!",
        warning: "¡Alerta!"
    };

    let type = options.toast ? options.toast : "success";

    let color = options.color ? colores[options.color] : colores[type];
    let icon = options.icon ? iconos[options.icon] : iconos[type];
    let title = options.title ? options.title : titulos[type];
    let message = options.message ? options.message : "Datos Guardados.";
    let noToast = options.noToast ? options.noToast : false;

    liveToastClass.classList.add(color);
    liveToastIcon.innerHTML = icon;
    liveToastTitle.innerHTML = title;
    liveToasMessage.innerHTML = message;

    if (!noToast) {
        toast.show()
    }

}

/**
 * Fetch: Peticiones Asíncronas.
 *
 * realizar peticiones HTTP asíncronas utilizando promesas.
 * @param options
 * @param callback
 */
function ajaxRequest(options, callback) {

    //Valores por defecto
    let url = options.url ? options.url : "/";
    let method = options.method ? options.method : "POST";
    let data = options.data ? options.data : null;
    let form = options.form ? options.form : null;
    let type = options.response ? options.response : "json";

    let withData;

    if (data !== null) {
        if (form !== null) {
            withData = new FormData(form);
        } else {
            withData = new FormData();
        }
        Object.entries(data).forEach(([key, value]) => {
            withData.append(key, value);
        });
    } else {
        withData = new FormData(form);
    }

    const option = {
        method: method,
        body: withData
    }

    if (type === "json") {

        fetch(url, option)
            .then(response => response.json())
            .then(data => {
                toastBootstrap(data);
                callback(data);
            })
            .catch(error => {
                // Si hay un error en la petición, lo manejamos aqui
                toastBootstrap({
                    type: "error",
                    message: error
                });
            });

    } else {

        fetch(url, option)
            .then(response => response.text())
            .then(data => callback(data))
            .catch(error => {
                // Si hay un error en la petición, lo manejamos aqui
                toastBootstrap({
                    type: "error",
                    message: error
                })
            });

    }


    /*
    * Ejemplo de Uso:
    *-------------------------------------------------------------------
        let form = document.getElementById("form_prueba");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            let url = "<?= route('prueba') ?>";
            ajaxRequest({ url: url, form: form }, function (data) {
                //acciones extras
            });
        });
    *-------------------------------------------------------------------
    * */

}


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
