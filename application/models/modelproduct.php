<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelproduct extends CI_Model {

	public function loadMessageAll($tgl)
	{
		$this->db->select('*');
		$this->db->order_by('date_in','ASC');
		if($tgl!=""){
			$this->db->like('date_in', $tgl);	
		}
		$query = $this->db->get('contact');
		// $query = $this->db->query('
		// 		SELECT c.*
		// 		FROM contact c
		// 		ORDER BY c.date_in ASC
		// 		WHERE c.date_in LIKE = "$tgl"
		// 	');
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}


	public function updateStatusMessage($id){
		$data = array(
			'status' => 'replied'
			);
		$this->db->where('id', $id);
		$this->db->update('contact', $data);
	}

	public function loadStatusBarang(){
		$query = $this->db->query("
				SELECT bs.*
				FROM barang_status bs
				ORDER BY bs.id ASC
			");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}


}

/* End of file modelproduct.php */
/* Location: ./application/models/modelproduct.php */