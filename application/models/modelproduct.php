<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelproduct extends CI_Model {

	public function loadAllBarang()
	{
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

	public function loadBarang($id)
	{
		$query = $this->db->query("
				SELECT b.nama_barang, b.kode_barang
				FROM barang b
				WHERE b.id = $id
			");
		if($query->num_rows()>0){
			$data = $query->row();
		}
		return $data;
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

	public function insertBarang($kode_barang, $nama_barang, $stock_barang, $harga_beli, $harga_jual, $id_status)
	{
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

	public function deleteBarang($idbarang)
	{
		return $this->db->delete('barang', array('id'=>$idbarang));
	}

	public function updateBarang($idbarang, $kode, $nama, $stock, $hargabeli, $hargajual, $status)
	{
		$field = array(
			'kode_barang' => $kode,
			'nama_barang' => $nama,
			'stock_barang' => $stock,
			'harga_beli' => $hargabeli,
			'harga_jual' => $hargajual,
			'id_status' => $status
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
				ORDER BY bk.id DESC
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

}

/* End of file modelproduct.php */
/* Location: ./application/models/modelproduct.php */