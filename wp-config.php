<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'inspace');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '4HR1b;3s7oK4BX2-X#LRF>EE_3vE X2!0gd&lTURSW)ShB,kftI~ ,tT?>2Z9PnC');
define('SECURE_AUTH_KEY',  ']xj@D#n)l?,Pj#fi{ow&q&6-bg^pLWAj{LnNunbSxdY|AG?Rf^J)p(JmG kRXsAo');
define('LOGGED_IN_KEY',    '~Y-UUnvgktA;C:]5{zMBE!/?WoAg@:rWg*Q1Xbhc]vtus=39_u7()wcA; @N2(3P');
define('NONCE_KEY',        '#ua$!rdkQe.E;W!@,WbYn4vPGMD`91<x2=]hP|zi%)C4cdnW*3gD*{!kaj.%{fV@');
define('AUTH_SALT',        '@F1=efc{mfA@bU8IHRqv4H62<C=8d1/FX8vr]#24=BmF]Gk@%.|QNF}K|?@}H,_>');
define('SECURE_AUTH_SALT', 'Ub8Sk/bh5ti{0w/}DP(&J9S|E/F,zgH/veBJ^Zt`_<k^_Q6R-Df:jPrIB7Sd0z7i');
define('LOGGED_IN_SALT',   'Dbz5#@jJFa%xe(&rG/&DGdDczPGzol!)p?9.PJ=alI/o),9X1pIK9BeKO_Y;2=HE');
define('NONCE_SALT',       '9X/XW]/k]1,qcg6xa)C Q?`FD@%f[4:C.he|RWa(<yl&:A+Z2|iHfLv<y,@lZ%*-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ISweb2017_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
