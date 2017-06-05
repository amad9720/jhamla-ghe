<?php

ob_start();

/**
 * Egghome - an  simple naked PHP application for Class work
 *
 * @package 
 * @author 
 * @link 
 * @license
 * 
 */

// TODO get rid of this and work with namespaces + composer's autoloader

// set a constant that holds the project's folder path, like "/var/www/".
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

// This is the (totally optional) auto-loader for Composer-dependencies (to load tools into your project).
// If you have no idea what this means: Don't worry, you don't need it, simply leave it like it is.
if (file_exists(ROOT . 'vendor/autoload.php')) {
    require ROOT . 'vendor/autoload.php';
}

// load application config (error reporting etc.)
require APP . 'config/config.php';

// FOR DEVELOPMENT: this loads PDO-debug, a simple function that shows the SQL query (when using PDO).
// If you want to load pdoDebug via Composer, then have a look here: https://github.com/panique/pdo-debug
require APP . 'libs/helper.php';

//This load lib function (for dev and prod)

require APP . 'libs/lib.php';

//load application Database and base query functions
require APP . 'core/database/database.php';
require APP . 'core/database/database_object.php';

//load the session class
require APP . 'core/session/session.php';

// load application class
require APP . 'core/application.php';
require APP . 'core/controller.php';

//lauching the database
$database = new Database();

//Start a Session
$session = new Session();

// start the application
$app = new Application();
