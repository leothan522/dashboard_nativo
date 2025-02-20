<!-- Login 8 - Bootstrap Brain Component -->
<section class="bg-light p-3 p-md-4 p-xl-5 position-relative" style="min-height: 100vh;">
    <div class="container  position-absolute top-50 start-50 translate-middle">
        <div id="scale" class="row justify-content-center">
            <div class="col-12 col-xxl-11">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0">
                        <div class="col-12 col-md-6 d-none d-lg-flex">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-fill" loading="lazy"
                                 src="<?php asset('img/logo_tecnologia.png'); ?>"
                                 alt="Welcome back you've been missed!">
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">

                                    <!--<img class="gobernacion_start d-sm-none" src="<?php /*asset('img/logo.svg'); */?>" alt="Logo Gobernacion">-->

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="text-center mb-2">
                                                <a href="<?= route('/') ?>">
                                                    <img class="img-fluid d-none d-lg-inline-flex <!--w-50-->"
                                                         src="<?php asset('img/logo.svg'); ?>"
                                                         alt="BootstrapBrain Logo">
                                                    <img class="img-fluid d-lg-none mt-5"
                                                         src="<?php asset('img/logo.svg'); ?>"
                                                         alt="BootstrapBrain Logo">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">


                                            <div class="d-flex gap-3 mb-3 flex-column">
                                                <h4 class="text-center">¡Bienvenido!</h4>
                                            </div>

                                            <div class="d-flex gap-3 flex-column mb-3">
                                                <a href="https://github.com/leothan522/dashboard_nativo.git" target="_blank" class="btn btn-lg btn-outline-dark">
                                                    <span class="ms-2 fs-6">Dashboard Navito utilizando PHP y Mysql</span>
                                                </a>
                                            </div>

                                            <div class="d-flex gap-3 flex-column mb-3 d-none">
                                                <?php include view_path('layouts.list_tecnologias')?>
                                            </div>

                                            <div class="d-flex gap-3 flex-column">
                                                <a href="<?= route('login'); ?>" class="btn btn-lg btn-outline-dark">

                                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
                                                    </svg>


                                                    <span class="ms-2 fs-6">Iniciar Sesión</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 text-center mt-5">
                                            <small class="link-secondary text-decoration-none">
                                                &copy; 2025 Dirección de Tecnología y Sistemas.
                                            </small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
