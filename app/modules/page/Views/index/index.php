<?php echo $this->banner ?>
<div class="contenido-home">
  <?php echo $this->contenido ?>

</div>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const header = document.getElementById("mainHeader");
    const threshold = 50;

    function handleStickyHeader () {
      // Solo aplicar sticky en pantallas mayores a 991px
      if (window.innerWidth > 991) {
        if (window.scrollY > threshold) {
          header.classList.add("sticky-active");
        } else {
          header.classList.remove("sticky-active");
        }
      } else {
        // Remover sticky en pantallas menores o iguales a 991px
        header.classList.remove("sticky-active");
      }
    }

    window.addEventListener("scroll", handleStickyHeader);
    window.addEventListener("resize", handleStickyHeader);
  });
</script>