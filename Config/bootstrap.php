<?php

/**
 * Author: imsamurai <im.samuray@gmail.com>
 * Date: 26.08.2014
 * Time: 11:49:37
 * Format: http://book.cakephp.org/2.0/en/views.html
 * 
 */

App::uses('FixtureInjector', 'Environment.TestSuite/Fixture');
App::load('FixtureInjector');
App::uses('CakeTestRunner', 'Environment.TestSuite');
App::load('CakeTestRunner');
App::uses('CakeTestSuiteCommand', 'Environment.TestSuite');
App::load('CakeTestSuiteCommand');
App::uses('HHVMTestSuiteDispatcher', 'Environment.TestSuite');
App::load('HHVMTestSuiteDispatcher');
App::uses('CakeBaseReporter', 'Environment.TestSuite/Reporter');
App::load('CakeBaseReporter');
App::uses('CakeHtmlReporter', 'Environment.TestSuite/Reporter');
App::load('CakeHtmlReporter');

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
