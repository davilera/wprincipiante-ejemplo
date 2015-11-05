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

if ( is_admin() ) {
	require_once( 'admin/meta-box-extension-titulo.php' );
} else {
	require_once( 'public/cambia-titulos.php' );
}
