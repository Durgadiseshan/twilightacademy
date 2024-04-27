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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'twilight_academy' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'qRCYII}x0=cR' );

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
define( 'AUTH_KEY',         '=TGaHn)lN2Vfm4@L!3F1q,;tr:+c(TN.NElMC+LBr %gPRV(7]19?C? ej>:[h`m' );
define( 'SECURE_AUTH_KEY',  'c-rv[J-VBwrOQ>@|1/e2)<j[5IJaEpw<}wms{_;yF]q13LqXmjdCF4Xy=^@tlzlm' );
define( 'LOGGED_IN_KEY',    'r[Gpb;?AiL[(<W2WjgtYx][lDX2lQBrhb`QJi.^)g8794$QQ`<gUTXDCV5s%i$=7' );
define( 'NONCE_KEY',        '4zXXq2rjB4>:PB`sJ#JT]_wLiHR,7O6G9)D~VcjlS~mJ(F$b?Cm+^r!sSyV@k)bK' );
define( 'AUTH_SALT',        'Ud1/chm)gO}M-<h|wze-x;7z;YTu7j>|])|(|$Va.k6:F=<)R}2x)(P3VK{;~kz5' );
define( 'SECURE_AUTH_SALT', '<>7M{M7wz0ho*fj??tjM8RZEzDmkZ ,)r%d_TFs~gTV_)T4MOvgi@^d?jz:i*Ix$' );
define( 'LOGGED_IN_SALT',   '2gD(tp=`MTzv4CO@G+&L>$WIoUinrUTo%`Fs9iJX{f2A,}i<AMm-xgLz&U;V)L,A' );
define( 'NONCE_SALT',       '0g)0dMw]0O~[tX&6_<H79hBE|xs&V4IeOrC]{{ b;Psmdkv9@2iBx=Q(7ZCWQu~Y' );
define('FS_METHOD', 'direct');
define('DIRECT_METHOD', true);

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'tac_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
