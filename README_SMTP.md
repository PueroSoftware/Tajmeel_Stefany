# ✅ SimpleSMTPMailer ACTIVADO

## 🎯 Estado Actual
El formulario de contacto está configurado con **SimpleSMTPMailer** para envío directo de emails.

## ⚙️ Configuración Necesaria

### PASO 1: Configurar Contraseña
Edita el archivo: **`email_config.php`**

Cambia la línea 15:
```php
'password' => 'TU_CONTRASEÑA_AQUI',
```

Por tu contraseña de AOL:
```php
'password' => 'tu_contraseña_real',
```

### PASO 2: Si tienes Verificación en 2 Pasos
1. Ve a: https://login.aol.com/account/security
2. Busca "Contraseñas de aplicación" o "App Passwords"
3. Genera una nueva contraseña de aplicación
4. Usa ESA contraseña (no tu contraseña normal)

## 🧪 Probar el Formulario

1. Guarda `email_config.php` con tu contraseña
2. Abre: http://localhost/Website/Contacto.php
3. Llena y envía el formulario
4. Resultados:
   - ✅ **Envío exitoso**: Verás mensaje de éxito y recibirás el email
   - ⚠️ **Fallo de envío**: Se guarda en `data/contacto_registros.csv` como respaldo

## 📁 Archivos del Sistema

- **Contacto.php**: Formulario principal
- **smtp_mailer.php**: Clase SimpleSMTPMailer
- **email_config.php**: ⚠️ Configuración (CAMBIA LA CONTRASEÑA AQUÍ)
- **data/contacto_registros.csv**: Respaldo si falla el email

## 🔒 Seguridad

⚠️ **IMPORTANTE**: 
- NO subas `email_config.php` a repositorios públicos
- Agrega a `.gitignore` si usas Git:
  ```
  email_config.php
  ```

## ❓ Solución de Problemas

### "Tu mensaje fue guardado. El envío por email está en configuración"
- Verifica que cambiaste la contraseña en `email_config.php`
- No debe decir `TU_CONTRASEÑA_AQUI`

### Email no llega
- Revisa carpeta de SPAM
- Verifica que la contraseña sea correcta
- Si tienes 2FA, usa contraseña de aplicación

### Error de conexión
- Verifica que el puerto 587 esté abierto
- Verifica tu conexión a internet
- Revisa el firewall de Windows

## 📧 Revisa los Mensajes Guardados

Si quieres ver los mensajes que no se enviaron:
```
data/contacto_registros.csv
```

Abre con Excel o cualquier editor de texto.
