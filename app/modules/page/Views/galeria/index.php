<style>
  header {
    position: sticky;
    background-color: #FFF;
    border-bottom: 1px solid var(--gris-claro);
  }

  body {
    height: auto;
  }
</style>
<?php
echo $this->banner;
?>
<div class="contenido-galeria contenido-interna">
  <?php
  echo $this->contenido;
  ?>
</div>

<div class="container contenedor-galeria mt-3">
  <div class="masonry-gallery" id="masonryGallery">
    <div class="masonry-column"></div>
    <div class="masonry-column"></div>
    <div class="masonry-column"></div>
  </div>

  <!-- Items ocultos que se distribuirán por JavaScript -->
  <div class="masonry-items-hidden" style="display: none;">
    <?php foreach ($this->albumes as $index => $album) { ?>
      <div class="masonry-item" data-album-id="<?= $album->album_id ?>">
        <?php

        $album_imagen_path = IMAGE_PATH . $album->album_imagen;
        $album_imagen_src = (file_exists($album_imagen_path) && $album->album_imagen) ? '/images/' . $album->album_imagen : '/assets/albumstock.jpg';
        ?>
        <a data-fancybox="gallery<?= $album->album_id ?>" data-src="<?= $album_imagen_src ?>"
          data-caption="<?= $album->album_descripcion ?>">
          <img src="<?= $album_imagen_src ?>" class="img-fluid portada"
            alt="Portada album <?= $album->album_nombre ?> " />
        </a>
        <?php foreach ($album->fotos as $foto) { ?>
          <?php

          $foto_path = IMAGE_PATH . $foto->fotos_foto;
          $foto_src = file_exists($foto_path) ? '/images/' . $foto->fotos_foto : '/assets/fotostock.jpg';
          ?>
          <a data-fancybox="gallery<?= $album->album_id ?>" data-src="<?= $foto_src ?>"
            data-caption="<?= $foto->fotos_descripcion ?>" class="d-none">
            <img src="<?= $foto_src ?>" class="img-fluid imagen" alt="Imagen <?= $foto->fotos_titulo ?>  " />
          </a>
        <?php } ?>
        <h5 class="mt-2 titulo-album"><?= $album->album_nombre ?></h5>
      </div>

    <?php } ?>
  </div>

  <!-- Paginación -->
  <?php if ($this->totalPages > 1) { ?>
    <div class="mt-1">
      <!-- Información de paginación -->
      <div class="pagination-info text-center mb-3">
        <small class="text-muted">
          Mostrando <?= $this->startItem ?> - <?= $this->endItem ?> de <?= $this->totalItems ?> álbumes
        </small>
      </div>

      <nav aria-label="Paginación de galería">
        <ul class="pagination justify-content-center">
          <?php if ($this->page > 1) { ?>
            <li class="page-item">
              <a class="page-link" href="?page=<?= $this->page - 1 ?>">
                <i class="fas fa-chevron-left"></i> Anterior
              </a>
            </li>
          <?php } ?>

          <?php for ($i = 1; $i <= $this->totalPages; $i++) { ?>
            <li class="page-item <?= ($this->page == $i) ? 'active' : '' ?>">
              <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
          <?php } ?>

          <?php if ($this->page < $this->totalPages) { ?>
            <li class="page-item">
              <a class="page-link" href="?page=<?= $this->page + 1 ?>">
                Siguiente <i class="fas fa-chevron-right"></i>
              </a>
            </li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  <?php } ?>

</div>

<!--
80212302
 t3267702


80212305
 t3267705

-->