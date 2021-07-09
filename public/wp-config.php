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
define('DB_NAME', 'diagnost_wordpress');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'diagnost_user');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'diagnosticar@2018');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY', 'zuM:[FKb)8KV}5/.Bw6?;TVOIW`:3?{OeoaXdx=K{%xZx^Rq0#|}`H8r<t?uU*f?');
define('SECURE_AUTH_KEY', 'z(N_~H} wU7;Ko~D#GO}M{C&$-vdr_`:C1mggC606e9^v>@&lA8Y_a(oGdOBjth8');
define('LOGGED_IN_KEY', ')-X]Zq_j>^2UZi2C&%^~/pRq%P^pU.?Q^sjG$36#y-vw#aHTo0=xfgp}GjHt7xq8');
define('NONCE_KEY', '[oSEtix-#<}B~/|(=`V>oW2J{1(;fYrnR,~pr56j!_1b1)!bS~ttH^~lZv#8o:K1');
define('AUTH_SALT', 'o$yP+p}38C6,ckfGW!u29spEr+V+nwJon]{*$yVhk9+Nmp_dB~%C4i%^Ib*0Rbm=');
define('SECURE_AUTH_SALT', '7,k7p2118QAuKpHy;EFF,uvx&eK 4;HR+94IK/Gws6q 3PGBEXE=R?#Y<.7<85oq');
define('LOGGED_IN_SALT', 'j(,>;yiG (z7mMSGvP/Wj),:#f:,td]!OY?yQW3NBs=_;TqH2].Z7?/BbdYN!yvV');
define('NONCE_SALT', 'ph.~!=n:,,)soo9IE{38QT>dm0FpgYQ^Kw8t)+d@Jn{Obs9;kPs>Ob:#-44N^((3');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

