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
define( 'DB_NAME', 'job_sheet' );

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
define( 'AUTH_KEY',         ')$D}bO,1h:X4Uh1-$slwDP5*Xm#:rG%.v$_I!SC~/HAVn9vFa;/T{HZ*{WG2-%tA' );
define( 'SECURE_AUTH_KEY',  'S3,B5@3qJcO?$9weg%Mw%yyH7ZOEl_Jp s8ff!A3_d8(IlPhRxzhL_N]vPk>|f]|' );
define( 'LOGGED_IN_KEY',    ',ed}~C@ /%AO)OG.h7^YIJ~ipv~UwvW6xqNxVR~HO}BZw?>,8F:C}<@3.v`2/L)4' );
define( 'NONCE_KEY',        '|P=-rLnfl/v{@BJ(~jWGTVhJt?-D4p;UQl^tV(lv2;M*P3f)kt Go9JP]#,:!nbb' );
define( 'AUTH_SALT',        'B9C=d*&52b[%zI+I}*BccNqarDpevKju+s3=BI $8w9DIY=#3&aX>^x4s^pW9N.4' );
define( 'SECURE_AUTH_SALT', '_;L{d} ]phD9>rw3l*++Dn9*)Ge=(.))9|V+Ag_tuTS14r|4-nQ4_ut=#yr>:E+[' );
define( 'LOGGED_IN_SALT',   'Gh*cb:?8Hu](c+<y<67hV>ty8JS4?0 !6$vO9ijbG);lugFeLQ7mJ_L,1>Z)0ug{' );
define( 'NONCE_SALT',       'dBA]!h@ ~r(l#K!2I~^b3S6iLwpC?=3C5PQe]+!eu_>n&Ca`K#~6a&U2:uRVH <R' );

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
