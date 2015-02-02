<?php defined('SYSPATH') OR die('No direct access allowed.');

class Contact_Model extends Model {

	/**
	 * Validate a contact.
	 *
	 * @param  array    values to check
	 * @return boolean	validated
	 */
	public function validation($array)
	{
		$array = Validation::factory($array)
		  ->pre_filter('trim')
		  ->add_rules('name', 'required', 'length[3,50]')
		  ->add_rules('email', 'required', 'email')
		  ->add_rules('subject', 'required', 'length[3,50]')
		  ->add_rules('message', 'required', 'length[1,2000]')
		  ->post_filter('ucwords', 'name');
		  
		return $array;
	}

} // End Contact_Model
