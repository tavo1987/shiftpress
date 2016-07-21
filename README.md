# Shift-Press
Theme base for development in Shift

## Tecnologías
* Html5
* Css3
* Php
* Gulp
* Elixir
* Sass
* Responsive Design
* Multipropósito

## Plugins
Se desactivo la función de plugins necesarios por problemas de testeo pero los plugins comunmente utilizados son:

Requeridos *.

> * [Contact Form 7 *](http://contactform7.com/docs/)
* [Wordpress SEO by Yoast *](https://yoast.com/wordpress/plugins/seo/api/)
* [sendgrid *](https://wordpress.org/plugins/sendgrid-email-delivery-simplified/)
* [Mailchimp for WordPress](https://mc4wp.com/kb/)
* [Advanced Custom Fiels](http://www.advancedcustomfields.com/resources/)


### Guardar en base al enviar formularios con cf7

Para ello ocupamos un action_hook que provee cf7 y que únicamente se ejecuta al enviar exitosamente el formulario

    wpcf7_before_send_mail

El uso de esta función se encuentra documentado en el mismo archivo que se encuentra en:

    core/save-contact-form.php

*Esta función se incluye únicamente cuando el plugin Contact Form 7 está activado.*

## Instalación
Para instalar todas las dependencias para constuir el tema basado en foundation ejecutar:

    npm install

Esto nos baja foundation y las dependencias gulp que utilizamos en este tema.

## Configuración del proyecto
El tema maneja dos maneras de administrar los assets

* Elixir
* Solo Gulp

Es totalmente flexible para trabajar con foundation o boostrap solo cambiar la importación en:

	resources/assets/sass/shiftpress.scss

De momento está configurado para usar foundation, después de haber instalado las dependencias con npm install ejecutamos el siguiente comando para generar el archivo de gulp según necesidades ya sea en elixir o simplemente gulp:

	npm run start

**si se escogió la opción elixir antes de continuar debes entrar al archivo gulpfile.js generado a cambiar la url de tu sitio en desarrollo.** Una vez generado el archivo procedemos a ejecutar el siguiente comando para correr gulp ya sea con elixir o sin el:

	npm run dev

para el desarrollo o:

	npm run production

para producción

####- - COPYRIGHT & LICENSE - -

This theme is based on BlankSlate theme
