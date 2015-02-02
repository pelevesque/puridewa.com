<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Router extended to support multi lingual websites.
 *
 * @package		MIT Framework - multi-lang module 
 * @author		Kohana Team, modified by Kiall Mac Innes of Managed I.T.
 * @copyright	(c) 2007-2008 Kohana Team
 * @license		http://kohanaphp.com/license.html
 * @link		http://www.managedit.ie/ Managed I.T. Homepage
 *
 * NOTE: This file was slightly modified.
 */
class Router extends Router_Core {

	public static $language = '';

	public static function find_uri()
	{
		Router_Core::find_uri();

		if (Kohana::config('multi-lang.enabled'))
		{
			// Retrieve the allowed languages.
			$allowed_languages = Kohana::config('multi-lang.languages');

			if (preg_match('~^('.implode('|', array_keys($allowed_languages)).')(?=/|$)~i', Router::$current_uri, $matches) AND isset($matches[0]))
			{
				// Set the currently defined language.
				Router::$language = $matches[0];

				// Remove the language from the URI.
				Router::$current_uri = substr(Router::$current_uri, strlen(Router::$language) + 1);

				// Check if the uri is the default route.
				if (Router::$current_uri == '')
				{
					// Make sure the default route is set.
					$routes = Kohana::config('routes');
					if ( ! isset($routes['_default']))
					{
						throw new Kohana_Exception('core.no_default_route');
					}

					// Use the default route when no segments exist.
					Router::$current_uri = $routes['_default'];
				}

				// Set the website locale.
				Kohana::config_set('locale.language', $allowed_languages[Router::$language]);

				// Overwrite setlocale which has already been set before in Kohana::setup().
				setlocale(LC_ALL, Router::$language.'.UTF-8');

				// Set a language cookie for 60 days.
				cookie::set('language', Router::$language, 5184000);
			}
			else
			{
				/**
				 * Pick a language for the user and redirect.
				 */

				// 1. Check for a language cookie. 
				$new_langs[] = (string) cookie::get('language');

				// 2. Look at HTTP_ACCEPT_LANGUAGE header.
				foreach(Kohana::user_agent('languages') as $language)
				{
					$new_langs[] = substr($language, 0, 2);
				}

				// 3. Final hard-coded fallback from the website's configuration.
				$new_langs[] = Kohana::config('multi-lang.default_language_code');

				// Loop through the new languages and stop at the first valid one.
				foreach($new_langs as $new_lang)
				{
					if (array_key_exists($new_lang, $allowed_languages))
					{
						break;
					}
				}

				// Redirect the user to the new language.
				url::redirect(url::base().$new_lang.'/'.Router::$current_uri);
			}
		}
	}

} // End MY_Router
