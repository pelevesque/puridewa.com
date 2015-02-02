<?php defined('SYSPATH') OR die('No direct access allowed.');	
/**
 * Gmap controller
 */
class Gmap_Controller extends Website_Controller {

	// Cancel the initialized template.
	public $template = NULL;
	public function __construct()
	{		parent::__construct();	}

	// Load the Bali Map
	public function Bali_map()
	{
		$this->template = view::factory('templates/Gmap')
			->set('lang', url::lang())
			->set('website_name', Kohana::lang('website.name'))
			->set('website_slogan', Kohana::lang('website.slogan'))
			->set('webpage_title', Kohana::lang('nav.'.str_replace('_', ' ', url::current())))
			->set('map_options', Kohana::config('Gmap.maps.Bali'))
			->set('map_markers', Kohana::config('Gmap.markers.Bali'))
			->set('map_icon_path', url::base().skin::config('images.Gmap.path'));
	}} // End Gmap_Controller
