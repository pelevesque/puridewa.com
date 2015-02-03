<?php defined('SYSPATH') OR die('No direct access allowed.');

// Contact.
$config['contact'] = array(
	'address'	=> array(
		'village'		=> 'Tibubiu',
		'region'		=> 'Karambitan, Tabanan',
		'province'		=> 'Bali',
		'country'		=> 'Indonesia',
	),
	'tel'	=> '+62 812-387-1711',
	'fax'	=> '+62 361-241-924',
	'email' => 'puridewa@gmail.com',
);

// Copyright.
$config['copyright'] = array(
	'author'		=> 'Puri Dewa',
	'start_year'	=> 2010,
);

// Skin.
$config['skin'] = 'default';

// Accommodation
$config['accommodation'] = array(
	'prices' => array(
		'1 story bungalow'  => '25$',
		'2 story bungalow'  => '35$',
	),
	'currency' => array(
		'code' => 'USD',
		'name' => 'American Dollar',
	),
	'quantity' => 5,
);

// Paths
$config['paths'] = array(
	'image_base' => url::base().'assets/images/',
);
