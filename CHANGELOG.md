# Changelog

Todos los cambios notables de este proyecto serán documentados en este archivo.

El formato está basado en [Keep a Changelog](https://keepachangelog.com/es-ES/1.0.0/),
y este proyecto sigue [Semantic Versioning](https://semver.org/lang/es/).

---

## [1.0.0] - 2025-11-08

### ✨ Agregado
- Sitio web completo con diseño responsive
- Página principal (`index.html`) con información de productos
- Página "Nosotros" (`about.html`) con historia de la empresa
- Galería de productos (`galeria.php`) con sliders dinámicos
- 5 páginas de beneficios/productos (`vcard1-5.html`)
- Formulario de contacto (`Contacto.php`) con validación
- Sistema de envío de emails por SMTP usando SimpleSMTPMailer
- Respaldo en CSV si falla el envío de email
- Integración de redes sociales (Facebook, Instagram, WhatsApp, TikTok)
- Botón flotante de WhatsApp en todas las páginas
- Footer unificado con logo y enlaces sociales
- Optimización SEO con meta tags en todas las páginas
- Favicon personalizado
- Font Awesome 6.5.0 para iconos
- Bootstrap 5.2.3 para diseño responsivo

### 🎨 Estilos
- Paleta de colores personalizada (verde-gris, azul-gris)
- CSS modular: `styles.css`, `home-styles.css`, `about-styles.css`, `vcard.css`, `contacto.css`, `galeria.css`
- Animaciones suaves en home
- Logos estandarizados a 60px
- Footer con bordes redondeados en vcards

### 🔧 Configuración
- SimpleSMTPMailer para envío SMTP directo
- Archivo `email_config.php` para credenciales
- Archivo ejemplo `email_config.example.php`
- `.gitignore` para proteger archivos sensibles
- Documentación completa en `README.md`

### 📱 Redes Sociales
- Facebook: https://www.facebook.com/TajmeelStefany
- Instagram: https://www.instagram.com/tajmeel_stefany/
- WhatsApp: +593 96 403 9291
- TikTok: https://www.tiktok.com/@tajmeel_stefany

### 🔒 Seguridad
- Validación client-side con JavaScript
- Validación server-side con PHP
- Protección contra XSS con `htmlspecialchars()`
- Sanitización de emails con `filter_var()`
- Archivos sensibles excluidos del repositorio

### 📝 Documentación
- README.md completo con instalación y configuración
- CHANGELOG.md para seguimiento de versiones
- Comentarios en código PHP y JavaScript

---

## Tipos de cambios

- `✨ Agregado` para nuevas características
- `🔄 Cambiado` para cambios en funcionalidad existente
- `🐛 Corregido` para corrección de bugs
- `🗑️ Eliminado` para características eliminadas
- `🔒 Seguridad` para vulnerabilidades corregidas
- `📝 Documentación` para cambios solo en documentación

---

**Autor:** Pucusoft  
**Licencia:** © 2025 Todos los derechos reservados
