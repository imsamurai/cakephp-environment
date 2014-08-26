<?php

/**
 * Author: imsamurai <im.samuray@gmail.com>
 * Date: 26.08.2014
 * Time: 11:49:37
 * Format: http://book.cakephp.org/2.0/en/views.html
 * 
 */

if (!class_exists('FixtureInjector', false)) {
	App::uses('FixtureInjector', 'Environment.TestSuite/Fixture');
	App::load('FixtureInjector');
}
if (!class_exists('CakeTestRunner', false)) {
	App::uses('CakeTestRunner', 'Environment.TestSuite');
	App::load('CakeTestRunner');
}
if (!class_exists('HHVMTestSuiteDispatcher', false)) {
	App::uses('HHVMTestSuiteDispatcher', 'Environment.TestSuite');
	App::load('HHVMTestSuiteDispatcher');
}
if (!class_exists('CakeBaseReporter', false)) {
	App::uses('CakeBaseReporter', 'Environment.TestSuite/Reporter');
	App::load('CakeBaseReporter');
}
if (!class_exists('CakeHtmlReporter', false)) {
	App::uses('CakeHtmlReporter', 'Environment.TestSuite/Reporter');
	App::load('CakeHtmlReporter');
}
if (!class_exists('CakeTestSuiteCommand', false)) {
	App::uses('CakeTestSuiteCommand', 'Environment.TestSuite');
	App::load('CakeTestSuiteCommand');
}

Configure::write('Environment', Hash::mergeDiff(array(
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
