<?php
/**
 * Este fichero define el contenido de la meta box de títulos.
 *
 * Como se trata de una meta box, esta plantilla únicamente se usa cuando se
 * está editando una entrada concreta. La plantilla supone que las siguientes
 * variables están definidas:
 *  * $val  {string}  El valor de la extensión de título de la entrada actual.
 *
 * @author     David Aguilera <david.aguilera@neliosoftware.com>
 *
 * @link       http://wprincipiante.es
 * @since      1.0.0
 */

?>
<label for="wprincipiante-extension-titulo">Texto:</label>
<input name="wprincipiante-extension-titulo" type="text" value="<?php
		echo esc_attr( $val );
	?>" />
