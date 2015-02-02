<?php defined('SYSPATH') or die('No direct script access.');/**
 * My 404
 *
 * Clear Kohana's 404 and provide our own custom controller.
 */Event::clear('system.404', array('Kohana', 'show_404'));Event::add('system.404', 'my_404');function my_404() {	new Error_Controller;}

// End My_404