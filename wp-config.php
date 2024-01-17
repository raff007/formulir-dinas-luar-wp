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
define( 'DB_NAME', 'db_dinas' );

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
define( 'AUTH_KEY',         'I*+#ilW0<H,y2$=i:D^sxZ`m}/D @ 2|hmlp{WbdgS9q&6X}%M`=jDXw7TK*JC:;' );
define( 'SECURE_AUTH_KEY',  '%TAva>!fS4uX9i$Da~%+cuo7D+)IZTm6{ont,6nEfEs@PL*T2`NYr%]#ruh.43%V' );
define( 'LOGGED_IN_KEY',    '@u~s/Xqe[Iw%#^5#t;oNtHXJS,=m$UkL;-`U]JGbg^3Em> qvd>b_-Z`sYjGEIT1' );
define( 'NONCE_KEY',        'et(u6-N]}o#r=0N]iE}2{7V:Z8:;L,_A0K07:A}Rhtky(HG-oHP_!t7!<dub(=o4' );
define( 'AUTH_SALT',        '.U4}tw<}VjnH/;P{XO)<AyDUS37dXp[u]E.s;$Xy9ns+a$04Bi*s,k1$FsB?K_:3' );
define( 'SECURE_AUTH_SALT', 'tX{YaQ(SnUR}?~mb(gZ9G9i[KwqyA`cxJ{# q+C]v1s.O(~t;]R[bb_ A @>Ge3-' );
define( 'LOGGED_IN_SALT',   'E Uc=er?v` r>Wxq>_X0y%i9{Qx%eDEs71/{n!A:#p5e7As:X35F4!*b6Q%q_Uz$' );
define( 'NONCE_SALT',       'Afy/T#-v$pGWq`502#cK@g pWC*.a42. +0hKZ`Re?r}z$L_.*#K;ngTaibtK#6=' );

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
