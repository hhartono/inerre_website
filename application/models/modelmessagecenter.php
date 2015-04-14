<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelmessagecenter extends CI_Model {

	public function loadMessageAll()
	{
		$this->db->select('*');
		$this->db->order_by('date_in','ASC');
		//$this->db->like('date_in', $tgl);
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

	public function loadMessageWithStatus($status)
	{
		$query = $this->db->query("
				SELECT c.*
				FROM contact c
				WHERE c.status='$status'
				ORDER BY c.date_in ASC
			");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}


}

/* End of file modelmessagecenter.php */
/* Location: ./application/models/modelmessagecenter.php */