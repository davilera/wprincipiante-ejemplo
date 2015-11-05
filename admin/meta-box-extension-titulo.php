<?php
/**
 * Este fichero contiene toda la lógica relacionada con el funcionamiento de
 * la meta box de títulos. En concreto, se encarga de añadir la meta box en
 * la UI de WordPress y de guardar los valores que pide al usuario.
 *
 * @author     David Aguilera <david.aguilera@neliosoftware.com>
 *
 * @link       http://wprincipiante.es
 * @since      1.0.0
 */


/**
 * Esta función añade nuestra meta box de ejemplo.
 *
 * @link       http://wprincipiante.es
 * @since      1.0.0
 */
function wprincipiante_add_meta_boxes() {
	add_meta_box(
		'wprincipiante-extension-titulo',
		'Extensión del Título',
		'wprincipiante_print_extension_titulo_meta_box'
	);
}
add_action( 'add_meta_boxes_post', 'wprincipiante_add_meta_boxes' );


/**
 * Esta función es el callback que se utiliza para dibujar la meta box.
 *
 * @param   WP_POST   $post   la entrada que se está editando.
 *
 * @link    http://wprincipiante.es
 * @since   1.0.0
 */
function wprincipiante_print_extension_titulo_meta_box( $post ) {
	$post_id = $post->ID;
	$val = get_post_meta( $post_id, '_wprincipiante_extension_titulo', true );
	include 'partials/meta-box-extension-titulo.php';
}


/**
 * Esta función se encarga de guardar el valor de la meta box.
 *
 * @param   int   $post   el identificador de la entrada que se va a guardar.
 *
 * @link    http://wprincipiante.es
 * @since   1.0.0
 */
function wprincipiante_save_extension_titulo( $post_id ) {
	// Si se está guardando de forma automática, no hacemos nada.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Si nuestro campo de texto no está disponible, no hacemos nada.
	if ( ! isset( $_REQUEST['wprincipiante-extension-titulo'] ) ) {
		return;
	}

	// Ahora sí, coger el valor del campo de texto y limpiarlo por seguridad.
	$texto = trim( sanitize_text_field( $_REQUEST['wprincipiante-extension-titulo'] ) );

	// Guardarlo en el campo personalizado "_wprincipiante_extension_titulo"
	update_post_meta( $post_id, '_wprincipiante_extension_titulo', $texto );
}
add_action( 'save_post', 'wprincipiante_save_extension_titulo' );
