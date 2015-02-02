<?php defined('SYSPATH') OR die('No direct access allowed.');	
/**
 * Contact Controller
 */
class Contact_Controller extends Website_Controller {
	public function index()
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
				$to      = Kohana::config('website.contact.email');				$from    = array($post->email, $post->name);				$subject = Kohana::lang('website.name').' | '.$post->subject;				$message = $post->message;

				// Send the email.				$num_sent_messages = email::send($to, $from, $subject, $message, TRUE);
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
} // End Contact_Controller
