<?php

/**
 * Author: imsamurai <im.samuray@gmail.com>
 * Date: 08.07.2013
 * Time: 16:30:00
 * Format: http://book.cakephp.org/2.0/en/console-and-shells.html#shell-tasks
 */
App::uses('AdvancedTask', 'AdvancedShell.Console/Command/Task');

/**
 * @package Environment
 */
class EnvironmentInstallTask extends AdvancedTask {

	/**
	 * {@inheritdoc}
	 *
	 * @var string
	 */
	public $name = 'Install';

	/**
	 * Execute all active checkers
	 *
	 * @return void
	 */
	public function execute() {
		parent::execute();
		$templatePath = App::pluginPath('Environment') . DS . 'Template' . DS;
		$scripts = Configure::read('Environment.scripts');
		$status = $this->_installScripts($scripts['webroot'], $templatePath . 'webroot' . DS, WWW_ROOT);
		$status += $this->_installScripts($scripts['console'], $templatePath . 'Console' . DS, APP . 'Console' . DS);
		foreach ($status as $script => $success) {
			if ($success) {
				$this->out("$script <ok>installed</ok>");
			} else {
				$this->err("$script <error>not installed!</error>");
			}
		}

		$success = $this->_installScript("cake{$this->params['consoleHandler']}", $templatePath . 'Console' . DS, APP . 'Console' . DS, 'cake');
		if ($success) {
			$this->out("<ok>Set default console handler to {$this->params['consoleHandler']}</ok>");
		} else {
			$this->err("<error>Can't set default console handler!</error>");
		}
	}

	/**
	 * {@inheritdoc}
	 *
	 * @return ConsoleOptionParser
	 */
	public function getOptionParser() {
		$parser = parent::getOptionParser();
		$parser->description('Install environment')
				->addOption('consoleHandler', array(
					'default' => Configure::read('Environment.console.handler')
		));
		return $parser;
	}

	/**
	 * INstall scripts
	 * 
	 * @param array $scripts
	 * @param string $source
	 * @param string $destination
	 * @return array
	 */
	protected function _installScripts(array $scripts, $source, $destination) {
		$status = array();
		foreach ($scripts as $script) {
			$status[$script] = $this->_installScript($script, $source, $destination);
		}
		return $status;
	}

	/**
	 * Install script
	 * 
	 * @param string $name
	 * @param string $source
	 * @param string $destination
	 * @param string $destinationName
	 * @return bool
	 */
	protected function _installScript($name, $source, $destination, $destinationName = '') {
		$destinationName = $destinationName ? $destinationName : $name;
		return copy($source . $name, $destination . $destinationName) && chmod($destination . $destinationName, 0777);
	}

}
