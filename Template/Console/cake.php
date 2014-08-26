#!/usr/bin/php -q
<?php
/**
 * Command-line code generation utility to automate programmer chores.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc.
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Console
 * @since         CakePHP(tm) v 2.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$ds = DIRECTORY_SEPARATOR;

require_once dirname(dirname(dirname(__FILE__))) . $ds . 'vendor' . $ds . 'autoload.php';
App::load('HHVMTestSuiteDispatcher');
App::load('FixtureInjector');
App::load('CakeBaseReporter');
App::load('CakeHtmlReporter');
App::load('CakeTestSuiteCommand');
App::load('CakeTestRunner');

return ShellDispatcher::run($argv);
