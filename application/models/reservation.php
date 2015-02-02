<?php defined('SYSPATH') OR die('No direct access allowed.');

class Reservation_Model extends Model {

	/**
	 * Validate a reservation.
	 *
	 * @param  array    values to check
	 * @return boolean	validated
	 */
	public function validation($array)
	{
		// Set the airport pick-up checkbox.
		$array['airport_pickup'] = isset($array['airport_pickup']) ? 1 : 0;

		$array = Validation::factory($array)
		  ->pre_filter('trim')
		  ->add_rules('name', 'required', 'length[3,50]')
		  ->add_rules('email', 'required', 'email')
		  ->add_rules('accommodation_type', 'required')
		  ->add_rules('accommodation_quantity', 'required')
		  ->add_rules('num_people', 'required')
		  ->add_rules('check_in_date', 'digit')
		  ->add_rules('check_in_month', 'chars[a-zA-Z]')
		  ->add_rules('check_in_year', 'digit')
		  ->add_rules('check_out_date', 'digit')
		  ->add_rules('check_out_month', 'chars[a-zA-Z]')
		  ->add_rules('check_out_year', 'digit')
		  ->add_rules('airport_pickup', 'chars[0,1]')
		  ->add_rules('arrival_flight', 'length[0,15]')
		  ->add_rules('arrival_time', 'length[0,15]')
		  ->add_callbacks('airport_pickup', array($this, '_airport_pickup_info'))
		  ->post_filter('ucwords', 'name');

		return $array;
	}

	/**
	 * Checks if airport pickup info isset when pickup is active.
	 *
	 * @param	array		Validation array
	 * @param	string		pickup field name
	 */
	public function _airport_pickup_info(Validation $array, $field)
	{
		if ($array[$field] == 1 AND (empty($array['arrival_flight']) OR empty($array['arrival_time'])))
		{
			$array->add_error($field, 'info_required');
		}
	}

} // End Reservation_Model
