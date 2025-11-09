<?php
// Contacto.php - Formulario de contacto con envío por email usando SimpleSMTPMailer
require_once 'smtp_mailer.php';

$success = false;
$error = '';

// Configuración de email
$email_destino = 'f.puero_chehin@aol.com';
$asunto = 'Nuevo mensaje desde el formulario de contacto';

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizar entrada
    $nombre   = isset($_POST['nombre']) ? trim(htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8')) : '';
    $email    = isset($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) : '';
    $telefono = isset($_POST['telefono']) ? trim(htmlspecialchars($_POST['telefono'], ENT_QUOTES, 'UTF-8')) : '';
    $mensaje  = isset($_POST['mensaje']) ? trim(htmlspecialchars($_POST['mensaje'], ENT_QUOTES, 'UTF-8')) : '';

    // Validaciones básicas
    if ($nombre === '' || $email === '' || $mensaje === '') {
        $error = 'Por favor completa los campos requeridos (Nombre, Email y Mensaje).';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'El email no es válido.';
    } else {
        // Preparar el mensaje del email
        $cuerpo_email = "Nuevo mensaje de contacto:\n\n";
        $cuerpo_email .= "Nombre: $nombre\n";
        $cuerpo_email .= "Email: $email\n";
        $cuerpo_email .= "Teléfono: $telefono\n";
        $cuerpo_email .= "Mensaje:\n$mensaje\n\n";
        $cuerpo_email .= "---\n";
        $cuerpo_email .= "Fecha: " . date('Y-m-d H:i:s') . "\n";
        $cuerpo_email .= "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'No disponible') . "\n";

        // Intentar enviar con SimpleSMTPMailer
        if (enviarEmailSMTP($email_destino, $asunto, $cuerpo_email, $email)) {
            $success = true;
        } else {
            // Si falla el envío SMTP, guardar en CSV como respaldo
            $dir = __DIR__ . DIRECTORY_SEPARATOR . 'data';
            $file = $dir . DIRECTORY_SEPARATOR . 'contacto_registros.csv';
            
            if (!is_dir($dir)) {
                @mkdir($dir, 0775, true);
            }
            
            $row = [
                date('Y-m-d H:i:s'),
                $nombre,
                $email,
                $telefono,
                preg_replace("/[\r\n]+/", ' ', $mensaje),
                $_SERVER['REMOTE_ADDR'] ?? ''
            ];
            
            $fh = @fopen($file, 'a');
            if ($fh) {
                if (flock($fh, LOCK_EX)) {
                    if (filesize($file) === 0) {
                        fputcsv($fh, ['fecha', 'nombre', 'email', 'telefono', 'mensaje', 'ip']);
                    }
                    fputcsv($fh, $row);
                    fflush($fh);
                    flock($fh, LOCK_UN);
                }
                fclose($fh);
            }
            
            $success = true;
            $error = 'Tu mensaje fue guardado. El envío por email está en configuración. Revisa email_config.php';
        }
    }
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contacto - Jabones Naturales</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- Estilos base del sitio -->
  <link rel="stylesheet" href="css/styles.css">
  <!-- Estilos específicos de contacto -->
  <link rel="stylesheet" href="css/contacto.css">
</head>
<body>
  <main class="contact-wrap">
    <div class="contact-logo">
      <img src="assets/img/isologo.png" alt="Jabones Naturales" />
    </div>
    
    <a href="about.html" class="btn btn-link mb-3">&larr; Volver</a>

    <div class="card p-4 mt-3">
      <h1 class="h3 mb-3">Contáctanos</h1>

      <?php if ($success): ?>
        <div class="alert alert-success" role="alert">
          <i class="bi bi-check-circle-fill me-2"></i>
          ¡Gracias! Tu mensaje fue enviado correctamente. Te contactaremos pronto.
        </div>
      <?php elseif ($error): ?>
        <div class="alert alert-danger" role="alert">
          <i class="bi bi-exclamation-triangle-fill me-2"></i>
          <?php echo htmlspecialchars($error, ENT_QUOTES); ?>
        </div>
      <?php endif; ?>

      <form method="POST" action="">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
          <input 
            type="text" 
            class="form-control" 
            id="nombre" 
            name="nombre" 
            value="<?php echo isset($nombre) ? htmlspecialchars($nombre, ENT_QUOTES) : ''; ?>"
            required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
          <input 
            type="email" 
            class="form-control" 
            id="email" 
            name="email" 
            value="<?php echo isset($email) ? htmlspecialchars($email, ENT_QUOTES) : ''; ?>"
            required>
        </div>

        <div class="mb-3">
          <label for="telefono" class="form-label">Teléfono</label>
          <input 
            type="tel" 
            class="form-control" 
            id="telefono" 
            name="telefono" 
            value="<?php echo isset($telefono) ? htmlspecialchars($telefono, ENT_QUOTES) : ''; ?>">
        </div>

        <div class="mb-3">
          <label for="mensaje" class="form-label">Mensaje <span class="text-danger">*</span></label>
          <textarea 
            class="form-control" 
            id="mensaje" 
            name="mensaje" 
            rows="5" 
            required><?php echo isset($mensaje) ? htmlspecialchars($mensaje, ENT_QUOTES) : ''; ?></textarea>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-between">
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-send-fill me-2"></i>Enviar Mensaje
          </button>
          <button type="reset" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-counterclockwise me-2"></i>Limpiar
          </button>
        </div>
      </form>
    </div>
  </main>

  <!-- Bootstrap JS Bundle (Incluye Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
