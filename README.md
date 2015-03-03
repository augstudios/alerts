# Alerts

[![Build Status](https://travis-ci.org/augstudios/alerts.svg?branch=master)](https://travis-ci.org/augstudios/alerts)
[![Total Downloads](https://poser.pugx.org/augstudios/alerts/downloads.svg)](https://packagist.org/packages/augstudios/alerts)
[![License](https://poser.pugx.org/augstudios/alerts/license.svg)](https://packagist.org/packages/augstudios/alerts)

## About
_**This package is in very early initial development, things are very likely going change before a stable release is tagged.**_

Alerts is a Laravel 5 package that allows you to easily flash alerts to the `Session` to be consumed on the next request. 

## Installation

First, install the package and it's dependencies with composer by running within your application's root folder:

	composer require augstudios/alerts
	
Then, you will need to add the the `Alerts` service provider and facade for alerts to your application's configuration in `/app/config/app.php`.

	'providers' => [
	    ...
	    'Augstudios\Alerts\AlertsServiceProvider'
	];
	...
	
	'aliases' => [
		...
	    'Alerts' => 'Augstudios\Alerts\AlertsFacade'
	];

## Usage

To flash messages, to be displayed on the next request, you can use the `Alerts::flash(message, type)` method:

	public function save()
	{
	    Alerts::flash('Welcome Aboard!', 'info');

	    return Redirect::home();
	}

There also exists some shortcut methods for each alert type:

    Alerts::flashInfo('Info message');
    Alerts::flashWarning('Warning message');
    Alerts::flashDanger('Danger message');
    Alerts::flashSuccess('Success message');
    
To get the previously flashed alerts, use the `Alerts::all()` method:

	foreach(Alerts::all() as $alert){
		// this is likely to change so Alert is an object
		// $alert['message'] has message
		// $alert['type'] has type
		// $alert['dismissiable']
	}    
	
If you only want one type of alert, you can use the `Alerts::ofType(type)` method:
	
	Alerts::ofType('info');
	Alerts::ofType('warning');
	Alerts::ofType('danger');
	Alerts::ofType('success');
