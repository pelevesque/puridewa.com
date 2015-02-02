<?php defined('SYSPATH') OR die('No direct access allowed.');

// Static Pages.
foreach (Kohana::config('nav.structure') as $page)
{
	if ($page == 'contact' OR $page == 'reservation')
	{
		$config[$page] = $page;
	}
	else
	{
		$config['('.str_replace(' ', '_', $page).')'] = 'static_pages/index/$1';
	}
}

// Bali map
$config['Bali_map'] =  'gmap/Bali_map';

// Default.
$config['_default'] = 'static_pages/index/about_us';
