<?php
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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'letsgo_world' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'nK+V;]Qqq7]cV:5~aK>d8G;g|n2joS?d[/JT}b3%eBhWfQy.;NUAEtg8_KetQR#!' );
define( 'SECURE_AUTH_KEY',  'Q_I:NH(}CQhg+n,2G[^rSC7.Yp*lq=5te:JZo$%Rh4._Y/?e/k]*2[hx}g&v/w[0' );
define( 'LOGGED_IN_KEY',    '(SSj7%GUxIZJ*QFQThqF!wd#rv$Fr&iIWb$4D:rNr[DQP/e?`;[j7v`}YxK=CaB:' );
define( 'NONCE_KEY',        'EA/X8DhJ}uOt-)%upX$;HQv4`BQiON B@!9Ng3$>Eymr<(r pym-q2y=8}t0u4N|' );
define( 'AUTH_SALT',        'naE<]4F|@o~7+lEb89]18DjsYat1-r:/SC}6<=S*@mlHre<qF>6zDmI<&.^5/]/g' );
define( 'SECURE_AUTH_SALT', '3kii:e7Z~RJ jy:fBQ3,]44;bIzE>h+-%R}UOy_ZX*5DUrOfb`^)lV[gR+Z@`5z;' );
define( 'LOGGED_IN_SALT',   'bg1kx}B|KnWapCGKG;AcD|4-CQtkgJ~|seF:faCW;wDdm.!@M>hGCimtAZeRYjq:' );
define( 'NONCE_SALT',       '2XHz5/8-|_C)-INHJDA2ZGb8`@r/%oTi*7nnY;F@{*7&GV)zf^eMY~F{cE^om?]5' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
