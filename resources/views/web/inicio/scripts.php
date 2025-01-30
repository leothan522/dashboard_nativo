<script type="application/javascript">
    const boton = document.querySelector('#btn_logout');

    boton.addEventListener('click', event => {
        event.preventDefault();
        event.stopPropagation();
        toastBootstrap();
    })


    console.log('hola h');
</script>
