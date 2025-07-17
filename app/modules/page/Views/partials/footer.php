<section class="footer-section">
  <div class="container">
    <div class="row gap-3 gap-lg-0">
      <div class="col-12 col-lg-2">
        <img src="/assets/LogoFooter.png" alt="Logo Alobien" class="img-fluid d-block m-auto">
      </div>
      <div class="col-12 col-lg-4">
        <h5><strong>Subscribe now</strong> <span> for more information</span></h5>
        <form action="/page/index/enviarsub" class="formulario-footer" method="post" id="form-contact">
          <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
          <input type="number" name="phone" class="form-control mb-2" placeholder="Phone" required>

          <input type="hidden" name="company" class="form-control mb-2" placeholder="Company">
          <input name="hash" type="hidden" value="<?php echo md5(date("Y-m-d")); ?>" />

          <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>

          <div class="g-recaptcha mb-2" data-sitekey="6LfFDZskAAAAAE2HmM7Z16hOOToYIWZC_31E61Sr"></div>

          <input type="submit" id="submit-btn" class="btn-amarillo" value="Send >>">
        </form>
      </div>
      <div class="col-12 col-lg-3 text-center text-lg-start">
        <h5>Contact Us</h5>
        <div class="info">
          <?php if ($this->infopage->info_pagina_telefono) { ?>
            <span class="info-footer d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
              <i class="fa-solid fa-mobile-screen-button"></i>
              <?php echo $this->infopage->info_pagina_telefono ?>
            </span>
          <?php } ?>
          <?php if ($this->infopage->info_pagina_correos_contacto) { ?>
            <span class="info-footer d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
              <i class="fa-regular fa-envelope"></i>
              <?php echo $this->infopage->info_pagina_correos_contacto ?>
            </span>
          <?php } ?>
          <?php if ($this->infopage->info_pagina_direccion_contacto) { ?>
            <span class="info-footer d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
              <i class="fa-solid fa-location-dot"></i>
              <?php echo $this->infopage->info_pagina_direccion_contacto ?>
            </span>
          <?php } ?>
        </div>

      </div>
      <div class="col-12 col-lg-3 text-center text-lg-start">
        <h5>Follow us on</h5>
        <div class="icons-redes d-grid gap-1 gap-lg-3">

          <?php if ($this->infopage->info_pagina_youtube) {
            $youtube_data = $this->parseSocialLink($this->infopage->info_pagina_youtube);
            if (!empty($youtube_data['url'])) { ?>
              <a href="<?php echo $youtube_data['url']; ?>" target="_blank" class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
                <i class="fa-brands fa-youtube"></i>
                <?php echo !empty($youtube_data['user']) ? $youtube_data['user'] : $youtube_data['url']; ?>
              </a>
          <?php }
          } ?>

          <?php if ($this->infopage->info_pagina_instagram) {
            $instagram_data = $this->parseSocialLink($this->infopage->info_pagina_instagram);
            if (!empty($instagram_data['url'])) { ?>
              <a href="<?php echo $instagram_data['url']; ?>" target="_blank" class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
                <i class="fa-brands fa-instagram"></i>
                <?php echo !empty($instagram_data['user']) ? $instagram_data['user'] : $instagram_data['url']; ?>
              </a>
          <?php }
          } ?>

          <?php if ($this->infopage->info_pagina_facebook) {
            $facebook_data = $this->parseSocialLink($this->infopage->info_pagina_facebook);
            if (!empty($facebook_data['url'])) { ?>
              <a href="<?php echo $facebook_data['url']; ?>" target="_blank" class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
                <i class="fa-brands fa-facebook-f"></i>
                <?php echo !empty($facebook_data['user']) ? $facebook_data['user'] : ''; ?>
              </a>
          <?php }
          } ?>

          <?php if ($this->infopage->info_pagina_linkedin) {
            $linkedin_data = $this->parseSocialLink($this->infopage->info_pagina_linkedin);
            if (!empty($linkedin_data['url'])) { ?>
              <a href="<?php echo $linkedin_data['url']; ?>" target="_blank" class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
                <i class="fa-brands fa-linkedin-in"></i>
                <?php echo !empty($linkedin_data['user']) ? $linkedin_data['user'] : ''; ?>
              </a>
          <?php }
          } ?>

          <?php if ($this->infopage->info_pagina_x) {
            $x_data = $this->parseSocialLink($this->infopage->info_pagina_x);
            if (!empty($x_data['url'])) { ?>
              <a href="<?php echo $x_data['url']; ?>" target="_blank" class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
                <i class="fa-brands fa-x-twitter"></i>
                <?php echo !empty($x_data['user']) ? $x_data['user'] : $x_data['url']; ?>
              </a>
          <?php }
          } ?>

          <?php if ($this->infopage->info_pagina_pinterest) {
            $pinterest_data = $this->parseSocialLink($this->infopage->info_pagina_pinterest);
            if (!empty($pinterest_data['url'])) { ?>
              <a href="<?php echo $pinterest_data['url']; ?>" target="_blank" class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
                <i class="fa-brands fa-pinterest-p"></i>
                <?php echo !empty($pinterest_data['user']) ? $pinterest_data['user'] : ''; ?>
              </a>
          <?php }
          } ?>

          <?php if ($this->infopage->info_pagina_flickr) {
            $flickr_data = $this->parseSocialLink($this->infopage->info_pagina_flickr);
            if (!empty($flickr_data['url'])) { ?>
              <a href="<?php echo $flickr_data['url']; ?>" target="_blank" class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
                <i class="fa-brands fa-flickr"></i>
                <?php echo !empty($flickr_data['user']) ? $flickr_data['user'] : ''; ?>
              </a>
          <?php }
          } ?>

          <?php if ($this->infopage->info_pagina_tiktok) {
            $tiktok_data = $this->parseSocialLink($this->infopage->info_pagina_tiktok);
            if (!empty($tiktok_data['url'])) { ?>
              <a href="<?php echo $tiktok_data['url']; ?>" target="_blank" class="d-flex gap-2 align-items-center justify-content-center justify-content-lg-start">
                <i class="fa-brands fa-tiktok"></i>
                <?php echo !empty($tiktok_data['user']) ? $tiktok_data['user'] : ''; ?>
              </a>
          <?php }
          } ?>

        </div>
      </div>
      <div class="col-12">
        <hr>
        <span class="text-center d-block">
          &copy;All Rights Reserved Filsa <?php echo date('Y'); ?> - Designed by <a href="https://omegasolucionesweb.com" target="_blank" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-50-hover">
            Omega Soluciones Web
          </a>
        </span>
      </div>
    </div>
  </div>
</section>