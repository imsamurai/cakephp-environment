<?php

/**
 * Web Access Frontend for TestSuite
 *
 * @package SnatzAdmin
 * @subpackage Test
 */
set_time_limit(0);
ini_set('display_errors', 1);
/**
 * Use the DS to separate the directories in other defines
 */
if (!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}
/**
 * These defines should only be edited if you have cake installed in
 * a directory layout other than the way it is distributed.
 * When using custom settings be sure to use the DS and do not add a trailing DS.
 */
/**
 * The full path to the directory which holds "app", WITHOUT a trailing DS.
 *
 */
if (!defined('ROOT')) {
	define('ROOT', dirname(dirname(dirname(__FILE__))));
}
/**
 * The actual directory name for the "app".
 *
 */
if (!defined('APP_DIR')) {
	define('APP_DIR', basename(dirname(dirname(__FILE__))));
}

/**
 * The absolute path to the "Cake" directory, WITHOUT a trailing DS.
 *
 * For ease of development CakePHP uses PHP's include_path.  If you
 * need to cannot modify your include_path, you can set this path.
 *
 * Leaving this constant undefined will result in it being defined in Cake/bootstrap.php
 */
//define('CAKE_CORE_INCLUDE_PATH', ROOT . DS . 'lib');

/**
 * Editing below this line should not be necessary.
 * Change at your own risk.
 *
 */
if (!defined('WEBROOT_DIR')) {
	define('WEBROOT_DIR', basename(dirname(__FILE__)));
}
if (!defined('WWW_ROOT')) {
	define('WWW_ROOT', dirname(__FILE__) . DS);
}

require_once ROOT . DS . 'vendor' . DS . 'autoload.php';

if (!require_once ROOT . DS . 'vendor' . DS . 'cakephp' . DS . 'cakephp' . DS . 'lib' . DS . 'Cake' . DS . 'bootstrap.php') {
	trigger_error("CakePHP core could not be found. Use 'composer update' or 'composer install' at the top of the project!", E_USER_ERROR);
}

if (Configure::read('debug') < 1) {
	die(__d('cake_dev', 'Debug setting does not allow access to this url.'));
}

HHVMTestSuiteDispatcher::run();
