=== Aryes Health ===
Tema a medida para Aryes Health Technologies.
Requiere: WordPress 6.0 o superior · PHP 7.4 o superior.

== Instalación ==
1. En WordPress vaya a Apariencia → Temas → Añadir nuevo → Subir tema.
2. Elija el archivo aryes-health.zip, pulse "Instalar ahora" y luego "Activar".
3. La página de inicio del sitio muestra automáticamente el diseño de Aryes Health.
   (Si en Ajustes → Lectura eligió una página estática como portada, también se usa este diseño.)

== Editar textos e imágenes ==
Apariencia → Personalizar → Aryes Health:
- Portada: título, descripción, botones, tarjetas y fondo.
- Quiénes somos y propósito.
- Especialidades y equipos (títulos).
- Misión, visión y valores.
- Servicio, clientes y alianzas.
- Contacto y datos de la empresa: correo, teléfono, sede, RFC, razón social y
  el correo que recibe el formulario.

En los títulos, el texto *entre asteriscos* se muestra en cursiva azul.
Ejemplo: Tecnología que vela por el *paciente crítico*.

Logo: Apariencia → Personalizar → Identidad del sitio → Logo (opcional).
Si no sube uno, se muestra el logo de Aryes Health dibujado en vector.
Icono del navegador: Identidad del sitio → Icono del sitio.

== Equipos (catálogo) ==
Menú "Equipos" del panel:
- La primera vez, pulse "Importar equipos de ejemplo" para cargar los 10 equipos
  con sus fotografías y poder editarlos.
- Añadir nuevo: escriba el modelo, elija la Línea (Máquinas de anestesia,
  Monitores de signos vitales o Ventiladores), la Etiqueta y la Fotografía del equipo.
- El orden se controla con Atributos → Orden (número menor aparece primero).
- Una línea sin equipos publicados muestra los equipos incluidos en el tema.

== Menú ==
Apariencia → Menús. Ubicaciones: "Menú principal" y "Menú del pie de página".
Para enlazar secciones de la portada use enlaces personalizados como:
/#nosotros  /#especialidades  /#equipos  /#servicio  /#clientes  /#contacto
Si no asigna un menú, se muestra uno con esas secciones.

== Formulario de contacto ==
Envía las solicitudes por correo (wp_mail) al correo configurado en Personalizar.
Incluye protección contra spam (campo oculto y límite de envíos).
Recomendado: instalar "WP Mail SMTP" y conectarlo al correo de la empresa para
que los mensajes no lleguen a spam.
Si usa un plugin de caché, excluya la página de inicio de la caché o configure
la caché para que no guarde páginas más de 12 horas (el formulario usa un código
de seguridad que caduca).

== Listas editables por código ==
Especialidades, valores, pasos del servicio, clientes, aliados y marquesina están
en inc/content.php. Cada lista tiene un filtro (por ejemplo "aryes_clients") para
modificarla desde un tema hijo sin tocar el tema.

== Créditos ==
Tipografías: Source Serif 4, Manrope y Lato (Google Fonts, licencia OFL).
