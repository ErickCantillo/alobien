<style>
  header {
    position: sticky;
    background-color: #FFF;
    border-bottom: 1px solid var(--gris-claro);
  }

  .main-general {
    /* margin-top: 130px; */
  }
</style>
<?php
echo $this->banner;
?>

<?php
echo $this->contenido;
?>

<?php
// echo "<pre>";

// print_r($this->albumes);
// echo "</pre>";

?>
<div class="container contenedor-galeria mt-3">
  <div class="row">

    <?php foreach ($this->albumes as $album) { ?>
      <div class="col col-12 col-md-6 col-lg-4">
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


<style>
  .main-general {
    background-color: #f7f7f7;
  }

  .fancybox__nav {
    /* position: absolute !important; */
    position: static;
  }

  .contenedor-galeria * {
    /* position: unset !important; */
  }

  /* Estilos para paginación */
  .pagination {
    margin-top: 2rem;
    flex-wrap: wrap;
  }

  .pagination .page-link {
    color: #6c757d;
    border: 1px solid #dee2e6;
    padding: 0.5rem 0.75rem;
    margin: 0.125rem;
    border-radius: 0.25rem;
    transition: all 0.3s ease;
    font-size: 0.875rem;
  }

  /* Responsive para paginación */
  @media (max-width: 768px) {
    .pagination .page-link {

      font-size: 1rem;
      margin: 0.0625rem;
    }

    .pagination .page-item:not(.active):not(:first-child):not(:last-child) {
      display: none;
    }

    .pagination .page-item.active,
    .pagination .page-item:first-child,
    .pagination .page-item:last-child {
      display: inline-block;
    }

    /* Mostrar algunas páginas cercanas en móvil */
    .pagination .page-item.active+.page-item,
    .pagination .page-item.active+.page-item+.page-item,
    .pagination .page-item:first-child+.page-item,
    .pagination .page-item:last-child:nth-child(n+3) {
      display: inline-block;
    }
  }

  @media (max-width: 480px) {
    .pagination {
      margin-top: 1.5rem;
      gap: 5px;
    }



    /* En pantallas muy pequeñas, mostrar solo prev/next y página actual */
    .pagination .page-item:not(.active):not(:first-child):not(:last-child) {
      display: none;
    }
  }


  .portada {
    cursor: pointer;
    transition: transform 0.3s ease;
  }

  .portada:hover {
    transform: scale(1.05);
  }
</style>


<script>
  Fancybox.bind("[data-fancybox]", {

    initialSize: "fit",

  });
</script>
<!--
80212302
 t3267702


80212305
 t3267705

-->