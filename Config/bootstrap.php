<?php

/**
 * Author: imsamurai <im.samuray@gmail.com>
 * Date: 26.08.2014
 * Time: 11:49:37
 * Format: http://book.cakephp.org/2.0/en/views.html
 * 
 */
App::uses('FixtureInjector', 'Environment.TestSuite/Fixture');
App::uses('CakeBaseReporter', 'Environment.TestSuite/Reporter');
App::uses('CakeHtmlReporter', 'Environment.TestSuite/Reporter');
App::uses('CakeTestSuiteCommand', 'Environment.TestSuite');
App::uses('CakeTestRunner', 'Environment.TestSuite');
App::uses('HHVMTestSuiteDispatcher', 'Environment.TestSuite');

if (!class_exists('FixtureInjector')) {
	App::load('FixtureInjector');
}
if (!class_exists('CakeTestRunner')) {
	App::load('CakeTestRunner');
}
if (!class_exists('HHVMTestSuiteDispatcher')) {
	App::load('HHVMTestSuiteDispatcher');
}
if (!class_exists('CakeBaseReporter')) {
	App::load('CakeBaseReporter');
}
if (!class_exists('CakeHtmlReporter')) {
	App::load('CakeHtmlReporter');
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
