<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'uddventures_2');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
// define('DB_PASSWORD', '9VK8rvw3');
define('DB_PASSWORD', 'shadowfax');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
// define('DB_HOST', '10.185.0.173');
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%NV8Ez@GzZM!1upAu*?ht$}#nk>?6-qt@t9FAi@yy6nf+`-DJCg/s|_t<7_Y=fu>');
define('SECURE_AUTH_KEY',  '7XGw5z y{V3XMz7rIsIDHL|dX-!20}YcWt5DI9qY}X^dgh>K|!9fN}o|Z?dgb}vq');
define('LOGGED_IN_KEY',    'YJoF~p] r_p|~&@Qy:Q,o|oxs[b;tOx6Aq2_F:&P]p}mrXk)k|_pm.>uL@{*T#B#');
define('NONCE_KEY',        'PUMS;c8`aULqC:#Gj-xmpDq=_1|SI/g!Go&0&YK%nJO-%H<T^:-]2tq&~KH e.?y');
define('AUTH_SALT',        'UYITenL0&s?0(CB@Yz8<V/N+sn*/:yOfJR4DB+!KVrS/{~T+haz{j&|Cwb(;!v6B');
define('SECURE_AUTH_SALT', '<!19|DHEgJuUXAUg~qc1>S4A~3a8z|x2S[iE9,1kMC(R&..ht!N+CI|`kzR?,Ts/');
define('LOGGED_IN_SALT',   'B}1[{|ZU-|b_*BD;VV*kUWlvF,3~L1ozK7J>M(<5XygPx/dvOe;WRh7HQlHn:qB@');
define('NONCE_SALT',       'Um${_Wfj<4B6OQIiKC!|6uo`apUH![.fJ|T 7 k-Au1NhH-&i]o[r~:4L![n<.xr');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

//Multisite 

define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'uddventures.udd.cl');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
