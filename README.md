# ShiftPress
Tema base para Wordpress

## Tecnologías
* Html5
* Css3
* Foundation
* Postcss
* Php
* Gulp
* Elixir
* Browser Sync
* Sass
* Responsive Design

## Plugins
Plugins comunmente utilizados son:

* [Contact Form 7 *](http://contactform7.com/docs/)
* [Wordpress SEO by Yoast *](https://yoast.com/wordpress/plugins/seo/api/)
* [sendgrid *](https://wordpress.org/plugins/sendgrid-email-delivery-simplified/)
* [Mailchimp for WordPress](https://mc4wp.com/kb/)
* [Advanced Custom Fiels](http://www.advancedcustomfields.com/resources/)

## Instalación
Para instalar todas las dependencias para constuir el tema basado en foundation ejecutar:

    npm install

Esto nos baja foundation y las dependencias gulp que utilizamos en este tema.

## Configuración del proyecto
El tema maneja varias maneras de administrar los assets

* Elixir
* Solo Gulp
* Prepros (solo sass)

Es totalmente flexible para trabajar con foundation o boostrap solo cambiar la importación en:

   resources/assets/sass/shiftpress.scss

De momento está configurado para usar foundation, después de haber instalado las dependencias con npm install ejecutamos el siguiente comando para generar el archivo de gulp según necesidades ya sea en elixir o simplemente gulp:

   npm run start

**Antes de continuar debes entrar al archivo gulpfile.js generado a cambiar la url de tu sitio en desarrollo.** Una vez generado el archivo procedemos a ejecutar el siguiente comando para correr gulp ya sea con elixir o sin el:

   npm run dev

para el desarrollo o:

   npm run production

para producción

####- - COPYRIGHT & LICENSE - -

This theme is based on BlankSlate theme
