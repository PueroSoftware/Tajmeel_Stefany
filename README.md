# Tajmeel Stefany - Jabones Naturales & Velas Aromáticas

Sitio web profesional para venta de jabones artesanales y velas aromáticas.

## 🌟 Características

- ✨ Diseño moderno y responsive
- 🛍️ Galería de productos con sliders animados
- 📧 Formulario de contacto con envío por email (SMTP)
- 🎨 5 páginas de beneficios (VCards)
- 📱 Integración con redes sociales
- 💬 Botón flotante de contacto (WhatsApp/Telegram)

## 🚀 Tecnologías

- **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript
- **Backend:** PHP 7.4+/8.1+
- **Email:** SimpleSMTPMailer (alternativa a PHPMailer)
- **Servidor:** XAMPP/Apache

## 📦 Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/PueroSoftware/Tajmeel_Stefany.git
cd Tajmeel_Stefany
```

### 2. Configurar servidor

- Mueve el proyecto a tu carpeta web:
  - XAMPP: `C:\xampp\htdocs\Website`
  - WAMP: `C:\wamp\www\Website`
  - LAMP: `/var/www/html/Website`

### 3. Configurar email

```bash
cp email_config.example.php email_config.php
```

Edita `email_config.php` con tus credenciales:

```php
'username' => 'tu-email@aol.com',
'password' => 'tu_contraseña',
```

### 4. Crear directorio de datos

```bash
mkdir data
chmod 775 data
```

## 🌐 Acceso

- **Desarrollo:** `http://localhost/Website/`
- **PHP requerido:** Para `Contacto.php` y `galeria.php` usa Apache, no Five Server

## 📄 Estructura del Proyecto

```
Website/
├── index.html          # Página principal
├── about.html          # Nosotros
├── galeria.php         # Galería de productos
├── Contacto.php        # Formulario de contacto
├── vcard1-5.html       # Páginas de beneficios
├── assets/             # Imágenes y recursos
├── css/                # Hojas de estilo
├── js/                 # Scripts JavaScript
├── includes/           # Componentes PHP
└── data/               # Almacenamiento (no en repo)
```

## 🔧 Configuración Adicional

### Envío de Emails

El sistema usa SimpleSMTPMailer para envío directo via SMTP. Configuración en `email_config.php`:

- **Host:** smtp.aol.com
- **Puerto:** 587
- **Encriptación:** STARTTLS

Si tienes verificación en 2 pasos, genera una "Contraseña de aplicación" en:
👉 https://login.aol.com/account/security

## 📱 Redes Sociales

Configura tus enlaces en el footer de cada página:

- Facebook: Línea 263 (index.html)
- Instagram: Línea 264
- WhatsApp: Línea 265
- TikTok: Línea 266

## 🎨 Personalización

### Colores

Edita `css/home-styles.css`:

```css
--primary-color: #465A56;
--secondary-color: #567c86;
--accent-color: #6e807f;
```

### Logo

Reemplaza `assets/img/isologo.png` con tu logo (recomendado 200x160px)

## 📝 Licencia

© 2025 Pucusoft. Todos los derechos reservados.

## 👨‍💻 Desarrollador

**Pucusoft**
- Web: https://pucusoft.netlify.app/
- GitHub: https://github.com/PueroSoftware

## 🆘 Soporte

Para problemas o preguntas:
1. Revisa `CONFIGURACION_EMAIL.md`
2. Revisa `README_SMTP.md`
3. Abre un issue en GitHub

## 📧 Contacto

- **Email:** j.puerocuero@gmail.com
- **WhatsApp:** +593 96 403 9291

---

Hecho con ❤️ por Pucusoft
