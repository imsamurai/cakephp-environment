Cakephp Environment Plugin
==========================
[![Build Status](https://travis-ci.org/imsamurai/cakephp-environment.png)](https://travis-ci.org/imsamurai/cakephp-environment) [![Latest Stable Version](https://poser.pugx.org/imsamurai/cakephp-environment/v/stable.png)](https://packagist.org/packages/imsamurai/cakephp-environment) [![Total Downloads](https://poser.pugx.org/imsamurai/cakephp-environment/downloads.png)](https://packagist.org/packages/imsamurai/cakephp-environment) [![Latest Unstable Version](https://poser.pugx.org/imsamurai/cakephp-environment/v/unstable.png)](https://packagist.org/packages/imsamurai/cakephp-environment) [![License](https://poser.pugx.org/imsamurai/cakephp-environment/license.png)](https://packagist.org/packages/imsamurai/cakephp-environment)

- phpunit 4.1.*
- composer autoload
- hhvm compatible
- console switched to hhvm by default

## Requirements
	- Composer
	- hhvm (default handler, you can change to `php`)

## Installation

1. Install via composer latest package imsamurai/cakephp-environment.

2. Add plugin loading in Config/bootstrap.php

	CakePlugin::load('Environment', array('bootstrap' => true));

3. Run `Console/cake Environment.environment install` (check help for options).
