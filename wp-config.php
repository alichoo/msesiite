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
define( 'DB_NAME', 'wordp' );

/** Database username */
define( 'DB_USER', 'wordp' );

/** Database password */
define( 'DB_PASSWORD', 'wordp' );

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
define( 'AUTH_KEY',         '^R(H[H4[S<tl,<+xia+3dG_<eA.=Zb0;wh6W3gj_%):=[9`lOUq,/9@D|L?ksAN.' );
define( 'SECURE_AUTH_KEY',  '8 uK*A{*T BMh)/Z:)qpV59Cw6w`OP&gi.F914oPEh4usTAn^1wl@G-I_]8<paPy' );
define( 'LOGGED_IN_KEY',    '6y,{>zQ}iAh@{GuZ)t$t.HiEH%<jw4^ew]){JzClBa#T~t[6+_P1J0d1-0~z0uF?' );
define( 'NONCE_KEY',        'iWEb?~-k=wgON>`n!fi,:OV 94n}.Pg;pl5Q08zB{w #lp([#Qzd^D!{4>GZG7?x' );
define( 'AUTH_SALT',        'c tvv%DRA-[>$ 8b4B=YTG2PO4:uaPA#(}3#w?` zpCB<5X)jFw.<Evr6t>lF1NE' );
define( 'SECURE_AUTH_SALT', '@lH(-rDIV>99qcUGT!?WQxD_nBJkpRDD~--/GD^zi_h<1[}m3@dV!bEViW>V5W`s' );
define( 'LOGGED_IN_SALT',   'Yx/=&o/Lu8Xc*^5!Wt  74_]V:K-r^A|2WldP/GE*.>*yS/EGsC@[_u,7>+0#Pbl' );
define( 'NONCE_SALT',       ';<t40;t:dQ7mqXcW%&kK7v(1G5Rz<4U|`]vM8z]T!ZV{v|X5_<@2Jm{^XF6=U_yG' );

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
