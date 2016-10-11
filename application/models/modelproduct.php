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

	public function updateProductStock($idproduct, $newstock)
	{
		$field = array(
			'stock_barang' => $newstock
		);
		$this->db->where('id', $idproduct);
		$this->db->update('barang', $field);
	}

	public function loadCartbyUser($iduser)
	{
		$query = $this->db->query("
				SELECT c.id AS idcart, c.no_invoice, c.id_product, c.amount, c.id_user, 
				b.id AS idproduct, b.kode_barang, b.nama_barang, b.stock_barang, b.harga_jual
				FROM cart c, barang b
				WHERE c.id_user = '$iduser'
				AND b.id = c.id_product
			");
		if($query->num_rows()>0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}

	public function insertCart($invoice, $idproduct, $amount, $iduser)
	{
		$field = array(
			'no_invoice' => $invoice,
			'id_product' => $idproduct,
			'amount' => $amount,
			'id_user' => $iduser
		);
		$this->db->insert('cart', $field);
	}

	public function lastInsertCart($iduser)
	{
		$query = $this->db->query("
				SELECT c.*
				FROM cart c
				WHERE id_user = '$iduser'
				ORDER BY c.id DESC
			");
		/*if($query->num_rows()>0){
			$data = $query->row();
			return $data;
		}*/
		return $query;
	}

	public function checkCart($idproduct)
	{
		$query = $this->db->query("
				SELECT c.id_product, c.amount
				FROM cart c
				WHERE c.id_product = '$idproduct'
			");
		return $query;
	}

	public function updateAmountProduct($idproduct, $total)
	{
		$field = array(
			'amount' => $total
			);
		$this->db->where('id_product', $idproduct);
		$this->db->update('cart', $field);
	}

	public function updateStockbyCart($idproduct, $newstock)
	{
		$field = array(
			'stock_barang' => $newstock
			);
		$this->db->where('id', $idproduct);
		$this->db->update('barang', $field);
	}

	public function deleteProductCart($idcart)
	{
		return $this->db->delete('cart', array('id'=>$idcart));
	}

	public function truncateCart(){
		return $this->db->truncate('cart');
	}

	public function updateProductStockBack($idproduct, $newstock)
	{
		$field = array(
			'stock_barang' => $newstock
			);
		$this->db->where('id', $idproduct);
		$htis->db->update('barang', $field);
	}

	public function getCode($kategori)
	{
		$query = $this->db->query("
				SELECT b.id, b.kode_barang, bk.kategori_kode
				FROM barang b, barang_kategori bk
				WHERE b.id_kategori=bk.id
				AND bk.id='$kategori'
				ORDER BY b.id DESC
			");
		return $query;
	}

	public function getCodeCat($kategori)
	{
		$query = $this->db->query("
				SELECT bk.id, bk.kategori_kode
				FROM barang_kategori bk
				WHERE bk.id = '$kategori'
			");
		if($query->num_rows()>0){
			$data = $query->row();
			return $data;
		}
	}

	public function insertCategory($category, $categorycode)
	{
		$field = array(
			'barang_kategori' => $category,
			'kategori_kode' => $categorycode
		);
		$this->db->insert('barang_kategori', $field);
	}

	public function loadAllCategory()
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

	public function checkCategoryCode($code)
	{
		$query = $this->db->query("
				SELECT bk.*
				FROM barang_kategori bk
				WHERE bk.kategori_kode = '$code'
		");
		/*if($query->num_rows()>0){
			$data = $query->row();
		}*/
		return $query;
	}

	public function checkCategoryName($category)
	{
		$query = $this->db->query("
				SELECT bk.*
				FROM barang_kategori bk
				WHERE bk.barang_kategori = '$category'
		");
		/*if($query->num_rows()>0){
			$data = $query->row();
		}*/
		return $query;
	}

	public function checkCategoryCodeExclude($code)
	{
		$query = $this->db->query("
				SELECT bk.*
				FROM barang_kategori bk
				WHERE bk.kategori_kode <> '$code'
		");
		/*if($query->num_rows()>0){
			$data = $query->row();
		}*/
		return $query;
	}

	public function checkCategoryNameExclude($category)
	{
		$query = $this->db->query("
				SELECT bk.*
				FROM barang_kategori bk
				WHERE bk.barang_kategori <> '$category'
		");
		/*if($query->num_rows()>0){
			$data = $query->row();
		}*/
		return $query;
	}

	public function loadCategoryName($category)
	{
		$query = $this->db->query("
				SELECT bk.*
				FROM barang_kategori bk
				WHERE bk.barang_kategori = '$category'
		");
		if($query->num_rows()>0){
			$data = $query->row();
			return $data;
		}
	}

	public function loadCategory($field, $condition)
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

	public function deleteCategory($id){
		return $this->db->delete('barang_kategori', array('id'=>$id));
	}

	public function updateCategory($id, $category, $categorycode)
	{
		$field = array(
			'barang_kategori' => $category,
			'kategori_kode' => $categorycode
		);
		$this->db->where('id', $id);
		$this->db->update('barang_kategori', $field);
	}

}

/* End of file modelproduct.php */
/* Location: ./application/models/modelproduct.php */