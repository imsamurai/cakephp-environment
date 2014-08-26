#!/usr/bin/php -q
<?php
$ds = DIRECTORY_SEPARATOR;

require_once dirname(dirname(dirname(__FILE__))) . $ds . 'vendor' . $ds . 'autoload.php';

// start profiling
xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
register_shutdown_function('saveXhprof');
$result = ShellDispatcher::run($argv);

function saveXhprof() {
	global $argv;
	$_SERVER['REQUEST_URI'] = implode(' ', $argv);
	// stop profiler
	$xhprof_data = xhprof_disable();
	
	$xhprofConfig = Configure::read('Environment.xhprof');

	include_once $xhprofConfig['utils'] . "xhprof_lib.php";
	include_once $xhprofConfig['utils'] . "xhprof_runs.php";

	// save raw data for this profiler run using default
	// implementation of iXHProfRuns.
	$xhprof_runs = new XHProfRuns_Default($xhprofConfig['storage']);

	// save the run under a namespace "xhprof_foo"
	$runId = $xhprof_runs->save_run($xhprof_data, $xhprofConfig['tag']);

	echo "\n{$xhprofConfig['host']}?run=$runId&source={$xhprofConfig['tag']}\n";
}
