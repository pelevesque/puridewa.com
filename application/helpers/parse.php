<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * parse helper.
 */
class parse_Core {

	/**
	 * Parses a copyright.
	 *
	 * NOTE: If the start year is null, the current year will be used.
	 *
	 * @param	string			author
	 * @param	string			Kohana::lang string to use
	 * @param	int (opt)		start year
	 * @return	array			parsed copyright
	 */
	public static function copyright($author, $lang_string, $start_year = NULL)
	{
		if ( ! empty($author))
		{
			$start_year = empty($start_year) ? date('Y') : $start_year;
			$end_year = $start_year == date('Y') ? FALSE : date('Y');
			$date = $end_year ? $start_year.'-'.$end_year : $start_year;
			$copyright = Kohana::lang($lang_string, array($author, $date));
		}

		return ! empty($copyright) ? $copyright : FALSE;
	}

	/**
	 * Parse the website's nav.
	 *
	 * @param	array	nav
	 * @param	string	url prefix
	 * @return	array	parsed_nav
	 */
	public static function nav($nav, $url_prefix)
	{
		// Make sure the nav is set.
		! isset($nav) AND $nav = array();

		// Create the parsed nav.
		$parsed_nav = array();
		foreach ($nav as $item)
		{
			if ($item != 'Bali-map')
			{
				$parsed_nav[Kohana::lang('nav.'.$item)] = str_replace(' ', '_', $url_prefix.$item);
			}
		}

		return ! empty($parsed_nav) ? $parsed_nav: FALSE;
	}

	/**
	 * Parse the accommodation prices.
	 *
	 * @param	array	accommodatin configuration
	 * @return	array	parsed accommodation prices
	 */
	public static function accommodation_prices($accommodation_config)
	{
		$accommodatin_prices = array();
		foreach ($accommodation_config['prices'] as $accommodation => $price)
		{
			$accommodation_prices[Kohana::lang('prices.'.$accommodation)] = array(
				'price' => $price,
				'currency' => array(
					'name'	=> Kohana::lang('prices.'.$accommodation_config['currency']['name']),
					'code'	=> $accommodation_config['currency']['code']
				),
			);
		}

		return $accommodation_prices;
	}

} // End parse
