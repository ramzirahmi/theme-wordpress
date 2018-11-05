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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'FbrM$)UN2a/gpes#4B!(l4T`B!N@GHo=}hd6w(W8BV8]o)+~2H^Uyu86@)sr-@cW');
define('SECURE_AUTH_KEY',  '(VXU;pTNL<s&Sc.8`j&!Jt]}Vpxt[$okPY3,h6*m3d2h!<JJW1sw/Da-9~mp,9B&');
define('LOGGED_IN_KEY',    'hsfgiYc+V a6U[9nB@uy+=t8TCo@T)vZ@q5#98xk/^&eUPVvRL9eWQDoO`Cwv#-J');
define('NONCE_KEY',        'z9llF|!rbR3Ji0/)]u!uN(=dQ{I!=1lbU~)E$TXK[$jq4(XFA6#8/?j*-Go:0F;b');
define('AUTH_SALT',        'S1m3>x+u]Tead^dF-s?};76n~^}@f2QRr]2Se4t:.JiMH(qP.p3 4|*7o7Po%%EZ');
define('SECURE_AUTH_SALT', 'DA5W&_WYf}hFgH &/eH$0:H_jYIKI d/4 I|d;@+B0yTGwg: NWdUsF:8r!;Ui&}');
define('LOGGED_IN_SALT',   '}PanFld:MrQ:k5Yn.2yacD.NUtS?/]9e,&/!#avVi]]>>=dq}*GWE/xQO[I5OroM');
define('NONCE_SALT',       '|fgm3S!K6e,y}r}O%sK$lNd/1Op}Dma]:uP|O6?~if4IF6Q%HZKB^)il&$+Ij;ue');

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
