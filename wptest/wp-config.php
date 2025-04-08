<?php

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL
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
define('DB_NAME', 'wordpress-31363936cd');

/** MySQL database username */
define('DB_USER', 'wordpress-31363936cd');

/** MySQL database password */
define('DB_PASSWORD', '8c10cdca000a');

/** MySQL hostname */
define('DB_HOST', 'sdb-b.hosting.stackcp.net');

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
define('AUTH_KEY',         'GPHweps1J4Vwp2tMZrjX+q+RRO3jYPgx');
define('SECURE_AUTH_KEY',  'fyHtGvHJRxDtDzWTMFeZDj9ePDdqg8Ck');
define('LOGGED_IN_KEY',    'J0lm0GpqRCe6bjNQ3TIjl/k769XGaQEI');
define('NONCE_KEY',        'wWlMYeamber53hesBdy7Hb/Q4QrtmRPG');
define('AUTH_SALT',        'aMu3nXwBY9pdxItLdAaPynUX7KoB0u1n');
define('SECURE_AUTH_SALT', '1xgHftQriiZRyNYx3skXDACD5Ksp4XQT');
define('LOGGED_IN_SALT',   'SUX5gWzG17j4KE+r+rRiBOg8IWW95Eb0');
define('NONCE_SALT',       'Ghhgycqs6uYkHTy0oq2LJwtB9YlBFu5w');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ab_';

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
