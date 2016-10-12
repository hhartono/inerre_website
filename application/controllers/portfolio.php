<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(array('modelportfolio'));
	}

	public function index()
	{
		$data = array(
				'title' => '&mdash; Portfolio',
				'portfolioactive' => 'active',
				'loadportfolio' => $this->modelportfolio->loadPortfolioPublic()
			);
		$this->load->view('public/portfolio', $data);
	}

	public function project()
	{
		$uri = $this->uri->segment(3);
		if($uri == ''){
			redirect('public/portfolio');
		}else{
			$data = array(
				'title' => '&mdash; Portfolio',
				'portfolioactive' => 'active',
				'loadportfolioproject' => $this->modelportfolio->loadPortfolioProject($uri),
				'loadportfoliocarousel' => $this->modelportfolio->loadPortfolioCarousel($uri),
				'loadportfoliodescription' => $this->modelportfolio->loadPortfolioDescription($uri)
			);
		$this->load->view('public/portfolioproject', $data);
		}
	}
	
}

/* End of file portfolio.php */
/* Location: ./application/controllers/portfolio.php */