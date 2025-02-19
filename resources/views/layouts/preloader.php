<style>
    /* styles.css */
    #preloader {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: #fff no-repeat center center;
        z-index: 9999;
    }

    #preloader::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100px;
        height: 100px;
        background: url('<?php asset('img/preloader_171x171.png'); ?>') no-repeat center center;
        background-size: contain;
        transform: translate(-50%, -50%);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: translate(-50%, -50%) scale(1);
        }
        50% {
            transform: translate(-50%, -50%) scale(1.2);
        }
        100% {
            transform: translate(-50%, -50%) scale(1);
        }
    }

</style>
<script type="application/javascript">
    //Script para ejecurar el preloader
    window.addEventListener('load', function() {
        document.querySelector('#preloader').style.display = 'none';
        document.querySelector('.container').style.display = 'block';
    });
</script>