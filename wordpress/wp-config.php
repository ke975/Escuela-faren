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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'clase' );

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
define( 'AUTH_KEY',         '%dCIL+|Y}(y4bX+p (e|QET;0BnV4<I`bTOB]5`,IYh5Vt|%%5t`R7EuLi{aTj>|' );
define( 'SECURE_AUTH_KEY',  'N<fb-q`Igp*fWxD^2TIG8@<a1g~0y3O~v|Pl)0]B3vl6sWSNLx)v&Y@9NyuRHF[.' );
define( 'LOGGED_IN_KEY',    '!fjsZTj8IFcNz%tusCNU._}0d:dXXX{E9>aHnyf |pk1=h8LNUpZ^{V?n)3=]R&D' );
define( 'NONCE_KEY',        '{gioMSp2?;b&B%jk!My+WwQo*G1Y`tY%n:Vg%P(DxS<[ATPl%qaq/m;[MW!LI~J=' );
define( 'AUTH_SALT',        '=9-k(}_{F;^qo s#)}|rOjFWYb51}Rqo<0fU jJuA3W+*yQ;Oq1~w9{1# V7NK6/' );
define( 'SECURE_AUTH_SALT', 'kW3LSO0pA<%7J8f5d@6|.P2oio--xu_`Zwp>Y/U @2xdsJ%4!sC2PxJHJN?cx%~/' );
define( 'LOGGED_IN_SALT',   '=yv^` ;76X5#-hnQf~aNz6tm8mO:eNuSGoS#+;KXY?P )xBpaXZQMeL%`9l|k{;h' );
define( 'NONCE_SALT',       'OYlO/pc]`~ZdGeScKqO!:6GPp%<eYaw(Q&p(<w~i}t_ez*.-p=$&1J!4m=+A8=nN' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
