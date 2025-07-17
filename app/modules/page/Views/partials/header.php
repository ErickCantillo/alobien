<section class="section-header">
  <div class="container">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="/assets/Logo.png" alt="Logo Alobien" class="logo-header img-fluid d-block m-auto">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body gap-3">
            <ul class="navbar-nav justify-content-between flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link <?= $this->botonactivo == 1 ? 'active' : '' ?>" aria-current="page"
                  href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  <?= $this->botonactivo == 2 ? 'active' : '' ?>" href="/page/nosotros">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  <?= $this->botonactivo == 3 ? 'active' : '' ?>" href="/page/servicios">Services</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link <?= $this->botonactivo == 4 ? 'active' : '' ?>" href="/page/galeria">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  <?= $this->botonactivo == 5 ? 'active' : '' ?>"
                  href="/page/contacto">Contact Us</a>
              </li>
            </ul>
            <div class="info-no-home" id="info-no-home">

              <section class="d-grid justify-content-start justify-content-lg-end gap-1">
                <div class="d-md-grid d-xl-flex gap-3 align-items-center justify-content-start justify-content-lg-end">
                  <span class="info-header correo ">
                    <?php if ($this->infopage->info_pagina_correos_contacto) { ?>
                      <span class="info-footer d-flex gap-1 align-items-center ">
                        <i class="fa-regular fa-envelope"></i>
                        <?php echo $this->infopage->info_pagina_correos_contacto ?>
                      </span>
                    <?php } ?>
                  </span>
                </div>

                <div class="d-md-grid d-xl-flex gap-1 gap-xl-2 align-items-center justify-content-start justify-content-lg-end">
                  <span class="info-header correo ">
                    <?php if ($this->infopage->info_pagina_direccion_contacto) { ?>
                      <span class="info-footer d-flex gap-1 align-items-center justify-content-start justify-content-lg-end">
                        <i class="fa-solid fa-location-dot"></i>
                        <?php echo $this->infopage->info_pagina_direccion_contacto ?>
                      </span>
                    <?php } ?>
                  </span>
                  <div class="vr d-none d-xl-inline"></div>
                  <span class="info-header correo ">
                    <?php if ($this->infopage->info_pagina_telefono) { ?>
                      <span class="info-footer d-flex gap-1 align-items-center">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                        <?php echo $this->infopage->info_pagina_telefono ?>
                      </span>
                    <?php } ?>
                  </span>
                </div>

                <div class="d-flex gap-2 align-items-center ustify-content-start justify-content-lg-end">
                  <h6 class="m-0 ">Follow us on</h6>
                  <div class="icons-redes d-flex gap-1">

                    <?php if ($this->infopage->info_pagina_youtube) {
                      $youtube_data = $this->parseSocialLink($this->infopage->info_pagina_youtube);
                      if (!empty($youtube_data['url'])) { ?>
                        <a href="<?php echo $youtube_data['url']; ?>" target="_blank"
                          class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
                          <i class="fa-brands fa-youtube"></i>

                        </a>
                    <?php }
                    } ?>

                    <?php if ($this->infopage->info_pagina_instagram) {
                      $instagram_data = $this->parseSocialLink($this->infopage->info_pagina_instagram);
                      if (!empty($instagram_data['url'])) { ?>
                        <a href="<?php echo $instagram_data['url']; ?>" target="_blank"
                          class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
                          <i class="fa-brands fa-instagram"></i>

                        </a>
                    <?php }
                    } ?>

                    <?php if ($this->infopage->info_pagina_facebook) {
                      $facebook_data = $this->parseSocialLink($this->infopage->info_pagina_facebook);
                      if (!empty($facebook_data['url'])) { ?>
                        <a href="<?php echo $facebook_data['url']; ?>" target="_blank"
                          class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
                          <i class="fa-brands fa-facebook-f"></i>

                        </a>
                    <?php }
                    } ?>

                    <?php if ($this->infopage->info_pagina_linkedin) {
                      $linkedin_data = $this->parseSocialLink($this->infopage->info_pagina_linkedin);
                      if (!empty($linkedin_data['url'])) { ?>
                        <a href="<?php echo $linkedin_data['url']; ?>" target="_blank"
                          class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
                          <i class="fa-brands fa-linkedin-in"></i>

                        </a>
                    <?php }
                    } ?>

                    <?php if ($this->infopage->info_pagina_x) {
                      $x_data = $this->parseSocialLink($this->infopage->info_pagina_x);
                      if (!empty($x_data['url'])) { ?>
                        <a href="<?php echo $x_data['url']; ?>" target="_blank"
                          class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
                          <i class="fa-brands fa-x-twitter"></i>

                        </a>
                    <?php }
                    } ?>

                    <?php if ($this->infopage->info_pagina_pinterest) {
                      $pinterest_data = $this->parseSocialLink($this->infopage->info_pagina_pinterest);
                      if (!empty($pinterest_data['url'])) { ?>
                        <a href="<?php echo $pinterest_data['url']; ?>" target="_blank"
                          class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
                          <i class="fa-brands fa-pinterest-p"></i>

                        </a>
                    <?php }
                    } ?>

                    <?php if ($this->infopage->info_pagina_flickr) {
                      $flickr_data = $this->parseSocialLink($this->infopage->info_pagina_flickr);
                      if (!empty($flickr_data['url'])) { ?>
                        <a href="<?php echo $flickr_data['url']; ?>" target="_blank"
                          class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
                          <i class="fa-brands fa-flickr"></i>

                        </a>
                    <?php }
                    } ?>

                    <?php if ($this->infopage->info_pagina_tiktok) {
                      $tiktok_data = $this->parseSocialLink($this->infopage->info_pagina_tiktok);
                      if (!empty($tiktok_data['url'])) { ?>
                        <a href="<?php echo $tiktok_data['url']; ?>" target="_blank"
                          class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
                          <i class="fa-brands fa-tiktok"></i>

                        </a>
                    <?php }
                    } ?>
                    <?php if ($this->infopage->info_pagina_whatsapp) { ?>
                      <a href="https://wa.me/<?php echo $this->infopage->info_pagina_whatsapp ?>?text=Hello%20I%20would%20like%20to%20get%20more%20information"
                        target="_blank" class="info-footer whatsapp d-flex gap-1 align-items-center ">
                        <i class="fa-brands fa-whatsapp"></i>
                      </a>
                    <?php } ?>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
</section>