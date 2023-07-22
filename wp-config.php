<?php
define( 'WP_CACHE', false ); // Added by WP Rocket

if (file_exists( ABSPATH . "wp-content/advanced-headers.php")) {
	require_once ABSPATH . "wp-content/advanced-headers.php";
}

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);

//Enable error logging.
@ini_set('log_errors', 'On');
@ini_set('error_log', '/www/wwwroot/dev01.chetoz-oz.com.au/wp-content/elm-error-logs/php-errors.log');

//Begin Really Simple SSL Server variable fix
   $_SERVER["HTTPS"] = "on";
//END Really Simple SSL

//END Really Simple SSL cookie settings

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sql_dev01_chetoz' );

/** Database username */
define( 'DB_USER', 'sql_dev01_chetoz' );

/** Database password */
define( 'DB_PASSWORD', 'pMcB5SHxJHNabATX' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'jr&fPWof!(xExi<K`8R.PUxkPv7_~5~l2[~plEA_rjJ$<.:|)2sCQN[,/5[+i$Ao' );
define( 'SECURE_AUTH_KEY',  '08^RqJ@B$-3kmnF.4^o$~%{^D+FjqIQW*X&&YUBoh${LyE6ptg6T=84iqE*=(S4m' );
define( 'LOGGED_IN_KEY',    '<z=.[7#3)jdf{t%)bCw?|yBv~`Te}T$lZc*nSVd>S.~|n?S)&k!.Dav+4z=kvi`4' );
define( 'NONCE_KEY',        'bEvU],nw(rd/-JwQ9QbB^`T5h47O-L:*#*g- DM~)W?B,7I^`%^!9W3Q7r#a8u6Y' );
define( 'AUTH_SALT',        '3T:sSD>n3MTw3X[KzeDc|sJJRh[@oArKWj)]E*ou=(MZ@oK3`b}{pU76ZZ7MH>Ag' );
define( 'SECURE_AUTH_SALT', 'zYhw!qW-3*$fVRXD)zLmijmfNefh$.n~^n/R+3AP=Z1`RfRvjj+wI3QB{R1Jb))B' );
define( 'LOGGED_IN_SALT',   'FE=3R&8^v>0r:i#)ZgdamD_jfs-7w:^/+VJ9|mG}YTBp>Jn`?vo%/b00V35|6vcO' );
define( 'NONCE_SALT',       'v5aWB-YQn^NW_;d@T=OYj9:xJPh<Gl5/`(L;:nU&eSc>6-+7mAeW2d)<of;pXij;' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'voCV6_';

// Enable WP_DEBUG mode
define('WP_DEBUG', true);

// Enable Debug logging to the /wp-content/debug.log file
define('WP_DEBUG_LOG', false);

// Disable display of errors and warnings
define('WP_DEBUG_DISPLAY', false);
@ini_set( 'log_errors', 1 );
@ini_set( 'display_errors', 0 );
define('WP_MAX_MEMORY_LIMIT', '512M');
define('WP_MEMORY_LIMIT', '512M');

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL

define( 'DUPLICATOR_AUTH_KEY', 't63Ek`gPQc0yplaaU J0N7?_4rF>D}z?sH~xE ~X]*5.AN4Gp6i4>bab`}m^[1wU' );
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');
define('CONCATENATE_SCRIPTS', false);

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
