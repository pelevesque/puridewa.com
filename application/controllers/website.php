<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Website Controller
 *
 * Loads the website layout template.
 */
class Website_Controller extends Template_Controller {

	// Cancel the initialized template.
	public $template = NULL;
	public function __construct()
	{		parent::__construct();

		$url_current = str_replace('static_pages/index/', '', url::current());

		// Load the template.
		$this->template = view::factory('templates/layout')
			->set('lang', url::lang())
			->set('meta_keywords', Kohana::lang('meta.keywords'))
			->set('meta_description', Kohana::lang('meta.description'))
			->set('website_name', Kohana::lang('website.name'))
			->set('webpage_title', Kohana::lang('nav.'.str_replace('_', ' ', $url_current)))
			->set('website_slogan', Kohana::lang('website.slogan'))
			->set('languages', Kohana::config('multi-lang.languages'))
			->set('url_base', url::base())
			->set('url_current', $url_current)
			->set('nav', parse::nav(Kohana::config('nav.structure'), url::site()))
			->set('url', url::site().$url_current)
			->set('copyright', parse::copyright(Kohana::config('website.copyright.author'), 'website.copyright', Kohana::config('website.copyright.start_year')))
			->set('skin_credits', skin::credits(url::lang(), Kohana::config('multi-lang.default_language_code')));

			// Set some variables for all views.
			view::set_global('url_image_base', Kohana::config('website.paths.image_base'));
			view::set_global('url_site', url::site());
	}
} // End Website_Controller
