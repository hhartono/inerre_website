<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelproduct extends CI_Model {

	/*
	public function loadAllTableData($table, $wherefield, $wherecondition, $orderby, $order)
	{
		$this->db->where($wherefield, $wherecondition);
		$this->db->order_by($orderby, $order);
		$query = $this->db->get($table);
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	*/

	public function loadAllBarang()
	{
		$query = $this->db->query("
				SELECT b.id AS idbarang, b.kode_barang, b. nama_barang, b.stock_barang, b.harga_beli, b.harga_jual, b.id_status, b.id_kategori, bs.barang_status, bk.id AS idkategori, bk.barang_kategori, bk.kategori_kode
				FROM barang b, barang_status bs, barang_kategori bk
				WHERE bs.id = b.id_status
				AND bk.id = b.id_kategori
				ORDER BY b.id DESC
			");
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}

	public function loadBarang($id)
	{
		$query = $this->db->query("
				SELECT b.nama_barang, b.kode_barang
				FROM barang b
				WHERE b.id = $id
			");
		if($query->num_rows()>0){
			$data = $query->row();
			return $data;
		}
		
	}

	public function loadStatusBarang()
	{
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

	public function insertBarang($kode_barang, $nama_barang, $stock_barang, $harga_beli, $harga_jual, $id_status, $id_kategori)
	{
		$field = array(
			'kode_barang' => $kode_barang,
			'nama_barang' => $nama_barang,
			'stock_barang' => $stock_barang,
			'harga_beli' => $harga_beli,
			'harga_jual' => $harga_jual,
			'id_status' => $id_status,
			'id_kategori' => $id_kategori
		);
		$this->db->insert('barang', $field);
	}

	public function deleteBarang($idbarang)
	{
		return $this->db->delete('barang', array('id'=>$idbarang));
	}

	//public function updateBarang($idbarang, $kode, $nama, $stock, $hargabeli, $hargajual, $status, $kategoriedit)
	public function updateBarang($idbarang, $kode, $nama, $stock, $hargabeli, $hargajual, $status, $kategori)
	{
		$field = array(
			'kode_barang' => $kode,
			'nama_barang' => $nama,
			'stock_barang' => $stock,
			'harga_beli' => $hargabeli,
			'harga_jual' => $hargajual,
			'id_status' => $status,
			'id_kategori' => $kategori
		);
		$this->db->where('id', $idbarang);
		$this->db->update('barang', $field);
	}

	public function insertKategori($kategori, $kodekategori)
	{
		$field = array(
			'barang_kategori' => $kategori,
			'kategori_kode' => $kodekategori
		);
		$this->db->insert('barang_kategori', $field);
	}

	public function loadAllKategori()
	{
		$query = $this->db->query("
				SELECT bk.*
				FROM barang_kategori bk
				ORDER BY bk.id ASC
			");
		if($query->num_rows()>0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}

	public function cekKategoriKode($kode)
	{
		$query = $this->db->query("
				SELECT bk.*
				FROM barang_kategori bk
				WHERE bk.kategori_kode = '$kode'
		");
		/*if($query->num_rows()>0){
			$data = $query->row();
		}*/
		return $query;
	}

	public function cekKategoriNama($kategori)
	{
		$query = $this->db->query("
				SELECT bk.*
				FROM barang_kategori bk
				WHERE bk.barang_kategori = '$kategori'
		");
		/*if($query->num_rows()>0){
			$data = $query->row();
		}*/
		return $query;
	}

	public function loadKategoriNama($kategori)
	{
		$query = $this->db->query("
				SELECT bk.*
				FROM barang_kategori bk
				WHERE bk.barang_kategori = '$kategori'
		");
		if($query->num_rows()>0){
			$data = $query->row();
			return $data;
		}
	}

	public function loadKategori($field, $condition)
	{
		$this->db->where($field, $condition);
		$query = $this->db->get('barang_kategori');
		/*$query = $this->db->query("
				SELECT bk.*
				FROM barang_kategori bk
				WHERE '$field' = '$condition'
			");*/
		if($query->num_rows()>0){
			$data = $query->row();
			return $data;
		}
	}

	public function deleteKategori($id){
		return $this->db->delete('barang_kategori', array('id'=>$id));
	}

	public function updateKategori($id, $kategori, $kode)
	{
		$field = array(
			'barang_kategori' => $kategori,
			'kategori_kode' => $kode
		);
		$this->db->where('id', $id);
		$this->db->update('barang_kategori', $field);
	}

}

/* End of file modelproduct.php */
/* Location: ./application/models/modelproduct.php */