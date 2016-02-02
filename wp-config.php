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
define('REVISR_GIT_PATH', ''); // Added by Revisr
define('REVISR_WORK_TREE', '/home/admin/web/trento.creotip.io/public_html/'); // Added by Revisr
define('DB_NAME', 'admin_trento');

/** MySQL database username */
define('DB_USER', 'admin_trento');

/** MySQL database password */
define('DB_PASSWORD', 'Ruslan1983?');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


define('FS_METHOD','direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>3XJFwQ{Iz&5`)7vAcRgAMO_pxFm +RHb+f~apbzpUQ5oSVm@YI-m/;;hK/n`;*{');
define('SECURE_AUTH_KEY',  'grt7mm-TRITve1}`)[L^Dnd(w*Z][U}NytZ#:1o|KDBYTP 8uQ2YIJ90Ogt+RXA.');
define('LOGGED_IN_KEY',    'ci5G_kUD6oZ1<nK~e7V][j2s*.kMA>DKPkK<(FM5}b7J+dxG&.R(0$&3QKT0(|f4');
define('NONCE_KEY',        'Dv=`@yJ[iH@>5maZ[pYiG7$**(N=b}~(t<kAb`JYt6X$s$S6OL_xPI[8|_Uw^^o>');
define('AUTH_SALT',        'gq=UDG.rhAm=mz^? %{+tWnVpPZhV`eToS;9#~3|@5D3gfRi%an-=quZwgE|5)*(');
define('SECURE_AUTH_SALT', 'Ao|ts8S:)=.L{o/hir83|Ym`jT##p7K[opsg!20+KDjH{R9f+$=Q.V2M`bFHnt8A');
define('LOGGED_IN_SALT',   'w#w-3<|+Jl6}j]XG+$Dy=oJ!~TSS;pN,,O(XnTd6vS$Y-[i!.^+YU+00*fK0z?Q@');
define('NONCE_SALT',       'i40y~^~16B9)(]Xz:Ra~$>gE GiGkSw{H|mGT5>k?#;PupP#(0uE|@:)Y{Kn8bHT');

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
