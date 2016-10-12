<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelportfolio extends CI_Model {

	public function loadAllPortfolio()
	{
		$query = $this->db->query("
				SELECT p.*
				FROM portfolio p
				ORDER BY p.id DESC
			");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}

	public function loadPortfolioProjectId($uri){
        $this->db->select('portfolio_project.*');
        $this->db->from('portfolio_project');
        $this->db->where('portfolio_id', $uri);
        $query = $this->db->get();

        return $query->row_array();
    }

	public function insertPortfolioId($id)
	{
		$field = array(
			'portfolio_id' => $id
		);
		$this->db->insert('portfolio_project', $field);
	}

	public function insertPortfolio($title, $description, $location, $slugtitle)
	{
		$field = array(
			'portfolio_title' => $title,
			'portfolio_location' => $location,
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

	public function insertPortfolioProject($photo, $id)
	{
		$field = array(
			'photo1' => $photo
		);
		$this->db->where('portfolio_id', $id);
		$this->db->update('portfolio_project', $field);
	}

	public function insertPortfolioProjectPhoto2($photo, $id)
	{
		$field = array(
			'photo2' => $photo
		);
		$this->db->where('portfolio_id', $id);
		$this->db->update('portfolio_project', $field);
	}

	public function insertPortfolioDescription($highlights1, $highlights2, $description_left, $description_right, $idportfolio)
	{
		$field = array(
			'highlights1' => $highlights1,
			'highlights2' => $highlights2,
			'description_left' => $description_left,
			'description_right' => $description_right
		);
		$this->db->where('portfolio_id', $idportfolio);
		$this->db->update('portfolio_project', $field);
	}

	public function insertPortfolioCarousel($photo, $idportfolio)
	{
		$field = array(
			'photo' => $photo,
			'portfolio_id' => $idportfolio
		);
		$this->db->insert('portfolio_carousel', $field);
	}

	public function updatePortfolio($idportfolio, $title, $location, $description, $slugtitle)
	{
		$field = array(
			'portfolio_title' => $title,
			'portfolio_location' => $location,
			'portfolio_description' => $description,
			'portfolio_uri' => $slugtitle
		);
		$this->db->where('id', $idportfolio);
		$this->db->update('portfolio', $field);
	}

	public function loadPortfolioPublic()
	{
		$query = $this->db->query("
			SELECT p.*, 
				(
					SELECT pa.photo
					FROM portfolio_album pa
					WHERE pa.id_portfolio = p.id
					AND pa.status_cover_portfolio = '1'
					LIMIT 0,1
				) AS photo_portfolio
			FROM portfolio p 
			ORDER BY p.id DESC
		");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}

	public function loadPortfolioProject($uri)
	{
		$query = $this->db->query("
			SELECT p.*, pp.photo1 as photo1, pp.photo2 as photo2, pp.highlights1 as description1, pp.highlights2 as description2
			FROM portfolio p, portfolio_project pp
			where p.id = pp.portfolio_id AND pp.portfolio_id = '$uri' 
			ORDER BY p.id DESC
		");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}

	public function loadPortfolioCarousel($uri)
	{
		$query = $this->db->query("
			SELECT p.*, pc.photo as photo
			FROM portfolio p, portfolio_carousel pc
			WHERE p.id = pc.portfolio_id AND pc.portfolio_id = '$uri' 
			ORDER BY p.id DESC
		");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}

	public function loadPortfolioDescription($uri)
	{
		$query = $this->db->query("
			SELECT p.*, pp.description_right as description_right, pp.description_left as description_left
			FROM portfolio p, portfolio_project pp
			where p.id = pp.portfolio_id AND pp.portfolio_id = '$uri' 
			ORDER BY p.id DESC
		");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
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