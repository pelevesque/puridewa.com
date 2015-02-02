<?php defined('SYSPATH') OR die('No direct access allowed.');	
/**
 * Contact Controller
 */
class Contact_Controller extends Website_Controller {

	{
		$errors = array();
		$values = array();

		// Handle the form.
		if ($post = $this->input->post())
		{
			$contact = new Contact_Model;
			$post = $contact->validation($post);

			if ($post->validate($post))
			{
				// Prepare the email.
				$to      = Kohana::config('website.contact.email');

				// Send the email.
			}
			else
			{
				$errors = $post->errors('errors_forms');
				$values = $post->as_array();
			}
		}

		// Get the contact form.
		$this->template->content = view::factory('pages/contact')
			->set('page_name', Kohana::lang('nav.contact'))
			->set('errors', $errors)
			->bind('num_sent_messages', $num_sent_messages)
			->set('values', $values)
			->set('contact', Kohana::config('website.contact'));
	}
