<section class="section-header">
  <div class="container">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="/assets/Logo.png" alt="Logo Alobien" class="logo-header img-fluid d-block m-auto">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link <?= $this->botonactivo == 1 ? 'active' : '' ?>" aria-current="page" href="/">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/page/nosotros">Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/page/servicios">Servicios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/page/galeria">Galería</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/page/contacto">Contáctenos</a>
              </li>
            </ul>
           
          </div>
        </div>
      </div>
    </nav>
  </div>

</section>