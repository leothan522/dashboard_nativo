const colores = {
    success: "text-bg-success",
    info: "text-bg-info",
    error: "text-bg-danger",
    warning: "text-bg-warning"
};

/**
 * Envía notificaciones del sistema con un toast.
 *
 * Usando Toasts de Bootstrap 5
 * @param options
 */
function toastBootstrap(options = {}) {

    let html = '<div class="toast-container position-fixed p-3 top-0 start-50 translate-middle-x mt-5">' +
        '<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true"> ' +
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
        '</div>' +
        '</div>';

    document.getElementById('toastBootstrap').innerHTML = html;

    const toastLive = document.getElementById('liveToast');
    const toast = bootstrap.Toast.getOrCreateInstance(toastLive);

    const liveToastClass = document.getElementById('liveToastClass');
    const liveToastIcon = document.getElementById('liveToastIcon');
    const liveToastTitle = document.getElementById('liveToastTitle');
    const liveToasMessage = document.getElementById('liveToasMessage');
    const liveToastTime = document.getElementById('liveToastTime');

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
    liveToastTitle.textContent = title;
    liveToasMessage.textContent = message;

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

        *
        *
        *
        *
        *

        const form = document.querySelector("#form_prueba");
        const btnGuardar = document.querySelector("#btn_guardar");
        const btnCancelar = document.querySelector("#btn_calcelar");

        form.addEventListener('submit', event => {
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
            if (form.checkValidity()){
                btnGuardar.disabled = "disabled"
                verCargando("hola");
                let url = "<?= route('prueba') ?>";
                ajaxRequest({ url: url, form: form }, function (data) {
                    //acciones extras
                    btnGuardar.removeAttribute('disabled');
                    verCargando('hola', false);
                });
            }
        });


    *
    *-------------------------------------------------------------------
    * */

}

/**
 * Envía notificaciones del sistema con un toast Confirm.
 *
 * Usando Toasts de Bootstrap 5
 * @param options
 * @param callback
 */
function confirmToastBootstrap(callback, options = {}) {

    let html = '<div class="toast-container position-fixed p-3 top-50 start-50 translate-middle">' +
        '<div id="confirmToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">' +
        '<div class="toast-header" id="confirmToastClass"> ' +
        '<i class="fa-solid fa-question ms-2 me-2"></i> ' +
        '<strong class="me-auto">¿<span id="confirmToastTitle">Estas seguro</span>?</strong> ' +
        '<small class="d-none" id="confirmToastTime">11 mins ago</small> ' +
        '<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button> ' +
        '</div> ' +
        '<div class="toast-body"> ' +
        '<span id="confirmToastMessage">¡No podrás revertir esto!</span> ' +
        '<div class="d-flex mt-2 pt-2 border-top justify-content-between"> ' +
        '<button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="toast" id="confirmToastButtonText">¡Sí, bórralo!</button> ' +
        '<button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast" id="confirmToastCancelButtonText">Cancelar</button> ' +
        '</div> ' +
        '</div> ' +
        '</div>' +
        '</div>';

    document.getElementById('toastBootstrap').innerHTML = html;

    const toastConfirm = document.getElementById('confirmToast')
    const toast = bootstrap.Toast.getOrCreateInstance(toastConfirm);

    const confirmToastClass = document.getElementById('confirmToastClass');
    const confirmToastTitle = document.getElementById('confirmToastTitle');
    const confirmToastMessage = document.getElementById('confirmToastMessage');
    const confirmToastButtonText = document.getElementById('confirmToastButtonText');
    const confirmToastCancelButtonText = document.getElementById('confirmToastCancelButtonText');
    const confirmToastTime = document.getElementById('confirmToastTime');

    const color = options.color ? options.color : "text-bg-warning";
    let title = options.title ? options.title : "Estas seguro";
    let message = options.message ? options.message : "¡No podrás revertir esto!";
    let button = options.button ? options.button : "¡Sí, bórralo!";
    let close = options.close ? options.close : "Cancelar";

    confirmToastClass.classList.add(color);
    confirmToastTitle.textContent = title;
    confirmToastMessage.textContent = message;
    confirmToastButtonText.textContent = button;
    confirmToastCancelButtonText.textContent = close;

    toast.show();

    confirmToastButtonText.addEventListener('click', function () {
        callback();
    })

}

/**
 * Muestra un Spinner mientras Carga.
 *
 * require agregar con php la funcion verCargando()
 * @param id
 * @param show
 */
function verCargando(id, show = true) {
    let selector = document.querySelector('#' + id);
    if (selector){
        let spinner = document.querySelector("#" + id + " .verCargando");
        if (spinner){
            if (show){
                selector.classList.add('opacity-25');
                spinner.classList.remove('d-none');
            }else {
                selector.classList.remove('opacity-25');
                spinner.classList.add('d-none');
            }
        }else {
            console.log('Falta verCargando() dentro del elemento #' + id)
        }
    }else{
        console.log("id no encontrado: #" + id);
    }

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
