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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'hwXgiyW2ofXa32PFPnmE3+2DSabbyzNQ2G05h3lkFXqNg7UyQ4OwENy7u+qidW/GZwhFbcS3M4PdPOlrigAIFw==');
define('SECURE_AUTH_KEY',  '9AGEKVBbzCmYHdsHGKNFzVmQ/cN/GokrYGhwMzGqw1tb7ZGcAn3kafm7yRh2Z2IP0uOinmXnwqkZKaNRmtDHaA==');
define('LOGGED_IN_KEY',    'xD/JhuSVKT99N8QAZWGMyZMCJEVJVfhTjNbkf4+ryI/dgDe3ldu6Be+SIJxoRlrmH8xIYCdRGXScehFQ/VnUMA==');
define('NONCE_KEY',        '6MuHrxLiLQT5VTnbhDDGX7gN4EJQ8V8GL6k0bXd7lmA8ZpeyCdkqF1vrqlQNi31VlkxXDglIX6LrCoun34Qpog==');
define('AUTH_SALT',        'RvWAG91I7VJRWTmYNSr3deg/CGkFfnPtEKzBdGmixz8kEnJk7Cao8ufBApneLW+j1uhKCgTdBIpkjjTrJjS88Q==');
define('SECURE_AUTH_SALT', 'E5a9FP748+B2TXnhiCKaVA1XhUSy6fGkADuwd4cNlM7pB07olKVCZW90z0T3bCd8hezL6lxI4k3jAMOTjeHlnw==');
define('LOGGED_IN_SALT',   '9sTaErRW1pwznFDNB40u/l79wjucfi/MgzHG4S5p0ygcDx4n1YiiLgZlfHiHXKGEGD5lR6Lc54I/Uk3KztVo3w==');
define('NONCE_SALT',       'xrbbdijHmtneOlToa0BGomQnYLgFUgmTMbOnUb41ASoaY8dxOr7GGB1h4sx/TW7KyLITcKiKIM28dk6ypA0Nnw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'lt_';





/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
