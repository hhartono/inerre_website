<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
		$this->load->view('contact');
	}

	/*
	 * function submitMessage
	 * submit message from contact form
	 */
	public function submitMessage()
	{
		echo ""; // echo nothing
	}

}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */