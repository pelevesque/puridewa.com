<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Skin Core
 *
 * This class provides methods to draw icons, flags, and credits.
 * It also has methods to load the skin's dependencies.
 */
class skin_Core
{	
	/**
	 * Return the skin's configuration.
	 *
	 * @param 	string (opt)	config sub array to return.
	 * @return  array			skin's configuration 
	 */
	static public function config($sub_array = NULL)
	{		
		$config_file = empty($sub_array) ? 'skin' : 'skin.'.$sub_array;
		
		return Kohana::config($config_file);
	}
	
	/**
	 * Create an icon.
	 *
	 * @param   string|array	name|(name => alias)
	 * @param   string (opt) 	url
	 * @param 	string (opt)	type (image config sub array)
	 * @return  string			HTML	 
	 */
	static public function icon($name, $url = FALSE, $type = 'icons')
	{		
		// If the alias is not set, use the name.
		if ( ! is_array($name))
		{
			$name = array($name, $name);
		}
		
		return skin::image($type, $name[0], $name[1], $name[1], $url);
	}
	
	/**
	 * Create a flag.
	 *
	 * @param   string			name
	 * @param	string			title
	 * @param	string			alt
	 * @param   string (opt)	url
	 * @param 	string (opt)	type (image config sub array)
	 * @return  string			HTML
	 */
	static public function flag($name, $title, $alt, $url = FALSE, $type = 'flags')
	{	
		return skin::image($type, $name, $title, $alt, $url);
	}
	
	/**
	 * Create an image.
	 *
	 * NOTE: This method is private. It requires input from the
	 * icon or the flag methods above.
	 *
	 * @param   string			type (image config sub array)
	 * @param   string			name
	 * @param	string			title
	 * @param	string			alt
	 * @param	string (opt)	url
	 * @return  string			HTML 
	 */
	static private function image($type, $name, $title, $alt, $url = FALSE)
	{
		$img_config = self::config('images.'.$type);
		
		$attributes = array(
			'src'	 => str_replace(self::config('skin_inheritor_paths'), '', url::base()).$img_config['path'].str_replace(' ', '_', $name).'.'.$img_config['type'],
			'class'	 => $type,
			'width'  => $img_config['width'].'px',
			'height' => $img_config['height'].'px',
			'title'	 => $title,
			'alt'	 => $alt,
		);
		
		$image = '<img src="'.$attributes['src'].'" class="'.$attributes['class'].'" width="'.$attributes['width'].'" height="'.$attributes['height'].'" title="'.$attributes['title'].'" alt="'.$attributes['alt'].'" />';
			
		if ($url)
		{
			$image = '<a href="'.$url.'">'.$image.'</a>';
		}
				
		return $image;
	}
	
	/**
	 * Include a file
	 *
	 * @param 	string		file
	 * @echo    string		HTML 
	 */
	static public function include_file($file)
	{				
		// Get an array of paths that inherit this skin.
		$skin_inheritor_paths = self::config('skin_inheritor_paths');
			
		// Strip the unwanted uri segments.
		$DOCROOT = str_replace($skin_inheritor_paths, '', DOCROOT);
		
		// Include the file.
		include($DOCROOT.self::config('includes.'.$file));
	}
	
	/**
	 * Create the credits.
	 *
	 * NOTE: If no credits exist in the current language, 
	 * this method falls back to the default language.
	 *
	 * @param	string		current lang
	 * @param   string		default lang
	 * @return  string		HTML 
	 */
	static public function credits($current_lang, $default_lang)
	{		
		$credits = self::config('credits');
		
		// 1) Try to get the credits for the current language.
		if (isset($credits[$current_lang]))
		{
			$credits = $credits[$current_lang];
		}
		// 2) Try to get the credits for the default language.
		elseif (isset($credits[$default_lang]))
		{
			$credits = $credits[$default_lang];
		}	
		// 3) No credits were found.
		else 
		{
			$credits = FALSE;	
		}
		
		return $credits;
	}
	
	/**
	 * Initialize variables for methods regarding loading assets.
	 */
	static protected $stylesheets = array();
	static protected $scripts = array();
	static protected $files = array();
	static protected $loaded_dependencies = FALSE;

	/**
	 * Echo the skin's HTML <head> assets.
	 *
	 * @param string|array	uri segments to strip
	 * @echo  string		HTML 
	 */
	static public function load_assets()
	{		
		// Load dependencies.
		self::load_dependencies();
		
		// Get an array of paths that inherit this skin.
		$skin_inheritor_paths = self::config('skin_inheritor_paths');
			
		// Strip the unwanted uri segments.
		$paths['url_base'] = str_replace($skin_inheritor_paths, '', url::base());
		$paths['DOCROOT'] = str_replace($skin_inheritor_paths, '', DOCROOT);
		
		// Echo stylesheets.
		foreach (self::$stylesheets as $file => $media)
		{
			echo html::stylesheet($paths['url_base'].$file, $media);
		}
		
		// Echo scripts.
		foreach (self::$scripts as $file)
		{
			echo html::script($paths['url_base'].$file);
		}
		
		// Include files.
		foreach (self::$files as $file)
		{
			include($paths['DOCROOT'].$file);
		}
	}
	
	/**
	 * Load the skin's dependencies.
	 *
	 * NOTE: This method is used by the load_assets method above.
	 * It directly assigns dependencies to $stylesheets, $scripts, $files.
	 *
	 * NOTE: This method relies on the skin's configuration. 
	 * In this configuration, you can set dependencies for
	 * one view at a time, or you can group dependencies
	 * for many views at once.
	 * Ex: $config['views']['app']['home'] etc... (dependencies for home view in the app foler)
	 * Ex: $config['views']['app'] etc... (dependencies for all views in the app folder)
	 * Ex: $config['views'] etc... (dependencies for all views)
	 *
	 * NOTE: Duplicate dependencies will automatically be ignored.
	 *
	 * @assign	directly assign dependencies to the protected variables above.
	 */
	static private function load_dependencies()
	{
		if ( ! self::$loaded_dependencies)
		{
			foreach(View::$loaded as $view)
			{								
				$segments = explode('/', $view);
				
				$first_segment = TRUE;
				foreach ($segments as $segment)
				{
					if ($first_segment)
					{
						$required_config = $segment;
						$first_segment = FALSE;
					}
					else
					{	
						$required_config .= '.'.$segment; 
					}
					
					// Add a preceding '.' if required_config is not empty.
					$required = ! empty($required_config) ? '.'.$required_config : $required_config;
					
					$required = self::config('views'.$required);
				
					if ($required)
					{
						if (isset($required['stylesheets']))
						{
							foreach($required['stylesheets'] as $file => $media)
							{
								if ( ! array_key_exists($file, self::$stylesheets))
								{
									self::$stylesheets[$file] = $media;
								}
							}
						}
					
						if (isset($required['scripts']))
						{
							foreach ($required['scripts'] as $file)
							{
								if ( ! in_array($file, self::$scripts))
								{
									self::$scripts[] = $file;
								}
							}
						}
						
						if (isset($required['files']))
						{
							foreach($required['files'] as $file)
							{
								if ( ! in_array($file, self::$files))
								{
									self::$files[] = $file;
								}
							}	
						}
					}		
				}
			}
		}
	}
	
} // End skin_Core