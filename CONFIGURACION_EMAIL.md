# Configuración del Sistema de Email

## Estado Actual

El formulario de contacto está configurado con **sistema híbrido**:
1. Intenta enviar por email usando `mail()`
2. Si falla, guarda en CSV como respaldo

## Opciones de Configuración

### OPCIÓN 1: Usar función mail() nativa (Actual)

**Ventajas**: No necesita librerías adicionales
**Desventajas**: Requiere configurar SMTP en php.ini

**Pasos**:
1. Abre `C:\xampp\php\php.ini`
2. Busca `[mail function]` y configura:
   ```ini
   SMTP=smtp.aol.com
   smtp_port=587
   sendmail_from=f.puero_chehin@aol.com
   ```
3. Reinicia Apache desde XAMPP Control Panel

### OPCIÓN 2: Usar SimpleSMTPMailer (Incluido)

**Ventajas**: No necesita configurar php.ini, envío directo
**Desventajas**: Requiere editar Contacto.php

**Pasos**:
1. Edita `smtp_mailer.php` línea 100: cambia `TU_CONTRASEÑA_AQUI`
2. Edita `Contacto.php` línea 14: cambia `TU_CONTRASEÑA_AQUI`
3. Activa el código comentado en Contacto.php (instrucciones abajo)

### OPCIÓN 3: Instalar PHPMailer (Recomendado para producción)

**Ventajas**: Librería profesional, muy confiable
**Desventajas**: Necesita Composer o descarga manual

**Con Composer**:
```bash
cd C:\xampp\htdocs\Website
composer require phpmailer/phpmailer
```

**Manual**:
1. Descarga: https://github.com/PHPMailer/PHPMailer/releases/latest
2. Extrae a: `vendor\phpmailer\PHPMailer\`
3. Usa `phpmailer_config.php` como guía

## Activar SimpleSMTPMailer en Contacto.php

Agrega después de la línea 1 de Contacto.php:
```php
require_once 'smtp_mailer.php';
```

Reemplaza la línea 51-53 por:
```php
if (enviarEmailSMTP($email_destino, $asunto, $cuerpo_email, $email)) {
    $success = true;
} else {
```

## Configuración de Contraseña AOL

⚠️ **Si tienes verificación en 2 pasos**:
1. Ve a: https://login.aol.com/account/security
2. Genera una "Contraseña de aplicación"
3. Usa esa contraseña en lugar de tu contraseña normal

## Probar el Formulario

1. Abre: http://localhost/Website/Contacto.php
2. Llena el formulario
3. Verifica:
   - Mensaje de éxito en pantalla
   - Email en f.puero_chehin@aol.com
   - Si no llega email, revisa: `data\contacto_registros.csv`

## Solución de Problemas

- **"No se pudo enviar"**: Verifica contraseña en smtp_mailer.php
- **Email no llega**: Revisa spam/correo no deseado
- **Error de conexión**: Verifica que puerto 587 esté abierto
- **Guardado en CSV**: Funciona como respaldo, revisa `data\contacto_registros.csv`
