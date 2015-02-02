<?php defined('SYSPATH') OR die('No direct access allowed.');	
/**
 * Reservation Controller
 */
class Reservation_Controller extends Website_Controller {
		public function index()
	{
		$errors = array();
		$values = array();

		// Handle the form.
		if ($post = $this->input->post())
		{
			$reservation = new Reservation_Model;
			$post = $reservation->validation($post);

			if ($post->validate($post))
			{
				// Prepare the email.
				$to      = Kohana::config('website.contact.email');				$from    = array($post->email, $post->name);				$subject = Kohana::lang('website.name').' | reservation';
				$message = view::factory('templates/reservation_email')
					->set('post', $post);

				// Send the email.				$num_sent_messages = email::send($to, $from, $subject, $message, TRUE);
			}
			else
			{
				$errors = $post->errors('errors_forms');
				$values = $post->as_array();
			}
		}

		// Load the view.
		$this->template->content = view::factory('pages/reservation')
			->set('page_name', Kohana::lang('nav.reservation'))
			->set('errors', $errors)
			->bind('num_sent_messages', $num_sent_messages)
			->set('values', $values)
			->set('months', Kohana::config('date.months'))
			->set('accommodation_prices', parse::accommodation_prices(Kohana::config('website.accommodation')))
			->set('accommodation_quantity', Kohana::config('website.accommodation.quantity'));

	}} // End Reservation_Controller
