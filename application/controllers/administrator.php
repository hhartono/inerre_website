<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('email', 'url'));
		$this->load->library(array('form_validation','email', 'tank_auth', 'session'));
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
			echo '<div class="content-panel">
				<section id="no-more-tables">
				<table id="tablemessage" class="display">
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
			echo '<td data-title="No.">'. $no .'</td>';
			echo '<td data-title="Name">'. $row->name.' ('.$row->email .')</td>';
			echo '<td data-title="Message">'. $row->message .'</td>';
			echo '<td data-title="Date">'. $row->date_in .'</td>';
			echo '<td data-title="Status">'. $row->status .'</td>';
			echo '<td>'. ($row->status == 'unreplied' ? '<button type="button" data-id="'.$row->id.'" data-name="'.ucwords($row->name).'" data-email="'.ucwords($row->email).'" class="btn btn-danger" data-toggle="modal" data-target="#replyModal"><i class="fa fa-mail-reply"></i></button>' : '<button class="btn btn-success" disabled><i class="fa fa-check"></i></button>' ) .'</td>';
			echo '</tr>';

					$no++;
				}
			echo '</tbody>
				</table>
				</section>
				</div>';
		}else{
			echo '<div class="content-panel">
				<section id="no-more-tables">
			<table id="tablemessage" class="display">
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
				</table>
				</section>
				</div>';
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
			echo '<div class="content-panel">
				<section id="no-more-tables">
				<table id="tablemessage" class="display">
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
			echo '<td data-title="No.">'. $no .'</td>';
			echo '<td data-title="Name">'. $row->name.' ('.$row->email .')</td>';
			echo '<td data-title="Message">'. $row->message .'</td>';
			echo '<td data-title="Date">'. $row->date_in .'</td>';
			echo '<td data-title="Status">'. $row->status .'</td>';
			echo '<td><button type="button" data-id="'.$row->id.'" data-name="'.ucwords($row->name).'" data-email="'.ucwords($row->email).'" class="btn btn-danger" data-toggle="modal" data-target="#replyModal" >';
			echo '<i class="fa fa-mail-reply"></i></button></td>';
			echo '</tr>';
			
					$no++;
				}
			echo '</tbody>
				</table>
				</section>
				</div>';
		}else{
			echo '<div class="content-panel">
				<section id="no-more-tables">
				<table id="tablemessage" class="display">
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
				</table>
				</section>
				</div>';
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
			echo '<div class="content-panel">
				<section id="no-more-tables">
				<table id="tablemessage" class="display">
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
			echo '<td data-title="No.">'. $no .'</td>';
			echo '<td data-title="Name">'. $row->name.' ('.$row->email .')</td>';
			echo '<td data-title="Message">'. $row->message .'</td>';
			echo '<td data-title="Date">'. $row->date_in .'</td>';
			echo '<td data-title="Status">'. $row->status .'</td>';
			echo '<td><button class="btn btn-success" disabled><i class="fa fa-check"></i></button></td>';
			echo '</tr>';
					$no++;
				}
			echo '</tbody>
				</table>
				</section>
				</div>';
		}else{
			echo '<div class="content-panel">
				<section id="no-more-tables">
				<table id="tablemessage" class="display">
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
				</table>
				</section>
				</div>';
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
			'loadStatusBarang' => json_encode($this->modelproduct->loadStatusBarang()),
			'loadCategory' => json_encode($this->modelproduct->loadAllCategory())
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
			'loadCategory' => $this->modelproduct->loadAllCategory()
		);
		$this->load->view('administrator/product_add', $data);
	}

	/*
	 * add product process submit
	 */
	public function productaddsubmit()
	{
		// configuration form validation
		$this->form_validation->set_rules('nama', 'Nama barang', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori barang', 'required');
		$this->form_validation->set_rules('kode', 'Kode barang', 'required');
		$this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
		$this->form_validation->set_rules('harga_beli', 'Harga beli', 'numeric');
		$this->form_validation->set_rules('harga_jual', 'Harga jual', 'numeric');
		$this->form_validation->set_rules('id_status', 'Status barang', 'required');
		if($this->form_validation->run() == FALSE){
			$value = array(
				'nama' => form_error('nama'),
				'kategori' => form_error('kategori'),
				'kode' => form_error('kode'),
				'stock' => form_error('stock'),
				'hargabeli' => form_error('harga_beli'),
				'hargajual' => form_error('harga_jual'),
				'idstatus' => form_error('id_status')
				);
			$output = json_encode(array('type'=>'error', 'content_form' => validation_errors()));
			die($output);
		}else{
			$nama = $this->input->post('nama');
			$kategori = $this->input->post('kategori');
			$kode = $this->input->post('kode');
			$stock = $this->input->post('stock');
			$hargabeli = $this->input->post('harga_beli');
			$hargajual = $this->input->post('harga_jual');
			$idstatus = $this->input->post('id_status');
			// insert product to database
			$this->modelproduct->insertBarang($kode, $nama, $stock, $hargabeli, $hargajual, $idstatus, $kategori);
			$output = json_encode(array('type'=> 'message', 'text' => ucwords($nama).'('.$kode.') telah tersimpan'));
			die($output);
		}
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
		// configuration form validation
		$this->form_validation->set_rules('nama', 'Nama barang', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori barang', 'required');
		$this->form_validation->set_rules('kode', 'Kode barang', 'required');
		$this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
		$this->form_validation->set_rules('harga_beli', 'Harga beli', 'numeric');
		$this->form_validation->set_rules('harga_jual', 'Harga jual', 'numeric');
		$this->form_validation->set_rules('status', 'Status barang', 'required');
		if($this->form_validation->run() == FALSE){
			// form validation false
			$value = array(
				'nama' => form_error('nama'),
				'kategori' => form_error('kategori'),
				'kode' => form_error('kode'),
				'stock' => form_error('stock'),
				'hargabeli' => form_error('harga_beli'),
				'hargajual' => form_error('harga_jual'),
				'idstatus' => form_error('status')
				);
			$output = json_encode(array('type'=>'error', 'content_form' => validation_errors()));
			die($output);
		}else{
			$idbarang = $this->input->post('idbarang');
			$nama = $this->input->post('nama');
			$kode = $this->input->post('kode');
			$stock = $this->input->post('stock');
			$hargabeli = $this->input->post('harga_beli');
			$hargajual = $this->input->post('harga_jual');
			$status = $this->input->post('status');
			$kategoriedit = $this->input->post('kategori');
			
			$this->modelproduct->updateBarang($idbarang, $kode, $nama, $stock, $hargabeli, $hargajual, $status, $kategoriedit);
			$output = json_encode(array('type'=> 'message', 'text' => ucwords($nama).' ('.$kode.') telah diubah dan tersimpan'));
			die($output);
		}
	}

	/*
	 * product update stock process submit 
	 */
	public function productupdatestocksubmit()
	{
		$this->form_validation->set_rules('stockadd', 'Stock', 'numeric');
		$this->form_validation->set_message('numeric', 'Input harus berupa angka');
		if($this->form_validation->run() == FALSE){
			$value = array(
				'stockadd' => form_error('input_stock_update')
			);
			$output = json_encode(array('type'=>'error', 'text' => validation_errors()));
			die($output);
		}else{
			$idproduct = $this->input->post('idproduct');
			$laststock = $this->input->post('laststock');
			$stockadd = $this->input->post('stockadd');
			$newstock = 0;
			if($stockadd == ""){
				$stockadd = 0;
				$newstock = $laststock + $stockadd;
			}else{
				$newstock = $laststock + $stockadd;
			}
			$this->modelproduct->updateProductStock($idproduct, $newstock);
			$output = json_encode(array('type' => 'message', 'text' => 'Stock telah diperbarui!', 'newstock' => $newstock));
			die($output);
		}

	}
	/*
	 * generate 'kode barang' based on selected category
	 */
	public function generateproductcode()
	{
		$kategori = $this->input->post('kategori');
		
		$getcode = $this->modelproduct->getCode($kategori);
		if($getcode->num_rows()>0){
			$data = $getcode->row();
			$lastcode = $data->kode_barang;
			$codecategory = $data->kategori_kode;
			$getnumlastcode = substr($lastcode, 3);
			$nextnum = str_pad($getnumlastcode+1, 4, 0, STR_PAD_LEFT);
			$resultcode = $codecategory.''.$nextnum;
			$output = json_encode(array('type' => 'code','kodebarang' => $resultcode));
			die($output);
		}else{
			$getcodecat = $this->modelproduct->getCodeCat($kategori);
			$codecat = $getcodecat->kategori_kode;
			$resultcode = $codecat.'0001';
			$output = json_encode(array('type' => 'code', 'kodebarang' => $resultcode));
			die($output);
		}	
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
		$category = $this->modelproduct->loadAllCategory();
		$output = json_encode($category);
		die($output);
	}

	public function categoryaddsubmit()
	{
		$category = $this->input->post('category');
		$categorycode = $this->input->post('categorycode');

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
		    /*
		    if(!isset($category) || !isset($categorycode)){
				$output = json_encode(array('type'=>'error', 'text' => 'Tidak boleh kosong'));
				die($output);
			}
			*/
			if(strlen($categorycode) != 3){
				$output = json_encode(array('type'=>'error', 'text' => 'Kode kategori tidak boleh kurang atau lebih dari 3 huruf'));
				die($output);
			}
			if(strlen($categorycode) == 3){
				$checkCode = $this->modelproduct->checkCategoryCode($categorycode);
				$checkCategory = $this->modelproduct->checkCategoryName($category);
				

				if($checkCategory->num_rows() > 0){
					$output = json_encode(array('type'=>'error', 'text' => 'Kategori yang dimasukkan sudah ada'));
					die($output);
				}
				if($checkCode->num_rows() > 0){
					$output = json_encode(array('type'=>'error', 'text' => 'Kode kategori yang dimasukkan sudah ada'));
					die($output);
				}
				if(($checkCategory->num_rows()==0) && ($checkCode->num_rows()==0)){
					$this->modelproduct->insertCategory($category, $categorycode);
					$loadCategory = $this->modelproduct->loadCategoryName($category);
					$output = json_encode(array('type'=>'message', 'text' => 'Kategori telah tersimpan.','datainsert' => array('id'=> $loadCategory->id ,'category' => $category, 'categorycode' => $categorycode)));
					die($output);
				}
			}
		}
	}

	public function categoryupdatesubmit()
	{

		$idcat = $this->input->post('idcat');
		$category = $this->input->post('category');
		$categorycurrent = $this->input->post('categorycurrent');
		$categorycode = $this->input->post('categorycode');
		$categorycodecurrent = $this->input->post('categorycodecurrent');

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
		    /*
		    if(!isset($category) || !isset($categorycode)){
				$output = json_encode(array('type'=>'error', 'text' => 'Tidak boleh kosong'));
				die($output);
			}
			*/
			if(strlen($categorycode) != 3){
				$output = json_encode(array('type'=>'error', 'text' => 'Kode kategori tidak boleh kurang atau lebih dari 3 huruf'));
				die($output);
			}
			if(strlen($categorycode) == 3){
				$categorycondition = false;
				$codecondition = false;
				
				$checkCategoryExclude = $this->modelproduct->checkCategoryNameExclude($categorycurrent);
				$checkCodeExclude = $this->modelproduct->checkCategoryCodeExclude($categorycodecurrent);

				if($checkCategoryExclude->num_rows() > 0){
					foreach ($checkCategoryExclude->result() as $row) {
						if($category == $row->barang_kategori){
							$output = json_encode(array('type'=>'error', 'text' => 'Kategori yang dimasukkan sudah ada'));
							die($output);
						}else{
							$categorycondition = true;
						}
					}
				}else{
					$categorycondition = true;
				}
				if($checkCodeExclude->num_rows() > 0){
					foreach ($checkCodeExclude->result() as $row) {
						if($categorycode == $row->kategori_kode){
							$output = json_encode(array('type'=>'error', 'text' => 'Kode kategori yang dimasukkan sudah ada'));
							die($output);
						}else{
							$codecondition = true;
						}
					}
				}else{
					$codecondition = true;
				}

				if($categorycondition && $codecondition){
					$this->modelproduct->updateCategory($idcat, $category, $categorycode);
					$loadCategory = $this->modelproduct->loadCategoryName($category);
					$output = json_encode(array('type'=>'message', 'text' => 'Kategori '.$category.' ('. $categorycode .') yang diubah telah tersimpan.','dataupdate' => array('id'=> $loadCategory->id ,'category' => $category, 'categorycode' => $categorycode)));
					die($output);
				}
			}
		}

		/*if($category=="" || $categorycode==""){
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Tidak boleh kosong!</div>');
			redirect('administrator/categoryadd');
		}
		if(strlen($categorycode) != 3){
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Kode kategori tidak boleh kurang atau lebih dari 3 huruf!</div>');
			redirect('administrator/categoryadd');
		}
		if(strlen($categorycode) == 3){
			$this->modelproduct->updateCategory($idcat, $category, $categorycode);
			$this->session->set_flashdata('message', '<div class="alert alert-success">Kategori berhasil diubah dan disimpan!</div>');
			redirect('administrator/categoryadd');
			
		}*/
	}

	public function categorydelete($id)
	{
		$idcat = $id;
		$tableCategory = $this->modelproduct->loadCategory('id', $idcat);
		$category = $tableCategory->barang_kategori;
		$categorycode = $tableCategory->kategori_kode;
		$this->modelproduct->deleteCategory($idcat);
		$this->session->set_flashdata('message', '<div class="alert alert-success">'.ucwords($category).' ('. $categorycode .')'.' telah berhasil dihapus!</div>');
		redirect('administrator/categoryadd');
	}
	/*
	public function test(){
		// $data = array(
			// 'loadAllBarang' => $this->modelproduct->loadAllBarang()
		// );
		// $this->load->view('administrator/test', $data);
		$loadStatusBarang = $this->modelproduct->loadStatusBarang();
		echo json_encode($loadStatusBarang);
	}
	*/
	/*
	function tosha1(){
		echo sha1('INERREInteriorBandung');
	}
	*/
}

/* End of file administrator.php */
/* Location: ./application/controllers/administrator.php */
