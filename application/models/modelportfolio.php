<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelportfolio extends CI_Model {
/*
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
*/
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
/*
	public function deleteBarang($idbarang)
	{
		return $this->db->delete('barang', array('id'=>$idbarang));
	}

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
*/

}

/* End of file modelportfolio.php */
/* Location: ./application/models/modelportfolio.php */