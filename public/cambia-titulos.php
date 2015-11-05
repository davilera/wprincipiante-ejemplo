<?php
/**
 * Este fichero contiene las funciones necesarias para modificar el front-end.
 *
 * @author  David Aguilera <david.aguilera@neliosoftware.com>
 *
 * @link    http://wprincipiante.es
 * @since   1.0.0
 */


/**
 * Dada una cierta entrada, le añade la extensión de título que tenga definida.
 *
 * @param   string   $title  el título que se va a pintar por pantalla.
 * @param   string   $id     el id de la entrada asociada a este título.
 *
 * @return  string   el título junto con la extensión que la entrada tenga definida.
 *
 * @link    http://wprincipiante.es
 * @since   1.0.0
 */
function wprincipiante_cambiar_titulo( $title, $id ) {
	$texto = get_post_meta( $id, '_wprincipiante_extension_titulo', true );
	if ( ! empty( $texto ) ) {
		$title = $title . ' ' . $texto;
	}
	return $title;
}
add_filter( 'the_title', 'wprincipiante_cambiar_titulo', 10, 2 );


