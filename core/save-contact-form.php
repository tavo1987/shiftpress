<?php

/**
* [nombre_del_formulario] [Esto ocupo para comparar el nombre del formulario para guardar en la tabla correcta]
*
* [nombre_de_la_tabla] [se concatena con el prefijo seleccionado en la instalacion que por defecto es wp_ + nombre de la tabla a guardar]
*
* [$submited['posted_data']['nombre_campo_form']] [Para jalar datos del formulario lo sacamos de un array $submited['posted_data'] seguido del nombre del campo ingresado en el form ['nombre_campo_form']]
*
* [save_form Guarda en base cualquier formulario enviado por contact form 7]
* @param  [type] $wpcf7 [variable global de wp que se utiliza para guardar datos en esta funcion]
* @return [type]        [description]
*/
function save_form($wpcf7)
{
    global $wpdb;

   /*
        Note: since version 3.9 Contact Form 7 has removed $wpcf7->posted_data
        and now we use an API to get the posted data.
   */

    $submission = WPCF7_Submission::get_instance();

    if ($submission) {
        $submited = array();
        $submited['title'] = $wpcf7->title();
        $submited['posted_data'] = $submission->get_posted_data();
    }
   /**
   * Uso de la mayoría de formularios acerca de suscribirse o no
   */
    if ($submited['posted_data']['info'] == 'on') {
        $info = 'Si quiero recibir informacion';
    } else {
        $info = 'No quiero recibir informacion';
    }

    if ($submited['title'] == 'nombre_del_formulario') {
        $wpdb->insert($wpdb->prefix . 'nombre_de_la_tabla',
            array(
                'nombre'  => $submited['posted_data']['your-name'],
                'apellido' => $submited['posted_data']['last-name'],
                'email' => $submited['posted_data']['email-gana'],
                'artista' => $submited['posted_data']['artist-fav'],
                'info' => $info,
                'fecha' => date('Y-m-d')
            )
        );
    }
}
add_action('wpcf7_before_send_mail', 'save_form');
