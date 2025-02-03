<script type="application/javascript">

    const btn_pruebas = document.querySelector('#btn_pruebas');

    btn_pruebas.addEventListener('click', event => {
       event.preventDefault();
       event.stopPropagation();
        confirmToastBootstrap('hola', "")
        console.log('Toast Show');
    });

    console.log('hi!');
</script>