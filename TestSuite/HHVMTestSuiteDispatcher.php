<?php

/**
 * Author: imsamurai <im.samuray@gmail.com>
 * Date: Mar 12, 2014
 * Time: 4:55:29 PM
 */
App::uses('CakeTestSuiteDispatcher', 'TestSuite');

/**
 * HHVMTestSuiteDispatcher
 */
class HHVMTestSuiteDispatcher extends CakeTestSuiteDispatcher {

	/**
	 * Runs the actions required by the URL parameters.
	 *
	 * @return void
	 */
	public function dispatch() {
		$this->_checkPHPUnit();
		$this->_parseParams();

		if ($this->params['case']) {
			$value = $this->_runTestCase();
		} else {
			$value = $this->_testCaseList();
		}

		$output = ob_get_flush();
		echo $output;
		return $value;
	}

	/**
	 * Static method to initialize the test runner, keeps global space clean
	 *
	 * @return void
	 */
	public static function run() {
		$dispatcher = new HHVMTestSuiteDispatcher();
		$dispatcher->dispatch();
	}

	/**
	 * {@inheritdoc}
	 *
	 * @return void
	 */
	protected function _checkXdebug() {
		if (!defined('HHVM_VERSION')) {
			parent::_checkXdebug();
		}
	}

}
