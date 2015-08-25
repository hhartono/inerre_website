<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio extends CI_Controller {

	public function index()
	{
		$data = array(
				'title' => '&mdash; Portfolio',
				'portfolioactive' => 'active'
			);
		$this->load->view('public/portfolio', $data);
	}
	
}

/* End of file portfolio.php */
/* Location: ./application/controllers/portfolio.php */