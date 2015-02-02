<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * My View
 *
 * This class extends View_Core to allow skin theming.
 */
class View extends View_Core{
	
	// Keep an array of loaded views.
	public static $loaded = array();
	
	public function __construct($name = NULL, $data = NULL, $type = NULL)
	{
		// The $name as key is for duplicate views.
		self::$loaded[$name] = $name;
		parent::__construct($name, $data, $type);
	}
	
} // END My_View