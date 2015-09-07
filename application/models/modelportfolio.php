<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelportfolio extends CI_Model {

	public function loadAllPortfolio()
	{
		$query = $this->db->query("
				SELECT p.*
				FROM portfolio p
				ORDER BY p.id ASC
			");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}

	public function insertPortfolio($title, $description, $slugtitle)
	{
		$field = array(
			'portfolio_title' => $title,
			'portfolio_description' => $description,
			'portfolio_uri' => $slugtitle
		);
		$this->db->insert('portfolio', $field);
	}

	public function insertPortfolioAlbum($photo, $statuscover, $id_portfolio)
	{
		$field = array(
			'photo' => $photo,
			'status_cover_portfolio' => $statuscover,
			'id_portfolio' => $id_portfolio
		);
		$this->db->insert('portfolio_album', $field);
	}

	public function updatePortfolio($idportfolio, $title, $description, $slugtitle)
	{
		$field = array(
			'portfolio_title' => $title,
			'portfolio_description' => $description,
			'portfolio_uri' => $slugtitle
		);
		$this->db->where('id', $idportfolio);
		$this->db->update('portfolio', $field);
	}

	public function loadOnePortfolio($idportfolio)
	{
		$query = $this->db->query("
			SELECT p.*
			FROM portfolio p
			WHERE p.id = '$idportfolio'
		");
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data;
		}
	}

	public function loadPortfolioAlbum($idportfolio)
	{
		$query = $this->db->query("
			SELECT pa.*
			FROM portfolio_album pa
			WHERE pa.id_portfolio = '$idportfolio'
			");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}

	public function deletePortfolio($idportfolio)
	{
		return $this->db->delete('portfolio', array('id' =>$idportfolio));
	}

	public function deletePortfolioAlbum($idportfolio)
	{
		return $this->db->delete('portfolio_album', array('id_portfolio' => $idportfolio));
	}

}

/* End of file modelportfolio.php */
/* Location: ./application/models/modelportfolio.php */