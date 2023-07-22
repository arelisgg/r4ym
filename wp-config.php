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
define( 'DB_NAME', 'r4ym' );

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
define( 'AUTH_KEY',         '2B;!tA`1>_>l/IilS.U,}&97Pb+[UCJ t?l]kj{m9IGo[2(])!ujOfzNw6#%r9*p' );
define( 'SECURE_AUTH_KEY',  'GO; 1lRkll#QSwg4u=;Tw+ua,9. ;y`TO]N)w[tHkm:uyPY$Hi82maYXF6GY,$]j' );
define( 'LOGGED_IN_KEY',    'n.tJSzudl!3c$|=;UzWN%yk8t.oMcQq_(ThVEz1Q7&#Vi;_H7^L~u1BAS>I=j1%H' );
define( 'NONCE_KEY',        '5Ai(_]g7k  |8mRMl:HB[AQ;JT]752XsllE@ FN]Y-~n2x;:fID4v[=64Phr%emP' );
define( 'AUTH_SALT',        'X^yk*9Vqc~[nr+-O`d9K0PZ<Y7yE%WjDC#u5o)WqE&SjYa -<]^?)Dlb~q2r)ShL' );
define( 'SECURE_AUTH_SALT', '~WGC9%G}#r+wk&DXuB)vJIbEoT:GAR9MF4fOuL#IH i2GmG 49P|1J CXv Rf:?G' );
define( 'LOGGED_IN_SALT',   'Vjc/Z!Dl)QL_dj+T$F.T8*`=pf=5_5{@iRGPOVZ1-dBCPHzx38?jNMq}cHGbpT=`' );
define( 'NONCE_SALT',       ';FTO~]F1|X`?hMR=vd~Lkx0cqp{i>YmmdCJuq5DyIMV-ADFD8FOI3 p-|{46OAjD' );

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
