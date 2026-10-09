# Aryes Health Technologies — sitio web

Sitio estático de una sola página (HTML, CSS y JavaScript sin dependencias).

## Ver localmente

Abrir `index.html` en el navegador, o servir la carpeta:

```bash
python3 -m http.server 8000
# http://localhost:8000
```

## Estructura

```
index.html            Página principal
assets/css/styles.css Estilos (paleta, tipografía, layout, responsive)
assets/js/main.js     Navegación, animaciones, pestañas de equipos y formulario
assets/img/           Fotografías, fondos y equipos
```

## Secciones

Inicio · Marquesina de instituciones · Quiénes somos · Propósito · Especialidades ·
Equipamiento (anestesia, monitoreo, ventilación) · Misión y visión · Valores ·
Cómo trabajamos · Clientes · Alianza estratégica · Contacto.

El formulario de contacto abre el cliente de correo con la solicitud dirigida a
`admin@aryesht.com`. Para envío directo desde el sitio, conectarlo a un servicio
de formularios (Formspree, Netlify Forms, etc.) o a un backend.

## Tema de WordPress

`wordpress/aryes-health.zip` es el tema instalable (Apariencia → Temas → Añadir nuevo →
Subir tema). El código fuente está en `wordpress/aryes-health/` y las instrucciones de uso
en `wordpress/aryes-health/readme.txt`.

Para regenerar el .zip tras cambiar el tema:

```bash
cd wordpress && rm -f aryes-health.zip && zip -qr aryes-health.zip aryes-health
```
