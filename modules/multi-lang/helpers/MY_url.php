<?php defined('SYSPATH') or die('No direct script access.');
/**
 * URL Helper extended to support multi lingual websites.
 *
 * @package		MIT Framework - multi-lang module 
 * @author		Kohana Team, modified by Kiall Mac Innes of Managed I.T.
 * @copyright	(c) 2007-2008 Kohana Team
 * @license		http://kohanaphp.com/license.html
 * @link		http://www.managedit.ie/ Managed I.T. Homepage
 *
 * NOTE: This file was slightly modified.
 */
class url extends url_Core {
		
	/**
	 * Fetches an absolute site URL based on a URI segment.
	 *
	 * @param   string	site URI to convert
	 * @param   string  non-default protocol
	 * @return  string
	 */
	public static function site($uri = '', $protocol = FALSE)
	{
		// Add path suffix.
		if ($path = trim(parse_url($uri, PHP_URL_PATH), '/'))
		{
			$path .= Kohana::config('core.url_suffix');
		}

		// ?query=string.
		if ($query = parse_url($uri, PHP_URL_QUERY))
		{
			$query = '?'.$query;
		}

		// #fragment.
		if ($fragment = parse_url($uri, PHP_URL_FRAGMENT))
		{
			$fragment =  '#'.$fragment;
		}
		
		// If not already present, add the current language to the URL.
		$lang = '';
		if (Kohana::config('multi-lang.enabled'))
		{
			$lang = Router::$language.'/';
		}	
		
		// Concat the URL.
		return url::base(TRUE, $protocol).$lang.$path.$query.$fragment;
	}
	
	/**
	 * Fetches the current URI.
	 *
	 * @param   bool	 include the query string
	 * @param   bool	 include the language string
	 * @return  string
	 */
	public static function current($qs = FALSE, $lang = FALSE)
	{
		$language = ($lang !== FALSE) ? Router::$language.'/' : NULL;
		
		return ($qs === TRUE) ? $language.Router::$complete_uri : $language.Router::$current_uri;

	}
	
	/**
	 * Fetches the language code in the URI.
	 *
	 * @return  string
	 */
	public static function lang()
	{
		return Router::$language;
	}
	
} // End MY_url