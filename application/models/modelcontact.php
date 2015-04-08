<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelcontact extends CI_Model {

	public function insertContact($name, $email, $message)
	{
		$field = array(
			'id' => '',
			'name' => $name,
			'email' => $email,
			'message' => $message,
			'date_in' => date("Y-m-d H:i:s")
		);
		$insert = $this->db->insert('contact', $field);
	}
	
}

/* End of file modelcontact.php */
/* Location: ./application/models/modelcontact.php */