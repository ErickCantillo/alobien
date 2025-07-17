<div class="caja-contenido-simple design-five five-<?php echo $contenido->contenido_id; ?>" style="<?php if($contenido->contenido_borde == '1'){echo ' border: 2px solid #13436B; border-radius:20px;  overflow: hidden; ';} ?>">
    <div class="p-3" style=" background: url(/images/<?php echo $contenido->contenido_fondo_imagen; ?>); <?php echo 'background-color: '.$contenido->contenido_fondo_color.' ; '; ?>">
        <?php if($contenido->contenido_imagen){ ?>
      <img src="/images/<?php echo $contenido->contenido_imagen; ?>" class="img-fluid">
        <?php } ?>
        <div class="fondo-gris">
            <?php if($contenido->contenido_titulo_ver == 1){ ?>
          <h2><?php echo $contenido->contenido_titulo; ?></h2>
            <?php } ?>
            <div class="descripcion"><?php echo $contenido->contenido_descripcion; ?></div>
            <?php if($contenido->contenido_enlace){ ?>
                <div class="boton-crediciti">
                    <a href="<?php echo $contenido->contenido_enlace; ?>" <?php if($contenido->contenido_enlace_abrir == 1){ ?> target="_blank" <?php } ?>   class="btn btn-vermas"> <?php if( $contenido->contenido_vermas){ ?><?php echo $contenido->contenido_vermas; ?><?php } else { ?>Ver Más<?php } ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
