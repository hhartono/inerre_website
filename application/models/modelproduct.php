<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelproduct extends CI_Model {

	public function loadAllBarang(){
		$query = $this->db->query("
				SELECT b.*, bs.barang_status
				FROM barang b, barang_status bs 
				WHERE bs.id = b.id_status
				ORDER BY b.id DESC
			");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
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

	public function insertBarang($kode_barang, $nama_barang, $stock_barang, $harga_beli, $harga_jual, $id_status){
		$field = array(
			'kode_barang' => $kode_barang,
			'nama_barang' => $nama_barang,
			'stock_barang' => $stock_barang,
			'harga_beli' => $harga_beli,
			'harga_jual' => $harga_jual,
			'id_status' => $id_status
		);
		$this->db->insert('barang', $field);
	}

}

/* End of file modelproduct.php */
/* Location: ./application/models/modelproduct.php */