# ShiftPress
Tema base para Wordpress

## Herramientas y Tecnologías utilizadas

* [Php](http://php.net/manual/en/intro-whatis.php)
* [Sass](http://sass-lang.com/)
* [Laravel mix](https://laravel.com/docs/5.4/mix)
* [Foundation 6.4.3](http://foundation.zurb.com/sites/docs/)
* [Web font loader](https://github.com/typekit/webfontloader)

## Compilando assets
Para la compilación de los assets hemos seleccionado laravel mix, el cual nos ayuda a través de su api, configurar y ejecutar rápidamente tareas comúnes que hacemos con nuestros archivos js y css. Cabe mencionar que laravel mix trabaja con webpack por debajo.

Para correr laravel mix seguiremos los siguientes pasos:

1. Editar el archivo `webpack.mix.js`y actualizar la opción `proxy : 'wordpress.dev'` dentro de la configuración de browsersync para ver los cambios en tiempo real sin recargar la página
2. Instalar las depencias ejecuntado en la consola el comando `yarn`
3. compilar mediante las siguientes opciones:
    * `yarn dev` desarrollo
    * `yarn watch` desarrollo y live preview
    * `yarn prod` producción

## Personalización JS
Para realizar los camnbios tenemos que modificar el siguiente archivo `resoureces/assets/js/app.js` y comentar lo que no necesitemos.

En cuanto a foundation, unicamente se esta cargando los esencial, si necesitas plugins adicionales como acordiones, slider, etc. se los tiene que requerir manualmente en la siguientes sección
```js
    /**
     * We'll load jQuery and the Foundation framework which provides support
     * for JavaScript based foundation features such as modals and tabs. This
     * code may be modified to fit the specific needs of your application.
     */
    try {
        window.$ = window.jQuery = require('jquery');
        require('foundation-sites/dist/js/plugins/foundation.core.js');
        require('foundation-sites/dist/js/plugins/foundation.util.mediaQuery.js');
        //Example to include aditional plugin
        require('foundation-sites/dist/js/plugins/foundation.util.keyboard.js');
        require('foundation-sites/dist/js/plugins/foundation.accordion.js');
    } catch (e) {}
```

## Personalización SASS
Todos los archivos sass los podemos encontrar en `resources/assets/sass/`, de igual manera se puede personalizar foundation a nuestras necesidades, es decir cambiar sus configuraciones por defecto en `resources/assets/sass/foundation/_seetings.scss` e incluir plugins adicionales, ya que de igual forma que con los js se carga únicamente ciertos componentes de foundation, descomentado los `ìnlcudes` dentro de `resources/assets/sass/foundation/_modules.scss`, podemos cargar componentes adicionales. Si no se va a usar foundation podemos eliminarlo comentando o borrando la siguiente sección dentro de nuestro archivo `resources/assets/sass/shiftpress.scss`:

```css
    //Foundation
    //@import "foundation/settings";
    //@import "node_modules/foundation-sites/scss/foundation";
    //@import "foundation/modules";
```

## Fuentes
Para cargar fuentes personalizadas por favor usar el archivo `shiftpress.js` y edita la siguiente sección

```js
/**
 * We'll load custom fonts with web font loader to improve page speed
 */

import WebFont from 'webfontloader';

WebFont.load({
    google: {
        families: ['Open Sans:300,400,700']
    }
});

```
De esta menera mejoramos el tiempo de carga, mas información en [web font loader](https://github.com/typekit/webfontloader)

    nota: Recordar actualizar la fuente en el archivo de configuración sass `resources/assets/sass/lib/_settings.scss`


## COPYRIGHT & LICENSE

This theme is based on BlankSlate theme
