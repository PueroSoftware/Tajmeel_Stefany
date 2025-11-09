# Instalación de PHPMailer

## Pasos para instalar PHPMailer manualmente:

1. Descarga PHPMailer desde: https://github.com/PHPMailer/PHPMailer/releases/latest
2. Descarga el archivo `PHPMailer-6.9.1.zip` (o la versión más reciente)
3. Descomprime el contenido
4. Copia la carpeta `src` a: `c:\xampp\htdocs\Website\vendor\phpmailer\PHPMailer\src`

## O usa Composer (si lo tienes instalado):

```bash
cd c:\xampp\htdocs\Website
composer require phpmailer/phpmailer
```

## Configuración:

Después de instalar PHPMailer, edita el archivo `phpmailer_config.php` línea 17:
- Cambia `TU_CONTRASEÑA_AQUI` por tu contraseña de AOL

⚠️ **IMPORTANTE**: Si usas verificación en dos pasos en AOL, necesitas crear una "contraseña de aplicación"
