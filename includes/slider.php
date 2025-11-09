<?php
/**
 * includes/slider.php
 * Componente reutilizable de slider.
 * Uso:
 *  $slider_images = ['assets/img/a.jpg', 'assets/img/b.jpg'];
 *  $slider_id = 'mi_slider'; // opcional
 *  include __DIR__ . '/slider.php';
 *
 * El componente espera la variable $slider_images (array). Si no existe,
 * usará imágenes por defecto.
 */

if (!isset($slider_images) || !is_array($slider_images) || empty($slider_images)) {
    $slider_images = [
        'assets/img/imagen0.png',
        'assets/img/imagen1.jpg',
        'assets/img/imagen2.jpg'
    ];
}

$slider_id = isset($slider_id) ? $slider_id : 'slider_' . uniqid();

?>
<!-- Slider: id=<?php echo htmlspecialchars($slider_id, ENT_QUOTES); ?> -->
<div id="<?php echo htmlspecialchars($slider_id, ENT_QUOTES); ?>" class="slider-wrapper">
  <div class="slider-track">
    <?php foreach ($slider_images as $img): ?>
      <img class="slider-img-large" src="<?php echo htmlspecialchars($img, ENT_QUOTES); ?>" alt="">
    <?php endforeach; ?>
    <!-- Duplicamos las imágenes para permitir loops suaves en implementaciones CSS/JS que lo requieran -->
    <?php foreach ($slider_images as $img): ?>
      <img class="slider-img-large" src="<?php echo htmlspecialchars($img, ENT_QUOTES); ?>" alt="">
    <?php endforeach; ?>
  </div>
</div>
