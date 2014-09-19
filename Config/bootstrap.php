<?php

/**
 * Author: imsamurai <im.samuray@gmail.com>
 * Date: 26.08.2014
 * Time: 11:49:37
 * Format: http://book.cakephp.org/2.0/en/views.html
 * 
 */
App::uses('FixtureInjector', 'Environment.TestSuite/Fixture');
if (!class_exists('FixtureInjector', false)) {
	App::load('FixtureInjector');
}
App::uses('CakeTestRunner', 'Environment.TestSuite');
if (!class_exists('CakeTestRunner', false)) {
	App::load('CakeTestRunner');
}
App::uses('CakeTestSuiteCommand', 'Environment.TestSuite');
if (!class_exists('CakeTestSuiteCommand', false)) {
	App::load('CakeTestSuiteCommand');
}
App::uses('HHVMTestSuiteDispatcher', 'Environment.TestSuite');
if (!class_exists('HHVMTestSuiteDispatcher', false)) {
	App::load('HHVMTestSuiteDispatcher');
}
App::uses('CakeBaseReporter', 'Environment.TestSuite/Reporter');
if (!class_exists('CakeBaseReporter', false)) {
	App::load('CakeBaseReporter');
}
App::uses('CakeHtmlReporter', 'Environment.TestSuite/Reporter');
if (!class_exists('CakeHtmlReporter', false)) {
	App::load('CakeHtmlReporter');
}
if (!class_exists('Hash')) {
	$merge = array('Set', 'merge');
} else {
	$merge = array('Hash', 'mergeDiff');
}
Configure::write('Environment', call_user_func($merge, array(
			'console' => array(
				'handler' => 'hhvm'
			),
			'xhprof' => array(
				'host' => 'http://xhprof.dev/',
				'utils' => '/var/www/xhprof.dev/xhprof_lib/utils/',
				'storage' => '/var/www/profiler/xhprof/',
				'tag' => 'xhprof'
			),
			'scripts' => array(
				'webroot' => array(
					'index.php',
					'test.php',
				),
				'console' => array(
					'cake.php',
					'cakehhvm',
					'cakephp',
					'cakeprofiler',
					'caketrace',
					'cakexhprof',
					'cakexhprof.php',
				),
			)
				), Configure::read('Environment'))
);
