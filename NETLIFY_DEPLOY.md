# 🚀 Deploy en Netlify - Guía Rápida

## Pasos para Desplegar

### 1. **Conecta tu Repositorio**

1. Ve a [Netlify](https://app.netlify.com/)
2. Click en **"Add new site"** → **"Import an existing project"**
3. Selecciona **GitHub**
4. Busca y selecciona el repositorio **`Tajmeel_Stefany`**

### 2. **Configuración de Build**

En la pantalla de configuración:

```
Build command: (dejar vacío)
Publish directory: /
```

Click en **"Deploy site"**

### 3. **Configurar Netlify Forms**

Después del primer deploy:

1. Ve a **Site settings** → **Forms**
2. El formulario "contacto" aparecerá automáticamente
3. Ve a **Settings** → **Forms** → **Form notifications**
4. Click en **"Add notification"** → **"Email notification"**
5. Ingresa tu email: `j.puerocuero@gmail.com`
6. Selecciona el formulario "contacto"
7. **Guardar**

### 4. **Configurar Dominio Personalizado (Opcional)**

1. Ve a **Site settings** → **Domain management**
2. Click en **"Add custom domain"**
3. Sigue las instrucciones

---

## ✅ Verificación Post-Deploy

- [ ] Visita tu sitio: `https://tu-sitio.netlify.app`
- [ ] Prueba el formulario de contacto
- [ ] Verifica que todas las imágenes carguen
- [ ] Revisa los sliders de la galería
- [ ] Prueba la responsividad en móvil

---

## 📧 Recibir Notificaciones de Formularios

**Opción 1: Email (Gratis - 100 envíos/mes)**
- Ya configurado en paso 3

**Opción 2: Slack**
1. Ve a **Form notifications**
2. Selecciona **Slack**
3. Conecta tu workspace

**Opción 3: Webhook**
1. Usa servicios como Zapier
2. Conecta con Google Sheets, email, etc.

---

## 🔧 Troubleshooting

### El formulario no envía
1. Verifica que el atributo `data-netlify="true"` esté en el `<form>`
2. Verifica que el campo `<input type="hidden" name="form-name" value="contacto">` exista
3. Revisa los **Form submissions** en el dashboard de Netlify

### Las imágenes no cargan
1. Verifica que las rutas sean relativas: `assets/img/logo.png`
2. No uses rutas absolutas: `/assets/img/logo.png` → `assets/img/logo.png`

### Error 404 en páginas
1. Verifica que los archivos existan en el repositorio
2. Verifica que el `publish directory` sea `/` (raíz)

---

## 📊 Límites del Plan Gratuito

- ✅ **Ancho de banda:** 100 GB/mes
- ✅ **Build minutos:** 300 min/mes
- ✅ **Form submissions:** 100/mes
- ✅ **Sites:** Ilimitados
- ✅ **HTTPS:** Gratis e ilimitado
- ✅ **Deploy automático:** Desde GitHub

---

## 🎯 Próximos Pasos

1. **Analytics:** Agrega Google Analytics
2. **SEO:** Verifica sitemap.xml
3. **Performance:** Usa Lighthouse de Chrome
4. **Custom Domain:** Compra un dominio personalizado

---

**¿Problemas?** Abre un issue en GitHub o contacta a: j.puerocuero@gmail.com
