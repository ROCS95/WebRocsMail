<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciemail extends CI_Controller {

		
	
		/*$this->load->helper('email');

		if (valid_email('email@somesite.com'))
		{
    		echo 'email is valid';
		}*/
		public function index()
	{
		$this->load->view('rocsmail/email');
	}

}