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
define( 'DB_NAME', 'patterson-homes' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         ']gbHKF8we1}%N=S^^+G`Zty%-$zDWJ4hqOlBhF<hL<tF_U<|AC6[1({<decTf4T9' );
define( 'SECURE_AUTH_KEY',  '~dU?A(FQ#uh?o<KUG%=ohGEd8L)P:YnA~fCU>qYl2$g.,l+3`#{++T2yk,Yu;b|V' );
define( 'LOGGED_IN_KEY',    'gyNLNAkAVu_yVlvRD[Ln~0{k[/Efw40p|Mt^[jVF.3,F/.Vu+64K}nZUm8A-sqj$' );
define( 'NONCE_KEY',        'x}*oEYm/gC7J)@ZXjd?2qcT@lM~ORk/l|gAU^w0~C&Mq}[X|0KUG(S7Coz(9?#%P' );
define( 'AUTH_SALT',        '<]xat?!|=e]VW5aZMb|EC>:!SH=<koFG`}Gv3u_plkT[`HxXJT![Y_:uL?1jwnN|' );
define( 'SECURE_AUTH_SALT', '^q[#W#Q]~$JVP}Tq@4Km)Z6.o)Q5iS5&`E<%BG+0%v7-PP5)j;qBfPFNz~ge0tB;' );
define( 'LOGGED_IN_SALT',   '1QBSzV@U*pqQJ-TD:.Di/ICba.F~#/<*+0p<vP3@;[FUixl%ozKFW30_{_yBTES<' );
define( 'NONCE_SALT',       'Sv%(N}DBZE$SI}rlfO?dAE,{*3^[Bp:Lpb9.;^x8s;&Le@Xm`kZsnA7p >-WtoGW' );

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
$table_prefix = 'wpxpat_';

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



define( 'DUPLICATOR_AUTH_KEY', 's<X$C%eib;ng9A w7Nx>Hz3w15S+hb(Ic{Ae|@o1SCHivR|5oi0hX!u4eW Ub0%>' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
