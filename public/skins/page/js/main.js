var videos = [];
$(document).ready(function () {
  $(".dropdown-toggle").dropdown();
  $(".carouselsection").carousel({
    quantity: 4,
    sizes: {
      900: 3,
      500: 1,
    },
  });

  $(".banner-video-youtube").each(function () {
    // console.log($(this).attr('data-video'));
    const datavideo = $(this).attr("data-video");
    const idvideo = $(this).attr("id");
    const playerDefaults = {
      autoplay: 0,
      autohide: 1,
      modestbranding: 0,
      rel: 0,
      showinfo: 0,
      controls: 0,
      disablekb: 1,
      enablejsapi: 0,
      iv_load_policy: 3,
    };
    const video = {
      videoId: datavideo,
      suggestedQuality: "hd1080",
    };
    videos[videos.length] = new YT.Player(idvideo, {
      videoId: datavideo,
      playerVars: playerDefaults,
      events: {
        onReady: onAutoPlay,
        onStateChange: onFinish,
      },
    });
  });

  function onAutoPlay(event) {
    event.target.playVideo();
    event.target.mute();
  }

  function onFinish(event) {
    if (event.data === 0) {
      event.target.playVideo();
    }
  }
  const tooltipTriggerList = document.querySelectorAll(
    '[data-bs-toggle="tooltip"]'
  );
  const tooltipList = [...tooltipTriggerList].map(
    (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
  );
});

document.addEventListener("DOMContentLoaded", () => {
  const animaciones = [
    "fade-up",
    "fade-down",
    "fade-left",
    "fade-right",
    "zoom-in",
    "zoom-out",
    "flip-left",
    "flip-right",
  ];
  document.querySelectorAll("[data-aos]").forEach((element) => {
    const animacionAleatoria =
      animaciones[Math.floor(Math.random() * animaciones.length)];
    element.setAttribute("data-aos", animacionAleatoria);
  });

  AOS.init({
    once: true,
    duration: 500,
  });

  /* ------------------------------------------------------ */
  /* --------------------- FORMULARIO CONTACTO---------------- */
  /* ------------------------------------------------------ */
  document
    .getElementById("form-contact")
    ?.addEventListener("submit", function (e) {
      e.preventDefault();
      const response = grecaptcha.getResponse();
      if (response.length === 0) {
        Swal.fire({
          icon: "warning",
          text: "Por favor, verifica que no eres un robot.",
          confirmButtonColor: "#5475a1",
          confirmButtonText: "Continuar",
        });
        grecaptcha.reset();
      } else {
        $(".loader-bx").addClass("show");

        let submitBtn = document.getElementById("submit-btn");
        // Deshabilitar botón y mostrar animación
        submitBtn.disabled = true;

        let formData = new FormData(this);
        let data = {};
        formData.forEach((value, key) => {
          data[key] = value;
        });

        fetch(this.getAttribute("action"), {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(data),
        })
          .then((response) => response.json())
          .then((data2) => {
            // console.log("Status:", data2.status); // Verifica el valor exacto

            if (data2.status.trim().toLowerCase() === "success") {
              Swal.fire({
                icon: "success",
                text: "Gracias por subscribirte, pronto recibirás más información.",
                confirmButtonColor: "#5475a1",
                confirmButtonText: "Continuar",
              });
            } else if (data2.status === "error") {
              Swal.fire({
                icon: "error",
                text: data2.error || "Ha ocurrido un error, por favor intenta de nuevo.",
                confirmButtonColor: "#5475a1",
                confirmButtonText: "Continuar",
              });
            }
            document.getElementById("form-contact").reset();
            // Habilitar botón y ocultar animación
            submitBtn.disabled = false;
            $(".loader-bx").removeClass("show");
            grecaptcha.reset();
          })

          .catch((error) => {
            // console.log("Error:", error);

            Swal.fire({
              icon: "error",
              text: "Ha ocurrido un error, por favor intenta de nuevo.",
              confirmButtonColor: "#5475a1",
              confirmButtonText: "Continuar",
            });
            // Habilitar botón y ocultar animación
            submitBtn.disabled = false;
            $(".loader-bx").removeClass("show");
            grecaptcha.reset();
          });
      }
    });
});
