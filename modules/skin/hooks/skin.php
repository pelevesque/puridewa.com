<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Skin Hook
 *
 * This hook loads a skin module or modules.
 *
 * NOTE: If the 'default' skin is used, only one module is loaded.
 * If another skin is used, it will automatically extend 
 * the default skin, unless another skin is specified for extension.
 * In the case that another skin is specified for extension,
 * 3 modules will be loaded (default->extended skin->active skin).
 */
class skin_hook {

	public function __construct()
	{
		Event::add('system.ready', array($this, 'load_skin'));
	}

	public function load_skin()	
	{						
		// 1) Load the default skin.
		Kohana::config_set('core.modules', array_merge(array(DOCROOT.'skins/default'), Kohana::config('core.modules')));
		
		// 2) Extend the default skin with the active skin.
		$skin = Kohana::config('website.skin');
		
		if ($skin != 'default')
		{
			Kohana::config_set('core.modules', array_merge(array(DOCROOT.'skins/'.$skin), Kohana::config('core.modules')));
		}
		
		// 3) Extend the active skin with another skin.
		$extend = Kohana::config('skin.extend');
			
		if ( ! empty($extend) AND $extend != $skin)
		{
			Kohana::config_set('core.modules', array_merge(array(DOCROOT.'skins/'.$extend), Kohana::config('core.modules')));
		}
	}
}

new skin_hook;