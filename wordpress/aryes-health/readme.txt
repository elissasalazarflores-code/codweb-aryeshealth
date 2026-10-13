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
- Quiénes somos: título, texto y fotografía.
- Misión y visión.
- Proyectos llave en mano: título y descripción.
- Compromiso, clientes y alianza estratégica.
- Contacto y datos de la empresa: razón social, RFC, sitio web, el correo que recibe
  el formulario y, de forma opcional, correo visible, teléfono y sede.

En los títulos, el texto *entre asteriscos* se muestra en cursiva azul.
Ejemplo: Integración hospitalaria *llave en mano*.

Logo: Apariencia → Personalizar → Identidad del sitio → Logo (opcional).
Si no sube uno, se muestra el logo de Aryes Health dibujado en vector.
Icono del navegador: Identidad del sitio → Icono del sitio.

== Menú ==
Apariencia → Menús. Ubicaciones: "Menú principal" y "Menú del pie de página".
Para enlazar secciones de la portada use enlaces personalizados como:
/#nosotros  /#mision  /#llave-en-mano  /#compromiso  /#clientes  /#contacto
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
Etapas del proyecto llave en mano, pilares, otros equipamientos, clientes (con sus
logos en assets/img/clientes) y marquesina están en inc/content.php. Cada lista tiene
un filtro (por ejemplo "aryes_clients") para modificarla desde un tema hijo.

== Créditos ==
Tipografías: Source Serif 4, Manrope y Lato (Google Fonts, licencia OFL).
