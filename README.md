# Tajmeel Stefany - Jabones Naturales & Velas Aromáticas 🧼✨

Sitio web profesional para venta de jabones artesanales y velas aromáticas con sistema de contacto por email.

## 🌟 Características

- ✨ Diseño moderno y responsive
- 🛍️ Galería de productos con sliders animados
- 📧 Formulario de contacto con envío por email (SMTP)
- 🎨 5 páginas de beneficios (VCards) de productos
- 📱 Integración con redes sociales
- 💬 Botón flotante de WhatsApp
- 🎯 Optimizado para SEO

## 🚀 Tecnologías

- **Frontend:** HTML5, CSS3, Bootstrap 5.2.3, JavaScript ES6+
- **Backend:** PHP 7.4+/8.1+
- **Email:** SimpleSMTPMailer (envío directo SMTP)
- **Servidor:** Apache (XAMPP/WAMP/LAMP)
- **Íconos:** Font Awesome 6.5.0

---

## 📦 Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/PueroSoftware/Tajmeel_Stefany.git
cd Tajmeel_Stefany
```

### 2. Configurar servidor local

Mueve el proyecto a tu carpeta web según tu entorno:

- **XAMPP (Windows):** `C:\xampp\htdocs\Website`
- **WAMP (Windows):** `C:\wamp\www\Website`
- **LAMP (Linux):** `/var/www/html/Website`
- **MAMP (Mac):** `/Applications/MAMP/htdocs/Website`

### 3. Configurar email SMTP

**Paso 1:** Copia el archivo de ejemplo

```bash
cp email_config.example.php email_config.php
```

**Paso 2:** Edita `email_config.php` y configura tus credenciales:

```php
return [
    'host' => 'smtp.aol.com',
    'port' => 587,
    'username' => 'tu-email@aol.com',  // ← Cambia esto
    'password' => 'TU_CONTRASEÑA_AQUI', // ← Cambia esto
    'from_name' => 'Tajmeel Stefany',
    'from_email' => 'tu-email@aol.com'  // ← Cambia esto
];
```

⚠️ **IMPORTANTE - Verificación en 2 pasos:**

Si tu cuenta de AOL tiene verificación en 2 pasos:
1. Ve a: https://login.aol.com/account/security
2. Busca "Contraseñas de aplicación" o "App Passwords"
3. Genera una nueva contraseña de aplicación
4. Usa **esa contraseña** en lugar de tu contraseña normal

### 4. Crear directorio de datos

**Windows (PowerShell):**
```powershell
mkdir data
```

**Linux/Mac:**
```bash
mkdir data
chmod 775 data
```

Este directorio guarda los mensajes como respaldo si falla el envío por email.

---

## 🌐 Uso

### Acceso Local

Abre tu navegador en:
```
http://localhost/Website/
```

### Páginas del sitio

- `index.html` - Página principal
- `about.html` - Acerca de nosotros
- `galeria.php` - Galería de productos
- `Contacto.php` - Formulario de contacto
- `vcard1.html` - `vcard5.html` - Páginas de beneficios de productos

⚠️ **Nota:** Los archivos `.php` requieren Apache. No funcionan con Live Server o Five Server.

---

## 📄 Estructura del Proyecto

```
Website/
├── index.html              # Página principal
├── about.html              # Nosotros
├── galeria.php             # Galería de productos
├── Contacto.php            # Formulario de contacto
├── vcard1-5.html           # Páginas de beneficios
├── smtp_mailer.php         # Clase SimpleSMTPMailer
├── email_config.php        # ⚠️ Configuración SMTP (no incluido)
├── email_config.example.php # Plantilla de configuración
├── assets/
│   ├── img/                # Imágenes del sitio
│   ├── galeria/            # Imágenes de galería
│   └── vcard/              # Imágenes de productos
├── css/
│   ├── styles.css          # Estilos globales
│   ├── home-styles.css     # Estilos de home
│   ├── about-styles.css    # Estilos de about
│   ├── vcard.css           # Estilos de vcards
│   ├── contacto.css        # Estilos de contacto
│   └── galeria.css         # Estilos de galería
├── js/
│   ├── scripts.js          # Scripts globales
│   ├── animation_home.js   # Animaciones del home
│   ├── vcard.js            # Funcionalidad vcards
│   └── galeria.js          # Funcionalidad galería
├── includes/
│   └── slider.php          # Componente slider
├── data/                   # Almacenamiento de respaldo (gitignored)
└── _pginfo/                # Información de proyecto
```

---

## ⚙️ Configuración del Sistema de Email

### Estado Actual

El formulario de contacto usa **SimpleSMTPMailer** con sistema híbrido:
1. ✅ Intenta enviar por email usando SMTP directo
2. 🔄 Si falla, guarda en `data/contacto_registros.csv` como respaldo

### Archivos del Sistema

- **`Contacto.php`** - Formulario principal con validación
- **`smtp_mailer.php`** - Clase SimpleSMTPMailer para envío SMTP
- **`email_config.php`** - ⚠️ Configuración de credenciales (debes crearlo)
- **`email_config.example.php`** - Plantilla de configuración
- **`data/contacto_registros.csv`** - Respaldo de mensajes

### Probar el Formulario

1. Configura `email_config.php` con tu contraseña
2. Abre: `http://localhost/Website/Contacto.php`
3. Llena y envía el formulario
4. Verifica:
   - ✅ **Éxito:** Mensaje "Tu mensaje ha sido enviado exitosamente" + email recibido
   - ⚠️ **Fallo:** Mensaje guardado en `data/contacto_registros.csv`

