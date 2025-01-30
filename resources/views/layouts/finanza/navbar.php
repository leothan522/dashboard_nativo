<nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
        <h1 class="display-5 text-primary m-0 text-uppercase"><?= env('app_name', 'Finanza') ?></h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.html" class="nav-item nav-link active">Home</a>
            <a href="about.html" class="nav-item nav-link">About</a>
            <a href="service.html" class="nav-item nav-link">Services</a>
            <a href="contact.html" class="nav-item nav-link">Contact</a>
            <!--<div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu border-light m-0">
                    <a href="project.html" class="dropdown-item">Projects</a>
                    <a href="feature.html" class="dropdown-item">Features</a>
                    <a href="team.html" class="dropdown-item">Team Member</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a>
                </div>
            </div>-->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle text-capitalize" data-bs-toggle="dropdown"><?= \app\Providers\Auth::user()->name ?></a>
                <div class="dropdown-menu border-light m-0">
                    <a href="<?= route('profile') ?>" class="dropdown-item">Perfil <span class="float-end"><i class="fas fa-user text-primary"></i></span></a>
                    <a href="<?= route('logout') ?>" class="dropdown-item">Salir <span class="float-end"><i class="fas fa-sign-out-alt text-primary"></i></span></a>

                </div>
            </div>

        </div>
        <div class="d-none d-lg-flex ms-2">
            <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                <small class="fab fa-facebook-f text-primary"></small>
            </a>
            <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                <small class="fab fa-twitter text-primary"></small>
            </a>
            <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                <small class="fab fa-linkedin-in text-primary"></small>
            </a>
        </div>
    </div>
</nav>