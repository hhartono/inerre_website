<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('email', 'url'));
		$this->load->library(array('email', 'tank_auth', 'session', 'form_validation'));
		$this->is_logged_in();
		$this->load->model(array('modelmessagecenter', 'modelproduct'));
	}

	/*
	 * main (index) administrator
	 */
	public function index()
	{	
		$data = array(
			'title' => 'INERRE Interior - Administrator / Dashboard',
			'dashboardactive' => 'active',
			'username' => $this->tank_auth->get_username()
		);
		$this->load->view('administrator/dashboard', $data);
	}

	/*
	 * check if user is logged in
	 */
	public function is_logged_in()
	{
		if(!$this->tank_auth->is_logged_in()){
			redirect('/auth/login');
		}
	}

	/*
	 * message center (contact form)
	 */
	public function messagecenter()
	{	
		$data = array(
			'title' => 'INERRE Interior - Administrator / Message Center',
			'messageactive' => 'active',
			'username' => $this->tank_auth->get_username()
		);
		$this->load->view('administrator/message_center', $data);
	}

	/*
	 * AJAX response
	 * load all message (message center)
	 */
	public function loadAllMessage()
	{
		
		$tgl = $this->input->post('tgl');	
		//$tgl = '2015-04-08';
		$loadAll = $this->modelmessagecenter->loadMessageAll($tgl);
		if(isset($loadAll)){
			echo '<table id="tablemessage" class="display">
				<thead>
					<th>No</th>
					<th>Name (Email)</th>
					<th>Message(s)</th>
					<th>Date</th>
					<th>Status</th>
					<th></th>
				</thead>
				<tbody>';
			$no = 1;

			foreach ($loadAll as $row) {
			echo '<tr>';
			echo '<td>'. $no .'</td>';
			echo '<td>'. $row->name.' ('.$row->email .')</td>';
			echo '<td>'. $row->message .'</td>';
			echo '<td>'. $row->date_in .'</td>';
			echo '<td>'. $row->status .'</td>';
			echo '<td>'. ($row->status == 'unreplied' ? '<button type="button" data-id="'.$row->id.'" data-name="'.ucwords($row->name).'" data-email="'.ucwords($row->email).'" class="btn btn-danger" data-toggle="modal" data-target="#replyModal"><i class="fa fa-mail-reply"></i></button>' : '<button class="btn btn-success" disabled><i class="fa fa-check"></i></button>' ) .'</td>';
			echo '</tr>';

					$no++;
				}
			echo '</tbody>
				</table>';
		}else{
			echo '<table id="tablemessage" class="display">
				<thead>
					<th>No</th>
					<th>Name (Email)</th>
					<th>Message(s)</th>
					<th>Date</th>
					<th>Status</th>
					<th></th>
				</thead>
				<tbody>
				</tbody>
				</table>';
		}
	}

	/*
	 * AJAX response
	 * load unreplied message (message center)
	 */
	public function loadUnrepliedMessage()
	{
		$status = 'unreplied';
		$tgl = $this->input->post('tgl');
		//$tgl = '2015-04-08';
		$loadUnreplied = $this->modelmessagecenter->loadMessageWithStatus($status, $tgl);
		//echo "loadUnreplied";
		if(isset($loadUnreplied)){
			echo '<table id="tablemessage" class="display">
				<thead>
					<th>No</th>
					<th>Name (Email)</th>
					<th>Message(s)</th>
					<th>Date</th>
					<th>Status</th>
					<th></th>
				</thead>
				<tbody>';
			$no = 1;
			foreach ($loadUnreplied as $row) {
			echo '<tr>';
			echo '<td>'. $no .'</td>';
			echo '<td>'. $row->name.' ('.$row->email .')</td>';
			echo '<td>'. $row->message .'</td>';
			echo '<td>'. $row->date_in .'</td>';
			echo '<td>'. $row->status .'</td>';
			echo '<td><button type="button" data-id="'.$row->id.'" data-name="'.ucwords($row->name).'" data-email="'.ucwords($row->email).'" class="btn btn-danger" data-toggle="modal" data-target="#replyModal" >';
			echo '<i class="fa fa-mail-reply"></i></button></td>';
			echo '</tr>';
			
					$no++;
				}
			echo '</tbody>
				</table>';
		}else{
			echo '<table id="tablemessage" class="display">
				<thead>
					<th>No</th>
					<th>Name (Email)</th>
					<th>Message(s)</th>
					<th>Date</th>
					<th>Status</th>
					<th></th>
				</thead>
				<tbody>
				</tbody>
				</table>';
		}
	}

	/*
	 * AJAX response
	 * load replied message (message center)
	 */
	public function loadRepliedMessage()
	{
		$status = 'replied';
		$tgl = $this->input->post('tgl');
		//$tgl = '2015-04-08';
		$loadReplied = $this->modelmessagecenter->loadMessageWithStatus($status, $tgl);
		//echo "loadRepliedMessage";
		if(isset($loadReplied)){
			echo '<table id="tablemessage" class="display">
				<thead>
					<th>No</th>
					<th>Name (Email)</th>
					<th>Message(s)</th>
					<th>Date</th>
					<th>Status</th>
					<th></th>
				</thead>
				<tbody>';
			$no = 1;
			foreach ($loadReplied as $row) {
			echo '<tr>';
			echo '<td>'. $no .'</td>';
			echo '<td>'. $row->name.' ('.$row->email .')</td>';
			echo '<td>'. $row->message .'</td>';
			echo '<td>'. $row->date_in .'</td>';
			echo '<td>'. $row->status .'</td>';
			echo '<td><button class="btn btn-success" disabled><i class="fa fa-check"></i></button></td>';
			echo '</tr>';
					$no++;
				}
			echo '</tbody>
				</table>';
		}else{
			echo '<table id="tablemessage" class="display">
				<thead>
					<th>No</th>
					<th>Name (Email)</th>
					<th>Message(s)</th>
					<th>Date</th>
					<th>Status</th>
					<th></th>
				</thead>
				<tbody>
				</tbody>
				</table>';
		}
	}
	
	/* 
	 * sending mail (reply message in message center)
	 */
	public function sendingmail()
	{
		/*$configsmtpgmail = array(
		 	'protocol' => 'smtp',
		 	'smtp_host' => 'ssl://smtp.googlemail.com',
		 	'smtp_port' => 465,
		 	'smtp_user' => 'willi.ilmukomputer@gmail.com',
		 	'smtp_pass' => '0s4pr1l!98g',
		 	'smtp_timeout' => 5,
		 	'wordwrap' => TRUE,
		 	'crlf' => '\r\n',
		 	'newline' => '\r\n'
		);
		$this->email->initialize($configsmtpgmail);*/
		
		$id = $this->input->post('id');
		$name = $this->input->post('recipient-name');
		$email = $this->input->post('recipient-email');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');
		$configsendmail = array(
			'useragent' => 'inerre website',
			'protocol' => 'sendmail',
		 	'mailpath' => '/usr/sbin/sendmail',
		 	'smtp_host' => 'localhost',
		 	'smtp_port' => 25,
		 	'charset' => 'utf-8',
		 	'wordwrap' => TRUE,
		 	'crlf' => '\r\n',
		 	'newline' => '\r\n'
		);
		$this->email->initialize($configsendmail);

		$this->email->from('info@inerre.com', 'INERRE Interior');
		$this->email->to($email);
		//$this->email->cc('');
		//$this->email->bcc('');
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
		//if(! $this->email->send()){
		//	echo 'email not send';
		//}else{
		//echo $this->email->print_debugger();	
		//}
		$this->modelmessagecenter->updateStatusMessage($id);
		redirect('administrator/messagecenter');
	}

	/*
	 * product list controller
	 */
	public function product()
	{
		$data = array(
			'title' => 'INERRE Interior - Administrator / Product',
			'title_page' => 'All Products',
			'username' => $this->tank_auth->get_username(),
			'productactive' => 'active',
			'loadAllBarang' => $this->modelproduct->loadAllBarang(),
			'loadStatusBarang' => json_encode($this->modelproduct->loadStatusBarang())
		);
		$this->load->view('administrator/product', $data);
	}

	/*
	 * add product form 
	 */
	public function productadd()
	{
		$data = array(
			'title' => 'INERRE Interior - Administrator / Add Product',
			'title_page' => 'Add Product',
			'username' => $this->tank_auth->get_username(),
			'productaddactive' => 'active',
			'loadStatusBarang' => $this->modelproduct->loadStatusBarang(),
			'loadKategori' => $this->modelproduct->loadAllKategori()
		);
		$this->load->view('administrator/product_add', $data);
	}

	/*
	 * add product process submit
	 */
	public function productaddsubmit()
	{
		// configuration form validation
		/*
		$configvalidation = array(
				array(
					'field' => 'nama',
					'label' => 'Nama barang',
					'rules' => 'required'
					),
				array(
					'field' => 'kode',
					'label' => 'Kode barang',
					'rules' => 'required'
					),
				array(
					'field' => 'stock',
					'label' => 'Stock',
					'rules' => 'required'
					)
			);
		$this->form_validation->set_rules($configvalidation);
		if($this->form_validation->run() == FALSE){
			
		}else{
	
		}
		*/

		$nama = $this->input->post('nama');
		$kode = $this->input->post('kode');
		$stock = $this->input->post('stock');
		$hargabeli = $this->input->post('harga_beli');
		$hargajual = $this->input->post('harga_jual');
		$idstatus = $this->input->post('id_status');
		$this->modelproduct->insertBarang($kode, $nama, $stock, $hargabeli, $hargajual, $idstatus);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data barang '.ucwords($nama).'('.$kode.') berhasil ditambahkan!</div>');
		redirect('administrator/product');
	}

	/*
	 * product delete process
	 */
	public function productdelete($id)
	{
		$idbarang = $id;
		$barang = $this->modelproduct->loadBarang($idbarang);
		$namabarang = $barang->nama_barang;
		$kodebarang = $barang->kode_barang;
		$this->modelproduct->deleteBarang($idbarang);
		$this->session->set_flashdata('message', '<div class="alert alert-success">'.ucwords($namabarang).'('. $kodebarang .')'.'telah berhasil dihapus!</div>');
		redirect('administrator/product');
	}

	/*
	 * product update process submit
	 */
	public function productupdatesubmit()
	{
		$idbarang = $this->input->post('idbarang');
		$nama = $this->input->post('nama');
		$kode = $this->input->post('kode');
		$stock = $this->input->post('stock');
		$hargabeli = $this->input->post('harga_beli');
		$hargajual = $this->input->post('harga_jual');
		$status = $this->input->post('status');
		$this->modelproduct->updateBarang($idbarang, $kode, $nama, $stock, $hargabeli, $hargajual, $status);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data barang '.ucwords($nama).'('.$kode.') berhasil diubah dan disimpan!</div>');
		redirect('administrator/product');
	}

	/*
	 * add category of product
	 */
	public function categoryadd()
	{
		$data = array(
			'title' => 'INERRE Interior - Administrator / Add Category',
			'title_page' => 'Category',
			'username' => $this->tank_auth->get_username(),
			'productactive' => 'active'
		);
		$this->load->view('administrator/category_add', $data);
	}

	public function loadcategory()
	{
		$category = $this->modelproduct->loadAllKategori();
		$output = json_encode($category);
		die($output);
	}

	public function categoryaddsubmit()
	{
		$kategori = $this->input->post('barang_kategori');
		$kodekategori = $this->input->post('kategori_kode');

		if($_POST){
			//check if its an ajax request, exit if not
		    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'){
				//exit script outputting json data
				$output = json_encode(
				array(
					'type'=> 'error', 
					'text' => 'Request must come from Ajax'
				));
				die($output);
		    } 
		    if(!isset($kategori) || !isset($kodekategori)){
				$output = json_encode(array('type'=>'error', 'text' => 'Tidak boleh kosong'));
				die($output);
			}
			if(strlen($kodekategori) != 3){
				$output = json_encode(array('type'=>'error', 'text' => 'Kode kategori tidak boleh kurang atau lebih dari 3 huruf'));
				die($output);
			}
			if(strlen($kodekategori) == 3){
				$cekkode = $this->modelproduct->cekKategoriKode($kodekategori);
				$cekkategori = $this->modelproduct->cekKategoriNama($kategori);
				

				if($cekkategori->num_rows() > 0){
					$output = json_encode(array('type'=>'error', 'text' => 'Kategori yang dimasukkan sudah ada'));
					die($output);
				}
				if($cekkode->num_rows() > 0){
					$output = json_encode(array('type'=>'error', 'text' => 'Kode kategori yang dimasukkan sudah ada'));
					die($output);
				}
				if(($cekkategori->num_rows()==0) && ($cekkode->num_rows()==0)){
					$this->modelproduct->insertKategori($kategori, $kodekategori);
					$loadkategori = $this->modelproduct->loadKategoriNama($kategori);
					$output = json_encode(array('type'=>'message', 'text' => 'Kategori telah tersimpan.','datainsert' => array('id'=> $loadkategori->id ,'kategori' => $kategori, 'kode' => $kodekategori)));
					die($output);
				}
			}
		}
	}

	public function categoryupdatesubmit()
	{
		$idcat = $this->input->post('idcat');
		$kategori = $this->input->post('kategori_edit');
		$kodekategori = $this->input->post('kode_edit');
		if($kategori=="" || $kodekategori==""){
			$this->session->set_flashdata('message', '<div class="alert alert-success">Tidak boleh kosong!</div>');
			redirect('administrator/categoryadd');
		}
		if(strlen($kodekategori) != 3){
			$this->session->set_flashdata('message', '<div class="alert alert-success">Kode kategori tidak boleh kurang atau lebih dari 3 huruf!</div>');
			redirect('administrator/categoryadd');
		}
		if(strlen($kodekategori) == 3){
			$this->modelproduct->updateKategori($idcat, $kategori, $kodekategori);
			$this->session->set_flashdata('message', '<div class="alert alert-success">Kategori berhasil diubah dan disimpan!</div>');
			redirect('administrator/categoryadd');
			
		}
	}

	public function categorydelete($id)
	{
		$idcat = $id;
		$tabelkategori = $this->modelproduct->loadKategori('id', $idcat);
		$kategori = $tabelkategori->barang_kategori;
		$kode = $tabelkategori->kategori_kode;
		$this->modelproduct->deleteKategori($idcat);
		$this->session->set_flashdata('message', '<div class="alert alert-success">'.ucwords($kategori).' ('. $kode .')'.' telah berhasil dihapus!</div>');
		redirect('administrator/categoryadd');
	}

	/*
	public function categoryupdatesubmit()
	{
		$idcat = $this->input->post('idcat');
		$kategori = $this->input->post('barang_kategori');
		$kodekategori = $this->input->post('kategori_kode');

		if($_POST){
			//check if its an ajax request, exit if not
		    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'){
				//exit script outputting json data
				$output = json_encode(
				array(
					'type'=> 'error', 
					'text' => 'Request must come from Ajax'
				));
				die($output);
		    } 
		    if(!isset($kategori) || !isset($kodekategori)){
				$output = json_encode(array('type'=>'error', 'text' => 'Tidak boleh kosong'));
				die($output);
			}
			if(strlen($kodekategori) != 3){
				$output = json_encode(array('type'=>'error', 'text' => 'Kode kategori tidak boleh kurang atau lebih dari 3 huruf'));
				die($output);
			}
			if(strlen($kodekategori) == 3){
				$cekkode = $this->modelproduct->cekKategoriKode($kodekategori);
				$cekkategori = $this->modelproduct->cekKategoriNama($kategori);
				

				if($cekkategori->num_rows() > 0){
					$output = json_encode(array('type'=>'error', 'text' => 'Kategori yang dimasukkan sudah ada'));
					die($output);
				}
				if($cekkode->num_rows() > 0){
					$output = json_encode(array('type'=>'error', 'text' => 'Kode kategori yang dimasukkan sudah ada'));
					die($output);
				}
				if(($cekkategori->num_rows()==0) && ($cekkode->num_rows()==0)){
					$this->modelproduct->updateKategori($id, $kategori, $kodekategori);
					$loadkategori = $this->modelproduct->loadKategoriNama($kategori);
					$output = json_encode(array('type'=>'message', 'text' => 'Kategori yang diubah telah tersimpan.','datainsert' => array('id'=> $loadkategori->id ,'kategori' => $kategori, 'kode' => $kodekategori)));
					die($output);
				}
			}
		}
	}
*/
	

	/*public function test(){
		// $data = array(
			// 'loadAllBarang' => $this->modelproduct->loadAllBarang()
		// );
		// $this->load->view('administrator/test', $data);
		$loadStatusBarang = $this->modelproduct->loadStatusBarang();
		echo json_encode($loadStatusBarang);
	}*/
	
	/*function tosha1(){
		echo sha1('INERREInteriorBandung');
	}*/

}

/* End of file administrator.php */
/* Location: ./application/controllers/administrator.php */
