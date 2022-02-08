<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'smx');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'smx');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'Ji5SCJqJF8)J');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', '92.205.5.117');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'g5p@l85W_!$jX,k(FL$Bps@9~81sbx0_MPn1YmAF&Ct`%.|?R~iCN}.P|f K!o=1');
define('SECURE_AUTH_KEY',  'q_342fmjt:U|1R<`xmi,R!0X!-|>@iF4Uo-+9$R&$#yu#d+T@.<2 a?wZ-cs+8$v');
define('LOGGED_IN_KEY',    'E==xXp_#:{|sh$KS7lOqoJMh1_gcS}Lo=@?:V4)i*_>jgTR;.<!g(fTE{sLccVVo');
define('NONCE_KEY',        'B-qE82SM.@83Y@nL-D6(}_e]w-*OkPC--AJNa!+~r1e4OWi $H{et^`N.SkKzeGw');
define('AUTH_SALT',        'F<OT)fE7M4A12~iS9c&A!!fu1f=9dy$^J>p*;U1S5|k3X*j_bF-<_+2PJ#).5g|.');
define('SECURE_AUTH_SALT', '~STGA~!ePrQP9ke}+E+Vw=~q/W;ezl2_]FfB6%Wc[t{P,+$k.2cZ,/wuCI3}#$-s');
define('LOGGED_IN_SALT',   'c>-Tdh~thXL%BOeY4f;Kv(4N?JM$M7[W4T#v^/7Nu]>v#&K_.-V#lz,~|FI9jC(.');
define('NONCE_SALT',       '-><o{?#1?$hW-f9AKN1U}1RFS`j@vx}$4_--^}Wr :*oLP$YHywL3:QwCHxNoUEN');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'smx_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
