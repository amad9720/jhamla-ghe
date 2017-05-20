<?php

/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/fr/function.define.php
 */

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */
define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

/**
 * Configuration for: URL
 * Here we auto-detect your applications URL and the potential sub-folder. Works perfectly on most servers and in local
 * development environments (like WAMP, MAMP, etc.). Don't touch this unless you know what you do.
 *
 * URL_PUBLIC_FOLDER:
 * The folder that is visible to public, users will only have access to that folder so nobody can have a look into
 * "/application" or other folder inside your application or call any other .php file than index.php inside "/public".
 *
 * URL_PROTOCOL:
 * The protocol. Don't change unless you know exactly what you do. This defines the protocol part of the URL, in older
 * versions of MINI it was 'http://' for normal HTTP and 'https://' if you have a HTTPS site for sure. Now the
 * protocol-independent '//' is used, which auto-recognized the protocol.
 *
 * URL_DOMAIN:
 * The domain. Don't change unless you know exactly what you do.
 *
 * URL_SUB_FOLDER:
 * The sub-folder. Leave it like it is, even if you don't use a sub-folder (then this will be just "/").
 *
 * URL:
 * The final, auto-detected URL (build via the segments above). If you don't want to use auto-detection,
 * then replace this line with full URL (and sub-folder) and a trailing slash.
 */

define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);

/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */


/**
 * Configuration for: Heroku
 * Uncomment before pushing to Heroku
 * Comment the configuration for  Localhost
 */
//
	// $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	// $server = $url["host"];
	// $username = $url["user"];
	// $password = $url["pass"];
	// $db = substr($url["path"], 1);


/**
 * Configuration for: Localhost (MAMP/XAMP/WAMP)
 * Uncomment before Testing  to Localhost
 * Comment the configuration for  Heroku
 */

// config Amadou
	$server = "localhost";
	$username = "root";
	$password = "root";
	$db = "mydb";


// //config Hugo
// 	 $server = "localhost";
// 	 $username = "root";
// 	 $password = "";
// 	 $db = "mydb";



define('DB_TYPE', 'mysql');
define('DB_HOST', $server);
define('DB_NAME', $db);
define('DB_USER', $username);
define('DB_PASS', $password);
define('DB_CHARSET', 'utf8');
