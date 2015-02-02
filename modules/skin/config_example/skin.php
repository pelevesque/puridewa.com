<?php defined('SYSPATH') OR die('No direct access allowed.');
/*
 * Skin Configuration Example
 *
 * This file contains a few examples of what you can
 * do with the skin configuration. It is not exhaustive
 * so you should read the helpers/skin code to truly
 * understand everything that can be configured.
 *
 * NOTE: You must move this configuration file to your 
 * skin folder and modify it to suit your skin's needs.
 */

// Ex: Configuring dependencies for all views.
$config['views'] = array(
	'stylesheets' => array(
		'skins/default/assets/css/mystyle.css' => 'screen',
	),
	'scripts' => array('skins/default/assets/js/myscript.js'),
	'files' => array('skins/default/assets/files/myfile.php'),
);

// Ex: Configuring dependencies for all views in the admin folder.
$config['views']['admin'] = array(
	'stylesheets' => array(
		'skins/default/assets/css/mystyle.css' => 'screen',
	),
);

// Ex: Configuring dependencies for the home view in the admin folder.
$config['views']['admin']['home'] = array(
	'stylesheets' => array(
		'skins/default/assets/css/mystyle.css' => 'screen',
	),
);

// Ex: Image configuration.
$config['images'] = array(
	'icons' 	=> array(
		'path' 		=> 'skins/default/assets/images/icons/',
		'type'		=> 'png',
		'unit'		=> 'px',
		'width'		=> 16,
		'height'	=> 16,
	),
	'flags' => array(
		'path'		=> 'skins/default/assets/images/flags/',
		'type'		=> 'png',
		'unit'		=> 'px',
		'width'		=> 16,
		'height'	=> 16,
	),
);

// Ex: Skin credit configuration.
$config['credits'] = array(
	'en-US' => 'skin credits',
	'fr-FR' => '<a href="#">skin credits with <em>HTML</em></a>',
);