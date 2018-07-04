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
define('WP_SITEURL', 'http://www.wpmock.ga');
define('WP_HOME', 'http://www.wpmock.ga');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'epiz_22308976_ncf');

/** MySQL database username */
define('DB_USER', 'epiz_22308976');

/** MySQL database password */
define('DB_PASSWORD', 'QskRMMLqGXYOwvM');

/** MySQL hostname */
define('DB_HOST', 'ftpupload.net');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '2<IL.iAE2iqe<+*XAE+b9D2aiW*txP;txa]9aeD#[hG~h_CGshlK[hkZ!w-S58@d4');
define('SECURE_AUTH_KEY',  '{.XPIA$um62{.meXP].qLE6;qibT6;#*aeWPH.+tmHA2]tleW2]_+WPH9+tmeH5;');
define('LOGGED_IN_KEY',    'HteA6;leWS;+tSLDtpia1;#hOH_~xp92]wpW1]_~aSK-tph91[phO[_~wG91-woh1');
define('NONCE_KEY',        'JkUB>,UQ^@jJ0}jbY>,UQ7zvcI<nUQ{yuFByub73^fMI,qnEA2if<.TQ6A6.ebH');
define('AUTH_SALT',        'Lyib2{.meWP].+tPHA2uiaT5;#*aSLD*xpiD6;##~xSKD5xpha5;#~hZSK#~wpKD5');
define('SECURE_AUTH_SALT', '+*;Wepait29LTLSa_]19;5DLt+_-_:5ahpelt~DKSaw~|KSZlWdl:5CKCKVd![18:');
define('LOGGED_IN_SALT',   'PLT+.]2]29Hlt+_t+_Leaht5HS_;:9GOt-_x_]1Wdltls-_GOVdOZh#:5C4CKRw~[');
define('NONCE_SALT',       '3Ey,y^{3bjvqy,MbQf<3Ifu6LEP${66Hq*<+.Teqit+DLWHTa.]6D9HSx_]*#2Wi');

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
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
