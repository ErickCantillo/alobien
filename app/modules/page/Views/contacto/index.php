<style>
  header {
    position: sticky;
    background-color: #FFF;
    border-bottom: 1px solid var(--gris-claro);
  }

  body {
    height: auto;
  }


  .main-general {
    /* margin-top: 130px; */
  }
</style>
<?php echo $this->banner ?>
<div class="contenido-contacto contenido-interna">
  <?php echo $this->contenido ?>
</div>

<!-- Contact Form -->
<div class="container contenedor-contacto">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-6 order-2 order-lg-1">
      <div class="card shadow-lg">
        <div class="card-header bg-azul text-white">
          <h4 class="mb-0">Contact form</h4>
        </div>
        <div class="card-body">
          <form action="/page/contacto/enviarcontacto" method="post" id="form-contacto">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Full name *</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter your full name"
                    required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="phone" class="form-label">Phone *</label>
                  <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter your phone number"
                    required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="email" class="form-label">Email *</label>
                  <input type="email" name="email" class="form-control" id="email"
                    placeholder="Enter your email" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="reason" class="form-label">Reason for inquiry *</label>
                  <select name="reason" class="form-control" id="reason" required>
                    <option value="">Select a reason</option>
                    <option value="Consulta general">General inquiry</option>
                    <option value="Solicitud de información">Information request</option>
                    <!-- <option value="Soporte técnico">Technical support</option> -->
                    <option value="Sugerencia">Suggestion</option>
                    <option value="Otro">Other</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="message" class="form-label">Message *</label>
              <textarea name="message" class="form-control" id="message" rows="5"
                placeholder="Write your message here..." required></textarea>
            </div>

            <!-- Campo honeypot oculto -->
            <input type="hidden" name="company" class="form-control" placeholder="Company">
            <input name="hash" type="hidden" value="<?php echo md5(date("Y-m-d")); ?>" />
            <div class="mb-3 d-flex gap-2 align-items-center">
              <input type="checkbox" required name="privacy" id="privacy">
              <label for="privacy" data-bs-toggle="modal" data-bs-target="#modalPoliticas" role="button">I accept the
                privacy policy</label>
            </div>

            <div class="g-recaptcha mb-3" data-sitekey="6LfFDZskAAAAAE2HmM7Z16hOOToYIWZC_31E61Sr"></div>

            <div class="d-flex justify-content-center">
              <button type="submit" id="submit-btn-contacto" class="btn-azul">
                Send Message
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-6 order-1 order-lg-2">
      <div>
        <?= $this->infopage->info_pagina_informacion_contacto ?>
      </div>
    </div>

  </div>
</div>
<div class="modal fade modalPoliticas" id="modalPoliticas" tabindex="-1" aria-labelledby="modalPoliticasLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <?php echo $this->infopage->info_pagina_titulo_legal ?>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-white pb-1">

        <?php echo $this->infopage->info_pagina_descripcion_legal ?>
      </div>
      <div class="modal-footer bg-white border-0 pt-0">
        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary d-none">Save changes</button>
      </div>
    </div>
  </div>
</div>