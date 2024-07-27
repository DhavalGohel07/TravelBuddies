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
define('WP_ALLOW_REPAIR', true);
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'XY^qs:zVBD:<^n-4T8Y/j{+#SU*^}W}>o$4@[(kC%^hEJ9b*IOgyzk*.+fsx:=/!' );
define( 'SECURE_AUTH_KEY',  'C8R)?ga^;fjiw@Hv;I>U]8>A8t;2bX>=G!n1)Aw*L.5`J!#*/so<Ykv=8_U$ bbW' );
define( 'LOGGED_IN_KEY',    '[}?+x?$8CBUG(D: z_;_r]Q9M~E*+wuBv1)Oe0j5yA[fyd~rPwKyP}aKgH3sq1C9' );
define( 'NONCE_KEY',        's7(#e_qRsN2s1/b!,/WfADKSw9*R$ERaJ*mfl? g(]~~,hM!qTIA>V62,6if=7}T' );
define( 'AUTH_SALT',        '1, :qAL|]Kge@akd>bIbyiG+1(2;@VPb.6mL }cNb09J{Zm0fZ[bs=hl+)[#V@lT' );
define( 'SECURE_AUTH_SALT', '.WOWaxQT|;MJveS6 i;WBiUPrJE{;Z(q jPt8K`NQm/6n<7#1bNPMg9L!6OKWT3u' );
define( 'LOGGED_IN_SALT',   '0Gn< KK&T2o{W^ek;[`_/j%,4VmU*KHkj)O])kE5vyp|,iv&)grpuU$m~Gu}K|wv' );
define( 'NONCE_SALT',       '.cLhQ_prjxK;3E$;IyrT<$6~ru]7Kahw@yYP{3EvUK%%=-voNUeHn!os=:33_@-|' );

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
