<?php

/**
 * Author: imsamurai <im.samuray@gmail.com>
 * Date: 08.07.2013
 * Time: 16:30:00
 * Format: http://book.cakephp.org/2.0/en/console-and-shells.html#creating-a-shell
 */
App::uses('AdvancedShell', 'AdvancedShell.Console/Command');

/**
 * @package Environment
 */
class EnvironmentShell extends AdvancedShell {

	/**
	 * {@inheritdoc}
	 *
	 * @var array
	 */
	public $tasks = array(
		'Install' => array(
			'className' => 'Environment.EnvironmentInstall'
		)
	);

}
