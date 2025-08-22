<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'prathibaposhak' );

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
define( 'AUTH_KEY',         'B=3t/pPMK)XL{:3<oq=y g~)B1UjL}xkW=Lv)@%M%!l,Bc/t.C3-RZKgOx)#-cJ*' );
define( 'SECURE_AUTH_KEY',  '|k:xeguCU3su4`KSBZ$#0[k)P=*),9oT(4Ec>q&y:h>k:x+b<2t@wYa~YT>BxUO#' );
define( 'LOGGED_IN_KEY',    'Wh}Qm+L6l@$^-YdC58;TdH%^k#0U_,uebeW;Op}o19Johk+-#kX@yIoxH,@Y=>H<' );
define( 'NONCE_KEY',        '}U%s@Oswy%_Nxj:I#Br}1(EUURP=6<t4R/:YEJzj @GDS{VP`?{eFz0rNVN[-yx&' );
define( 'AUTH_SALT',        '7+-SjO/.V#~5LrPH/E7E4KR!+buU[8n;ht|crMNpBb{^@8UH5rwFk=:NgrIB+-F@' );
define( 'SECURE_AUTH_SALT', 'cq,h0lDQWk1UNN{^@y1Fzsm>$s$VpoH6H4>A]`n|xM7x/&)8iNQ^~9>f3?L9. 6K' );
define( 'LOGGED_IN_SALT',   '^$a8T~#$9aZ|0ED#z4G%Q4T#1=LoI 4uH&P-HGwY:H>p^Mu=j:w2qivaIA+uZ:.S' );
define( 'NONCE_SALT',       'zvTyS&x9Pr#SR?&#eS/}9hlrY(O7u}@/$[y4T1k*@{_Y5U`w)O@ZxwR<#MeIvG^`' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
