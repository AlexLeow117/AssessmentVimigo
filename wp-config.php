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
define( 'DB_NAME', 'assessmentvimigo' );

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
define( 'AUTH_KEY',         'PShb6=ZcRgbi1:|txnLeOZJ<``WCot~h(kthk9$[MUZgA7*u(7+m_6Z@ E43=myH' );
define( 'SECURE_AUTH_KEY',  '`G/3e$e QTFhg%t>k(yVC6e^^ZgStFL@iM~-w8-AF7Lsn967{i&k!?7l//;&fi:@' );
define( 'LOGGED_IN_KEY',    '$MR4EpShDbb_:AKi$Ok-iaXKWwl9bM*$sflsrhF73qiY4;xXcT]gzwY|Z0FXT*<d' );
define( 'NONCE_KEY',        '{X,I,3T0(s+h2M2c`fY.B=zVBnN?Exki-wjp>w(6o!Hy,|c;m<dME,:M!showB`%' );
define( 'AUTH_SALT',        '1a;|oI-B7MVIE/K/sY&sVY@5=(vu72#kJ-g0n/IXc|<rtYP3[SSvE;a)OyPgbNZq' );
define( 'SECURE_AUTH_SALT', 'tNe}e#yP8XSCRxES>zq{Bqu$&aN=j3*Y#b@.bs!p 7]%/rX^wlR([bT(7ax)ZhuI' );
define( 'LOGGED_IN_SALT',   'iOA#bS (<Sf_49ofTJQ{<E}>#Bc*/X+3DXa|cYf{EDU<mI+5syDYmCBW;k8GP|YI' );
define( 'NONCE_SALT',       'f/;_;<1Smt<[ |XM0-9FGy+$SIhyILIK233[U&DP^n1(N/ig],Bx<O{Qh<Sbz7RK' );

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
