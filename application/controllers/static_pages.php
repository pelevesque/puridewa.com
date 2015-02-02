<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Static Pages Controller
 *
 * Handle static pages.
 */
class Static_Pages_Controller extends Website_Controller {
	public function index($page)
	{	
		// If on the accommodatin page, get the accommodation prices.
		if ($page == 'accommodation')
		{
			$accommodation_prices = parse::accommodation_prices(Kohana::config('website.accommodation'));
		}

		// Load the view.
		$this->template->content = view::factory('pages/'.$page)
			->set('page_name', Kohana::lang('nav.'.str_replace('_', ' ', $page)))
			->bind('accommodation_prices', $accommodation_prices);
	}} // End Static Pages Controller
