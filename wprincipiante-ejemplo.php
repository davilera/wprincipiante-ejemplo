<?php
/**
 * Plugin Name: Ejemplo de WPrincipiante
 * Plugin URI: http://wprincipiante.es
 * Description: Este plugin modifica los títulos de las entradas.
 * Version: 1.0.0
 * Author: David Aguilera
 * Author URI: http://neliosoftware.com
 * Requires at least: 4.0
 * Tested up to: 4.3
 *
 * Text Domain: wprincipiante-ejemplo
 * Domain Path: /languages/
 */

defined( 'ABSPATH' ) or die( '¡Sin trampas!' );


// =============================================================
//			 Front-end
// =============================================================

add_filter( 'the_title', 'wprincipiante_cambiar_titulo', 10, 2 );
function wprincipiante_cambiar_titulo( $title, $id ) {
	$texto = get_post_meta( $id, '_wprincipiante_extension_titulo', true );
	if ( ! empty( $texto ) ) {
		$title = $title . ' ' . $texto;
	}
	return $title;
}


// =============================================================
//			 Meta Box
// =============================================================

add_action( 'add_meta_boxes_post', 'wprincipiante_add_meta_boxes' );
function wprincipiante_add_meta_boxes() {
	add_meta_box(
		'wprincipiante-extension-titulo',
		'Extensión del Título',
		'wprincipiante_print_extension_titulo_meta_box'
	);
}

function wprincipiante_print_extension_titulo_meta_box( $post ) {
	$post_id = $post->ID;
	$val = get_post_meta( $post_id, '_wprincipiante_extension_titulo', true ); ?>
	<label for="wprincipiante-extension-titulo">Texto:</label>
	<input name="wprincipiante-extension-titulo" type="text" value="<?php
			echo esc_attr( $val );
		?>" />
<?php
}


// =============================================================
//			 Guardar la extensión del título
// =============================================================

add_action( 'save_post', 'wprincipiante_save_extension_titulo' );
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
