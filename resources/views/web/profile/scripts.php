<script type="application/javascript">
    const form = document.querySelector('#form_datos_profile');
    const input_perfil_password = document.querySelector('#input_perfil_password');
    const error_input_perfil_password = document.querySelector('#error_input_perfil_password');
    const input_name = document.querySelector('#input_name');
    const error_input_name = document.querySelector('#error_input_name');
    const input_email = document.querySelector('#input_email');
    const error_input_email = document.querySelector('#error_input_email');

    const span_card_profile_name = document.querySelector('#span_card_profile_name');
    const span_card_profile_email = document.querySelector('#span_card_profile_email');

    form.addEventListener("submit", event => {
        event.preventDefault();
        event.stopPropagation();

        form.classList.add('was-validated');
        if (form.checkValidity()){
            verCargando('form_datos');
            verCargando('card_datos');
            let url = '<?= route('web/profile') ?>';
            ajaxRequest({ url: url, form: form }, function (data) {
                verCargando('form_datos', false);
                verCargando('card_datos', false);
                if (data.ok){
                    resetForm(data);

                    span_card_profile_name.innerText = data.name;
                    span_card_profile_email.innerText = data.email;
                }else {
                    form.classList.remove('was-validated');
                    let errors = data.errors;

                    if (errors.password){
                        input_perfil_password.classList.add('is-invalid');
                        error_input_perfil_password.textContent = errors.password;
                    }else{
                        input_perfil_password.classList.remove('is-invalid');
                        input_perfil_password.classList.add('is-valid');
                    }

                    if (errors.name){
                        input_name.classList.add('is-invalid');
                        error_input_name.textContent = errors.name;
                    }else {
                        input_name.classList.remove('is-invalid');
                        input_name.classList.add('is-valid');
                    }

                    if (errors.email){
                        input_email.classList.add('is-invalid');
                        error_input_email.textContent = errors.email;
                    }else {
                        input_email.classList.remove('is-invalid');
                        input_email.classList.add('is-valid');
                    }

                }

            });
        }
    });

    function resetForm(data) {
        form.classList.remove('was-validated');
        input_name.value = data.name;
        input_email.value = data.email;
        input_perfil_password.value = '';
    }

</script>
