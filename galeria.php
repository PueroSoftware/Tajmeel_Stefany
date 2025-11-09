<?php
// galeria.php - versión que incluye sliders reutilizables en PHP
// Si prefieres mantener la versión .html, conserva galeria.html y sirve galeria.php solo cuando uses PHP en el servidor.
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="Galería de nuestros jabones artesanales y velas aromáticas. Descubre la variedad de productos naturales que ofrecemos.">
  <meta name="keywords" content="galería productos, jabones fotos, velas imágenes, catálogo productos naturales">
  <meta property="og:title" content="Galería de Productos - Tajmeel Stefany" />
  <meta property="og:description" content="Conoce nuestra colección completa de jabones y velas artesanales." />
  <meta property="og:image" content="assets/galeria/glry1.png" />
  <title>Galería | Tajmeel Stefany</title>
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
  <!-- Bootstrap + estilos base del sitio -->
  <link rel="stylesheet" href="/css/styles.css">
  <!-- Iconos Font Awesome (para redes sociales, coherente con index.html) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <!-- Estilos específicos de la galería -->
  <link rel="stylesheet" href="/css/galeria.css">
</head>
<body>

  <header>
    <div class="logo">
      <a href="index.html">
        <img src="/assets/img/isologo.png" alt="Logo" id="logovcard"/>
      </a>
      <h1>Jabones Naturales Galeria</h1>
    </div>
  </header>

  <main class="wrap">
    <!-- Puedes dejar contenido intermedio aquí -->

    <div class="content-grid">
      <!-- JABÓN PINO -->
      <article class="gallery-item">
       <?php
    // Slider 1: imágenes del grupo A .Aqui se define el Array de rutas
    $slider_images = [
      'assets/galeria/glry4.png',
      'assets/galeria/glry8.png',
      'assets/galeria/glry9.png',
      'assets/galeria/glry10.png',
      'assets/galeria/glry11.png'
    ];
    $slider_id = 'galeria_slider_a';
    include __DIR__ . '/includes/slider.php';
    ?>
      </article>

      <!-- Título entre los dos sliders -->
      <h2 class="section-title">Jabones Artesanales</h2>

      <!-- JABÓN Romero -->
      <article class="gallery-item">
         <?php
    // Slider 2: imágenes del grupo B .Aqui se define el Array de rutas el segundo slider
    $slider_images = [
      'assets/galeria/glry12.png',
      'assets/galeria/glry2.png',
      'assets/galeria/glry6.png',
      'assets/galeria/glry7.png',
      'assets/galeria/glry1.png'
    ];
    $slider_id = 'galeria_slider_b';
    include __DIR__ . '/includes/slider.php';
    ?>
    </article>

    </div> <!--Cierre del Div Grid-->

  <!-- Menú numérico eliminado por solicitud -->
  </main>

        <!-- Footer-->
    <footer class="bg-black text-center py-5">
  <div class="container px-5">
    <div class="text-white-50 small">
      <div class="mb-2">&copy; Pucusoft 2025.</div>

      <div class="social-icons mb-3">
        <a href="https://www.facebook.com/share/19v7UZuW1G/" target="_blank" class="social-link"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/invites/contact/?utm_source=ig_contact_invite&utm_medium=copy_link&utm_content=z89ygrg" target="_blank" class="social-link"><i class="fab fa-instagram"></i></a>
        <a href="https://wa.me/593964039291" target="_blank" class="social-link"><i class="fab fa-whatsapp"></i></a>
        <a href="https://www.tiktok.com/@stepha7554?_t=ZM-90GstmMNmbQ&_r=1" target="_blank" class="social-link"><i class="fab fa-tiktok"></i></a>
      </div>

      <a href="#!">Derechos Reservados.</a>
      <span class="mx-1">&middot;</span>
      <a href="https://pucusoft.netlify.app/">
        <img class="app-badge" src="assets/img/LogoPucusoft.png" alt="logo pucusoft" />
      </a>
    </div>
  </div>
</footer>
  <script src="/js/galeria.js"></script>
</body>
</html>
