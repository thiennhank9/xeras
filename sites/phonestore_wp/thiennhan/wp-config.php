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
define('DB_NAME', 'phonestore');

/** MySQL database username */
define('DB_USER', 'congtran');

/** MySQL database password */
define('DB_PASSWORD', '1231231231');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'TN:`QFL4@ev2v3<QSKYc}:?!Sz$^OeY;IVmXkA#yz`GBP9P?|emz5br{sM`m #!E');
define('SECURE_AUTH_KEY',  'n/$CJ@z}KNJ7FmXtfE:<@[gE^;j?RR|{/=abeVo{9r1j|<jh1|Wn%E(%UXug_k`=');
define('LOGGED_IN_KEY',    'lJnSJRkC~ig[ {JUv8Y(;=lidV!t/peHd450c$;Tul^t<tg&}S{Qq d[HbE~?qS7');
define('NONCE_KEY',        'M7jc:lu|b-m? QKUSp*:wj9; t7a{zs+LdfPKI,M`9.;&gOi%1A+)Fixq5o_sDAF');
define('AUTH_SALT',        ':`!]w,r6{yhOHlNJKoRPMbIcI>$W8v>U$h@OiuafO:$01W9rYL!,LWoqP*i?b/lN');
define('SECURE_AUTH_SALT', '=`&!t=^%9vl]DdYf4+tN<nyYoHadT-IYDESY(k9N<g6T{`~w^}Psw,:h`K/:diHV');
define('LOGGED_IN_SALT',   'Z}?CZ(ZiqIKG~/ >:;CVZq2DM8.bIM_I;Y~Rs4DG3.uu X=~2b<BI[/Oq__J {YD');
define('NONCE_SALT',       ',U(zZRgRW6H^ ?wJ;wE^zL$uK}p3XNnjge>j{{*82_@l3Xp(>)-~f@5?TH&mAr]A');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
