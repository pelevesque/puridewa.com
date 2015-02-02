<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Multi Lang configuration.
 *
 * @package    MIT Framework - multi-lang module 
 * @author     Kohana Team, modified by Kiall Mac Innes of Managed I.T.
 * @copyright  (c) 2007-2008 Kohana Team
 * @license    http://kohanaphp.com/license.html
 * @link 		http://www.managedit.ie/ Managed I.T. Homepage
 *
 * NOTE: This file was slightly modified.
 */
 
/**
 * Enable this module. 
 *
 * @param	bool	enable
 */
$config['enabled'] = TRUE;
 
/**
 * Supported languages
 */
$config['languages'] = array(
	'en-US'	=> array('en_US', 'English_United States'),
	'fr-FR'	=> array('fr_FR', 'Français_France'),
	'id-ID'	=> array('id_ID', 'Bahasa Indonesia_Indonesia'),
);

/**
 * Default language code used as the fallback.
 *
 * NOTE: It must be set in the supported languages above.
 */
$config['default_language_code'] = 'en-US';