### Solución de Problemas

| Problema | Solución |
|----------|----------|
| Email no llega | Revisa spam/correo no deseado |
| Error de conexión | Verifica puerto 587 abierto y conexión a internet |
| Error de autenticación | Verifica contraseña en `email_config.php` |
| 2FA activado | Usa contraseña de aplicación de AOL |
| Guardado en CSV | Email falló, revisa `data/contacto_registros.csv` |

---

## 🎨 Personalización

### Colores del Sitio

Edita `css/home-styles.css` para cambiar la paleta de colores:

```css
:root {
    --primary-color: #465A56;    /* Verde-gris principal */
    --secondary-color: #567c86;  /* Azul-gris secundario */
    --accent-color: #6e807f;     /* Gris suave acento */
}
```

### Logo

Reemplaza los siguientes archivos en `assets/img/`:
- **`isologo.png`** - Logo principal (recomendado 200x160px)
- **`LogoPucusoft.png`** - Logo del footer (60x60px)

### Redes Sociales

Edita los enlaces en el footer de `index.html` (líneas 263-266):

```html
<a href="https://www.facebook.com/tu-pagina" class="social-link">
    <i class="fab fa-facebook-f"></i>
</a>
<a href="https://www.instagram.com/tu-cuenta" class="social-link">
    <i class="fab fa-instagram"></i>
</a>
<a href="https://wa.me/593964039291" class="social-link">
    <i class="fab fa-whatsapp"></i>
</a>
<a href="https://www.tiktok.com/@tu-cuenta" class="social-link">
    <i class="fab fa-tiktok"></i>
</a>
```

Replica los cambios en: `about.html`, `galeria.php`, `vcard1-5.html`

### WhatsApp Flotante

Edita el número de WhatsApp en cada página HTML:

```html
<a href="https://wa.me/593964039291?text=Hola%20me%20interesa%20conocer%20más%20sobre%20sus%20productos" 
   class="whatsapp-float" target="_blank">
```

Cambia `593964039291` por tu número (código de país + número sin +)

---

## 🔒 Seguridad

### Archivo .gitignore

El proyecto incluye `.gitignore` para proteger archivos sensibles:

```gitignore
# Configuración sensible
email_config.php

# Datos de usuarios
data/

# Dependencias (si usas Composer)
vendor/

# Logs
*.log
```

⚠️ **NUNCA** subas `email_config.php` a repositorios públicos de GitHub.

### Validación de Formularios

- Validación client-side: JavaScript
- Validación server-side: PHP con `htmlspecialchars()` y `filter_var()`
- Protección XSS integrada

---

## 📧 Contacto y Soporte

- **Email:** j.puerocuero@gmail.com
- **WhatsApp:** +593 96 403 9291

Para reportar bugs o solicitar features, abre un issue en GitHub.

---

## 📝 Licencia

© 2025 Pucusoft. Todos los derechos reservados.

---

## 👨‍💻 Desarrollador

**Pucusoft**
- 🌐 Web: https://pucusoft.netlify.app/
- 💻 GitHub: https://github.com/PueroSoftware

---

Hecho con ❤️ por Pucusoft
