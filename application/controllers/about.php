<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		$data = array(
				'title' => '&mdash; About',
				'aboutactive' => 'active'
			);
		$this->load->view('public/about', $data);
	}

	public function team()
	{
		$data = array(
				'title' => '&mdash;  Team',
				'aboutactive' => 'active'
			);
		$this->load->view('public/team', $data);
	}

	public function workshop()
	{
		$data = array(
				'title' => '&mdash; Workshop',
				'aboutactive' => 'active'
			);
		$this->load->view('public/workshop', $data);
		//redirect('/about/team');
	}
}

/* End of file showroom.php */
/* Location: ./application/controllers/showroom.php */