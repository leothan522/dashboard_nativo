<script>

    function display(opcion = 'table') {
        verCargando('content_view_parametros');
        const form = document.querySelector('#row_div_form_parametros');
        const table = document.querySelector('#row_div_table_parametros');

        switch (opcion) {
            case 'form':
                table.classList.add('d-none');
                form.classList.remove('d-none');
                verCargando("content_view_parametros", false);
                break;

            case 'table':
                form.classList.add('d-none');
                table.classList.remove('d-none');
                verCargando("content_view_parametros", false);
                break;
            default:
                form.classList.add('d-none');
                table.classList.remove('d-none');
                verCargando("content_view_parametros", false);
                break;
        }
    }

    const form = document.querySelector('#form_parametros');
    form.addEventListener('submit', event => {
        event.preventDefault();
        event.stopPropagation();
        form.classList.add('was-validated');
        if (form.checkValidity()){
            verCargando('content_view_parametros');
            let url = "<?= route('parametro') ?>";
            ajaxRequest({ url: url, form: form }, function (data) {
                //acciones extras
                verCargando('content_view_parametros', false);
                if (data.ok){

                }else {

                }

            });
        }


    });

    function verMas() {
        const rows = document.querySelector('#total_rows_parametros');


    }


    console.log('Hi!')




</script>