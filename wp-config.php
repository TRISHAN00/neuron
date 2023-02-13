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
define( 'DB_NAME', 'neuron2' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         '}UM}Ucna.wzc4,/Kku4f7Mkbva@1n^[py,L{H/>mvnL?J[<`dl!4V[4[b]K|s{_4' );
define( 'SECURE_AUTH_KEY',  'ZsZ|5EB{~(||QrwyOxo[uRBn4?LuG22t.m-[vr+Qj-++?,Bw=~ko1tYHh BGh 78' );
define( 'LOGGED_IN_KEY',    '{}MLQMBia@R;c!Z$+g[8artms[|*Kn+uqS[8mnTIPy?>3=W(9/ }6jWM]/h0@yd;' );
define( 'NONCE_KEY',        'Q:_O8+&)K%XSp$% ?=|Nx{c6Vq=>+P6HH641f*R@C_&]ifS_*me+?K_I[y2QWa<{' );
define( 'AUTH_SALT',        'Cd0$puZc;P,@Xwj=6DrJG:xS_Nl5MyOBzJnr>BDRnIka_755Yf%VJ^(Z8n ioGrJ' );
define( 'SECURE_AUTH_SALT', 'iEIS:u~n=efk9S;m5xi`wn,*E_BV ^or?sNB1eGYC`[DAFK;.1*!b:a*2U$6&KwD' );
define( 'LOGGED_IN_SALT',   '@F:betwXX|jco56.+z6n1)&KSj[PcF7yTJ+pu{87vE4/f,^]@p{PVW]j*1#4@v^#' );
define( 'NONCE_SALT',       'WIuBzI_xRZQ+Qc*T43W2}r1y7.7j?O>REj%?]%K.0lOOBsv2-3Z(%Z;G>6).zXWH' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
