<?php defined('SYSPATH') or die('No direct script access.');/**
 * Error Controller
 *
 * Create the 404 error header and load our own error view.
 */class Error_Controller extends Website_Controller {	public function __construct()	{		parent::__construct();
				header('HTTP/1.1 404 File Not Found');
		
		$this->template->body_id = '_404';
		
		$this->template->webpage_title = '404 '.Kohana::lang('errors_http.404.definition');
		
		$this->template->content = view::factory('http_errors/404')
			->set('error_definition', Kohana::lang('errors_http.404.definition'))
			->set('error_message', Kohana::lang('errors_http.404.message'));
			
		$this->template->render(TRUE);
		
		die();	}}

// End Error_Controller