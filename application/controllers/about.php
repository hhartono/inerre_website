<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
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