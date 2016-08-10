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
define('DB_NAME', 'maadithottamdb2');

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
define('AUTH_KEY',         '[tLLjYxD+;q?3y@)7kL6j#MA>VKrk2`hmGI;AM,,~,Bn[Q_M^qLMVB5o[X&*YfXQ');
define('SECURE_AUTH_KEY',  ')tV6lE$<MDB JS%=9D--0*F{[c0n79mvx{elwz;Nun)TAuxjsl$s:GX*h:&Q_elT');
define('LOGGED_IN_KEY',    'd$kSdFKqpIE^7AhC`Y%<&AC~*[(/~0`9ZK6:$V<(LgFWq#Trb6!9|`5uDI$l2Dh{');
define('NONCE_KEY',        'H)kTYn9?C VfIVB ^)#r;U-}6_?y~bGF};h0uQQ,pO96 &jH//!piQi4/{yE !Ak');
define('AUTH_SALT',        '-Ri)<yN=M@E(@MZ^{Qm2Q9m:y-C,nDO,7w^Z=o?+}fNUj^5yW5-h//m]+2TxTNvB');
define('SECURE_AUTH_SALT', 'W7I*Cvq_95:GP8HY)G:dSZ^Bh^;mDuT^,#emuJ3w#%z2U[mi>5HajPL`0P)SdK($');
define('LOGGED_IN_SALT',   '(0~XNe8<adV74PNCA@{r?_o]n/Xw;![6f] e()HC,&cQHZ8u:vUjB&D5ywo}a.vu');
define('NONCE_SALT',       'wla7_S@.vxvPbC(5xtA+^2HsK/SL6!C-.)+-YwS#?Sh}2_5gkODinaHXTl2(f>KJ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mt_';

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
