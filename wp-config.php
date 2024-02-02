<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'socius' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'a%~_ 8P>epuAoBq-alR(PK(+}r#rHeLYjrqJdclX: h,b;T5o7GvfA?!V#w]2Jh3' );
define( 'SECURE_AUTH_KEY',  'DtY*n.R@*ns~}iSxu-HknZ:og97T&ScN$%whJaw{]_ZZdb LI`zv1bfQep2=gOO5' );
define( 'LOGGED_IN_KEY',    '/-A8dJ`<[B$Kt`%^?z~+3`79NM8-|_Bn,5!@G.=x.yXN?+tNr??jzrP=3S2~y8tb' );
define( 'NONCE_KEY',        'h]oDIC1~*X`k]z8PVTO5z(iuzz3XQEP/zzz[=nT6VWXlyEk-/!dPdkrG&sMI+bh;' );
define( 'AUTH_SALT',        '|*Co@((1nKKVN/B:d:#H2:~+UU<@ro&b0jVNxDo?ge){jEe4/rjE?CYV#zK]s?**' );
define( 'SECURE_AUTH_SALT', '3wsIC;vi%GNey47gB!3}g5h=AYuk3/(hV>xS!K|yF_=ruo,mb^;dvGU2ohAH}x4;' );
define( 'LOGGED_IN_SALT',   '2w:M^%3C<2$r$Ms<|dtsd:HE(}8D!v!igI1$Ke,lVflQ[)2$1|Fcsz_4Wlj<{B= ' );
define( 'NONCE_SALT',       '9~-zXgo9od`,Z+S0gnrnY@GYsTK99,..c b]x`a$/{~us]KzY?G)(]R2-4//Xq4y' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'fshp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
