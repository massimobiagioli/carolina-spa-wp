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
define('DB_NAME', 'carolinawp');

/** MySQL database username */
define('DB_USER', 'homestead');

/** MySQL database password */
define('DB_PASSWORD', 'secret');

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
define('AUTH_KEY',         '=m*r-fxmUk7/DUWMMXhLJ7rN.)/LNs4M;ns?,q~S53IItYx/7qF6efNWXn6rgH2n');
define('SECURE_AUTH_KEY',  '{q!1%zsVSMG(rM88{zEK4P-2N<]ndD)=o*JCm0l KdK`GI]wz,gKZ?}RB*9._Elj');
define('LOGGED_IN_KEY',    'qBQ&,uxQgtc.,_,%4ZlnXOQBR/UD3QrFj!>]]I0`&mpk!gGBLc942x@;Ya{FllpH');
define('NONCE_KEY',        'RNmG:Gv?AJet$Y([fRoXD[/-,Sn]~%?u!=D=b%gzt!=1Pu^5ZaCsQ}p.7)j7JMxM');
define('AUTH_SALT',        'eyThlN>da)9gp_sSn)dL(>>F+g`dPgmRrV}c:hWb34f Y=h1(%PnG0)u`7Q{*v)(');
define('SECURE_AUTH_SALT', '{0w#5 ?4;G&xdv5%]m(gd+ F=}jb?cLw7? ++0PB:[cytxHXhBLcko_UwU!IUpDe');
define('LOGGED_IN_SALT',   ';4]-oF)EKk%=?Qw+}|J55*mHN$0SY+7^QVlSbf_=lJ3GT7O*KHi%jfA[BJ29D7z,');
define('NONCE_SALT',       'VDK>x3!;s5z*g%NRBo~a]|DA-0Y_lQ//>qi?X${I|%bAHLRZY@u>iJVGMr<ZOL{y');

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
