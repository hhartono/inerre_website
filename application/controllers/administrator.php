<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {

	//private $sessioninvoice;

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('email', 'url'));
		$this->load->library(array('form_validation','email', 'tank_auth', 'session'));
		$this->is_logged_in();
		$this->load->model(array('modelmessagecenter', 'modelproduct', 'modelportfolio'));
	}

	/*
	 * main (index) administrator
	 */
	public function index()
	{	
		$data = array(
			'title' => 'INERRE Interior - Administrator / Dashboard',
			'dashboardactive' => 'active',
			'username' => $this->tank_auth->get_username(),
			'loadCartbyUser' => $this->modelproduct->loadCartbyUser($this->session->userdata('user_id'))
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
			'username' => $this->tank_auth->get_username(),
			'loadCartbyUser' => $this->modelproduct->loadCartbyUser($this->session->userdata('user_id'))
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
			'loadCategory' => json_encode($this->modelproduct->loadAllCategory()),
			'loadCartbyUser' => $this->modelproduct->loadCartbyUser($this->session->userdata('user_id'))
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
			'loadCategory' => $this->modelproduct->loadAllCategory(),
			'loadCartbyUser' => $this->modelproduct->loadCartbyUser($this->session->userdata('user_id'))
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
		$this->form_validation->set_message('numeric', '%s harus berupa angka');
		if($this->form_validation->run() == FALSE){
			$formerror = array(
				'nama' => form_error('nama'),
				'kategori' => form_error('kategori'),
				'kode' => form_error('kode'),
				'stock' => form_error('stock'),
				'hargabeli' => form_error('harga_beli'),
				'hargajual' => form_error('harga_jual'),
				'idstatus' => form_error('id_status')
			);
			/*$setvalueerror = array(
				'setvaluenama' => set_value('nama'),
				'setvaluekategori' => set_value('kategori'),
				'setvaluekode' => set_value('kode'),
				'setvaluestok' => set_value('stock'),
				'setvaluehargabeli' => set_value('harga_beli'),
				'setvaluehargajual' => set_value('harga_jual'),
				'setvaluestatus' => set_value('idstatus')
			);*/
			$output = json_encode(
						array(
							'type'=>'error', 
							'validation_errors' => validation_errors(), 
							'formerror' => $formerror
							)
						);
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
		$this->form_validation->set_message('numeric', '%s harus berupa angka');
		if($this->form_validation->run() == FALSE){
			// form validation false
			$formerror = array(
				'nama' => form_error('nama'),
				'kategori' => form_error('kategori'),
				'kode' => form_error('kode'),
				'stock' => form_error('stock'),
				'hargabeli' => form_error('harga_beli'),
				'hargajual' => form_error('harga_jual'),
				'idstatus' => form_error('status')
			);
			/*$setvalueerror = array(
				'setvaluenama' => set_value('nama'),
				'setvaluekategori' => set_value('kategori'),
				'setvaluekode' => set_value('kode'),
				'setvaluestok' => set_value('stock'),
				'setvaluehargabeli' => set_value('harga_beli'),
				'setvaluehargajual' => set_value('harga_jual'),
				'setvaluestatus' => set_value('status')
			);*/
			$output = json_encode(
							array(
								'type'=>'error', 
								'validation_errors' => validation_errors(),
								'formerror' => $formerror
								)
							);
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
		$this->form_validation->set_message('numeric', 'harus berupa angka');
		if($this->form_validation->run() == FALSE){
			$formerror = array(
				'stockadd' => form_error('stockadd')
			);
			$output = json_encode(
						array(
							'type'=>'error', 
							'validation_errors' => validation_errors(), 
							'formerror' => $formerror
							)
						);
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
	 * cart table page
	 */
	public function cart()
	{
		$iduser = $this->session->userdata('user_id');
		$lastitemcart = $this->modelproduct->lastInsertCart($iduser);
		if($lastitemcart->num_rows()>0){
			$itemcart = $lastitemcart->row();
			$invoice = $itemcart->no_invoice;
		}else{
			$invoice = '';
		}
		$data = array(
			'title' => 'INERRE Interior - Administrator / Product',
			'title_page' => 'Cart',
			'username' => $this->tank_auth->get_username(),
			'productactive' => 'active',
			'loadCartbyUser' => $this->modelproduct->loadCartbyUser($this->session->userdata('user_id')),
			'loadInvoice' => $invoice
		);
		$this->load->view('administrator/cart', $data);
	}

	public function cartaddsubmit()
	{
		$idproduct = $this->input->post('idproduct');
		$laststock = $this->input->post('laststock');
		$amount = $this->input->post('amount');
		$this->form_validation->set_rules('amount', 'Jumlah Barang', 'numeric');
		$this->form_validation->set_message('numeric', '%s harus berupa angka');
		if($this->form_validation->run() == FALSE){
			$formerror = array(
				'amount' => form_error('amount')
			);
			$output = json_encode(
							array(
								'type'=>'error', 
								'validation_errors' => validation_errors(),
								'formerror' => $formerror
								)
							);
			die($output);
		}else{
			/*
			 * BELUM SELESAI
			 * - update stock jika batal ditambahkan / dihapus dari cart
			 * - buat tampilan cart. -> bisa hapus barang
			 */
			$checkcart = $this->modelproduct->checkCart($idproduct);
			if($checkcart->num_rows()>0){
				// jika ada barang yang sama
				$lastamount = $checkcart->row()->amount;
				$total = $lastamount + $amount;
				$this->modelproduct->updateAmountProduct($idproduct, $total);

				// update product stock
				$newstock = $laststock - $amount;
				$this->modelproduct->updateStockbyCart($idproduct, $newstock);

				$output = json_encode(
								array(
									'type' => 'message',
									'text' => 'barang berhasil ditambahkan'
								)
					);
				die($output);
			}else{
				// jika barang tidak sama
				$iduser = $this->session->userdata('user_id');

				$lastitemcart = $this->modelproduct->lastInsertCart($iduser);
				
				if($lastitemcart->num_rows()>0){
					$itemcart = $lastitemcart->row();
					$lastinvoice = $itemcart->no_invoice;
					$this->modelproduct->insertCart($lastinvoice, $idproduct, $amount, $iduser);

					// update product stock
					$newstock = $laststock - $amount;
					$this->modelproduct->updateStockbyCart($idproduct, $newstock);

					$output = json_encode(
									array(
										'type' => 'message',
										'text' => 'barang berhasil ditambahkan ke invoice '.$lastinvoice
									)
							);
					die($output);
				}else{
					$invoice = '#'.$this->generateRandomChar().date('dmy');
					$this->modelproduct->insertCart($invoice, $idproduct, $amount, $iduser);
					
					// update product stock
					$newstock = $laststock - $amount;
					$this->modelproduct->updateStockbyCart($idproduct, $newstock);

					$output = json_encode(
									array(
										'type' => 'message',
										'text' => 'barang berhasil ditambahkan dengan No. invoice '.$invoice
									)
							);
					die($output);
				}
			}
		}
	}

	public function cartproductdelete()
	{
		$idcart = $this->input->post('hidden-idcart');
		$idproduct = $this->input->post('hidden-idproduct');
		$amount = $this->input->post('hidden-amount');
		$laststock = $this->input->post('hidden-laststock');
		$product = $this->input->post('hidden-product');

		$querydeletecart = $this->modelproduct->deleteProductCart($idcart);
		if($querydeletecart){
			$newstock = $laststock+$amount;
			$this->modelproduct->updateStockbyCart($idproduct, $newstock);
			//$this->modelproduct->updateProductStockBack($idproduct, $newstock);
			$this->session->set_flashdata('message', '<div class="alert alert-success">'.$product.' telah dihapus dari cart!</div>');
			redirect('administrator/cart');
		}
	}

	public function cartempty()
	{
		$invoice = $this->input->post('hidden-invoice');
		$iduser = $this->session->userdata('user_id');
		$loadCart = $this->modelproduct->loadCartbyUser($iduser);
		foreach ($loadCart as $row) {
			$idproduct = $row->idproduct;
			$idcart = $row->idcart;
			$amount = $row->amount;
			$laststock = $row->stock_barang;
			$newstock = $laststock + $amount;
			$querydeletecart = $this->modelproduct->deleteProductCart($idcart);
			if($querydeletecart){
				$this->modelproduct->updateStockbyCart($idproduct, $newstock);	
			}
		}
		$this->modelproduct->truncateCart(); // truncate cart table
		$this->session->set_flashdata('message', '<div class="alert alert-success">Transaksi dengan No. '.$invoice.' telah dibatalkan.</div>');
		redirect('administrator/cart');
	}
	
	public function updatecart()
	{
		$size = '';
		if(is_array($this->input->post('hidden-idcart'))){
			foreach ($this->input->post('hidden-idcart') as $value) {
				$idcart[] = $value;
			}
			$size = count($idcart);
		}
		if(is_array($this->input->post('hidden-idproduct'))){
			foreach ($this->input->post('hidden-idproduct') as $value) {
				$idproduct[] = $value;
			}
		}
		if(is_array($this->input->post('hidden-laststock'))){
			foreach ($this->input->post('hidden-laststock') as $value) {
				$laststock[] = $value;
			}
		}
		if(is_array($this->input->post('input-cart-amount'))){
			foreach ($this->input->post('input-cart-amount') as $value) {
				$newamount[] = $value;
			}
		}
		if(is_array($this->input->post('hidden-cart-amount'))){
			foreach ($this->input->post('hidden-cart-amount') as $value) {
				$lastamount[]= $value;
			}
		}

		for($i=0; $i < $size; $i++){
			$idc = $idcart[$i];
			$idp = $idproduct[$i];
			$ls = $laststock[$i];
			$na = $newamount[$i];
			$la = $lastamount[$i];

			if($na < $la){
				$new = $la - $na;
				$ls = $ls + $new;
				if($na == 0){
					$this->modelproduct->deleteProductCart($idc);
					$this->modelproduct->updateStockbyCart($idp, $ls);
					$this->modelproduct->updateAmountProduct($idp, $na);
				}else{
					$this->modelproduct->updateStockbyCart($idp, $ls);
					$this->modelproduct->updateAmountProduct($idp, $na);	
				}
			}
			if($na > $la){
				$new = $na - $la;
				$ls = $ls - $new;
				$this->modelproduct->updateStockbyCart($idp, $ls);
				$this->modelproduct->updateAmountProduct($idp, $na);
			}
			if($na == $la){
				// update tanpa mengubah data
				$this->modelproduct->updateStockbyCart($idp, $ls);
				$this->modelproduct->updateAmountProduct($idp, $ls);
			}

		}
		$this->session->set_flashdata('message', '<div class="alert alert-success">Cart telah diperbarui.</div>');
		redirect('administrator/cart');
	}

	public function generateRandomChar($length = 4) {
	    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomChar = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomChar .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomChar;
	}
	/*

	public function unsetadmininvoice()
	{
		$this->session->unset_userdata('adminInvoice');
	}

	public function gettime()
	{
		//echo date('dmy');
		$invoice = '#'.$this->generateRandomChar().'-'.date('dmy');
		echo $invoice;
		echo '<br/>';
		echo $this->session->userdata('user_id');
	}
	*/

	/*
	 * add category of product
	 */
	public function categoryadd()
	{
		$data = array(
			'title' => 'INERRE Interior - Administrator / Add Category',
			'title_page' => 'Add Category',
			'username' => $this->tank_auth->get_username(),
			'productactive' => 'active',
			'loadCartbyUser' => $this->modelproduct->loadCartbyUser($this->session->userdata('user_id'))
		);
		$this->load->view('administrator/category_add', $data);
	}

	/*
	 * load category json encode
	 */
	public function loadcategory()
	{
		$category = $this->modelproduct->loadAllCategory();
		$output = json_encode($category);
		die($output);
	}

	/*
	 * category add process submit
	 */
	public function categoryaddsubmit()
	{
		$category = $this->input->post('category');
		$categorycode = strtoupper($this->input->post('categorycode'));


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

	/*
	 * category update process submit
	 */
	public function categoryupdatesubmit()
	{

		$idcat = $this->input->post('idcat');
		$category = $this->input->post('category');
		$categorycurrent = $this->input->post('categorycurrent');
		$categorycode = strtoupper($this->input->post('categorycode'));
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

	/*
	 * category delete
	 */
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
	 * portfolio list controller
	 */
	public function portfolio()
	{
		$data = array(
			'title' => 'INERRE Interior - Administrator / Portfolio',
			'title_page' => 'All Portfolios',
			'username' => $this->tank_auth->get_username(),
			'portfolioactive' => 'active',
			'loadCartbyUser' => $this->modelproduct->loadCartbyUser($this->session->userdata('user_id')),
			'loadAllPortfolio' => $this->modelportfolio->loadAllPortfolio()
		);
		$this->load->view('administrator/portfolio', $data);
	}

	/*
	 * add portfolio form & uploader
	 */
	public function portfolioadd()
	{
		$data = array(
			'title' => 'INERRE Interior - Administrator / Add Portfolio',
			'title_page' => 'Add Portfolio',
			'username' => $this->tank_auth->get_username(),
			'portfolioactive' => 'active',
			'loadCartbyUser' => $this->modelproduct->loadCartbyUser($this->session->userdata('user_id'))
		);
		$this->load->view('administrator/portfolio_add', $data);
	}

	/*
	 * function portfolioaddsubmit
	 */
	public function portfolioaddsubmit()
	{
		//load library upload
		$this->load->library('upload');

		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$location = $this->input->post('location');
	
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('description','Description','required');
		
		if($this->form_validation->run() == FALSE){
			$formerror = array(
				'title' => form_error('title'),
				'description' => form_error('description')
			);
			$output = json_encode(
					array(
						'type'=>'error', 
						'validation_errors' => validation_errors(),
						'formerror' => $formerror
					)
			);
		}else{
			if(!empty($_FILES)){
				// insert portfolio to portfolio table
				$this->modelportfolio->insertPortfolio($title, $description, $location, $this->sluggify($title));
				// get last portfolio insert id
				$insertid = mysql_insert_id();
				if(isset($insertid)){
					$this->modelportfolio->insertPortfolioId($insertid);
					// count uploaded file
					$countUploaded = count($_FILES['file']['name']);

					for($i=0; $i < $countUploaded; $i++){
						$_FILES['userfile']['name'] = $_FILES['file']['name'][$i];
						$_FILES['userfile']['type'] = $_FILES['file']['type'][$i];
						$_FILES['userfile']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
						$_FILES['userfile']['error'] = $_FILES['file']['error'][$i];
						$_FILES['userfile']['size'] = $_FILES['file']['size'][$i];

						$config = array(
							'upload_path' => 'upload/portfolio/',
							'allowed_types' => 'jpg|jpeg|png',
							'max_size' => '1024',
							'encrypt_name' => true
							/*'max_width' => '1920',
							'max_height' => '1920'*/
						);
						$this->upload->initialize($config);

						if( !$this->upload->do_upload() ){
							$output = json_encode(
								array(
									'message' => 'error',
									'error' => $this->upload->display_errors()
								)
							);
						}else{
							$upload_data = $this->upload->data();
							// rename uploaded file
							$newname = rename(
								$upload_data['full_path'],
								$upload_data['file_path'].'/inerre_interior_'.$upload_data['file_name']
							);
							
							$newtitleinsert = 'inerre_interior_'.$upload_data['file_name'];
							// upload success, insert to portfolio_album table
							$this->modelportfolio->insertPortfolioAlbum($newtitleinsert, "1",  $insertid);

							$output = json_encode(
								array(
									'message' => 'success',
									'upload_data' => $this->upload->data()
								)
							);
						}
					}
				}
			}else{
				$output = json_encode(
						array(
							'error' => $this->upload->display_errors(),
							'tmp_name' => $file['tmp_name'][0],
							'tmp_name_length' => sizeof($file['tmp_name']),
							'tmp_name_isArray' => is_array($file['tmp_name'])
						)
				);
			}
		}
		die($output);
	}

	/*
	 * add portfolio project form & uploader
	 */
	public function portfolioprojectadd()
	{
		$uri3 = $this->uri->segment(3);
		if($uri3 == ''){
			redirect('administrator/portfolio');
		}else{
			$data = array(
				'title' => 'INERRE Interior - Administrator / Add Portfolio Project',
				'title_page' => 'Add Portfolio Project',
				'username' => $this->tank_auth->get_username(),
				'portfolioactive' => 'active',
				'loadCartbyUser' => $this->modelproduct->loadCartbyUser($this->session->userdata('user_id')),
				'uri' => $uri3
			);
			$this->load->view('administrator/portfolioproject_add', $data);
		}
	}

	/*
	 * function portfolioaddsubmit
	 */

	public function portfolioprojectphoto1submit()
	{
		$config = array(
				'upload_path' => 'upload/portfolio/',
				'allowed_types' => 'gif|jpg|jpeg|png',
				'max_size' => '1024',
				'max_width' => '1920',
				'max_height' => '1920'
			);
		$this->load->library('upload', $config);
		$id = $this->input->post('id');
		$file = $this->input->post('file');
		if(!$this->upload->do_upload('file')){
			$output = json_encode(array('error' => $this->upload->display_errors(), 'file'=> $file));
		}else{
			$filename = $this->upload->data();
			$this->modelportfolio->insertPortfolioProject($filename['file_name'], $id);
			$output = json_encode(array('upload_data' => $this->upload->data()));
		}
		die($output);
	}

	public function portfolioprojectphoto2submit()
	{
		$config = array(
				'upload_path' => 'upload/portfolio/',
				'allowed_types' => 'gif|jpg|jpeg|png',
				'max_size' => '1024',
				'max_width' => '1920',
				'max_height' => '1920'
			);
		$this->load->library('upload', $config);
		$id = $this->input->post('ids');
		$file = $this->input->post('file');
		if(!$this->upload->do_upload('file')){
			$output = json_encode(array('error' => $this->upload->display_errors(), 'file'=> $file));
		}else{
			$filename = $this->upload->data();
			$this->modelportfolio->insertPortfolioProjectPhoto2($filename['file_name'], $id);
			$output = json_encode(array('upload_data' => $this->upload->data()));
		}
		die($output);
	}

	public function portfolioprojectaddsubmit()
	{
		//load library upload
		$this->load->library('upload');

		$highlights1 = $this->input->post('highlights1');
		$highlights2 = $this->input->post('highlights2');
		$description_left = $this->input->post('description_left');
		$description_right = $this->input->post('description_right');
		$idportfolio = $this->input->post('idportfolio');
	
		$this->form_validation->set_rules('highlights1','Highlights1','required');
		$this->form_validation->set_rules('highlights2','Highlights2','required');
		$this->form_validation->set_rules('description_left','Description Left','required');
		$this->form_validation->set_rules('description_right','Description Right','required');
		
		if($this->form_validation->run() == FALSE){
			$formerror = array(
				'highlights1' => form_error('highlights1'),
				'highlights2' => form_error('highlights2'),
				'description_left' => form_error('description_left'),
				'description_left' => form_error('description_left')
			);
			$output = json_encode(
					array(
						'type'=>'error', 
						'validation_errors' => validation_errors(),
						'formerror' => $formerror
					)
			);
		}else{
			if(!empty($_FILES)){
				// insert portfolio to portfolio table
				$this->modelportfolio->insertPortfolioDescription($highlights1, $highlights2, $description_left, $description_right, $idportfolio);
				// get last portfolio insert id
				$insertid = mysql_insert_id();
				if(isset($insertid)){
					// count uploaded file
					$countUploaded = count($_FILES['file']['name']);

					for($i=0; $i < $countUploaded; $i++){
						$_FILES['userfile']['name'] = $_FILES['file']['name'][$i];
						$_FILES['userfile']['type'] = $_FILES['file']['type'][$i];
						$_FILES['userfile']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
						$_FILES['userfile']['error'] = $_FILES['file']['error'][$i];
						$_FILES['userfile']['size'] = $_FILES['file']['size'][$i];

						$config = array(
							'upload_path' => 'upload/portfolio/carousel/',
							'allowed_types' => 'jpg|jpeg|png',
							'max_size' => '1024',
							'encrypt_name' => true
							/*'max_width' => '1920',
							'max_height' => '1920'*/
						);
						$this->upload->initialize($config);

						if( !$this->upload->do_upload() ){
							$output = json_encode(
								array(
									'message' => 'error',
									'error' => $this->upload->display_errors()
								)
							);
						}else{
							$upload_data = $this->upload->data();
							// rename uploaded file
							$newname = rename(
								$upload_data['full_path'],
								$upload_data['file_path'].'/inerre_interior_'.$upload_data['file_name']
							);
							
							$newtitleinsert = 'inerre_interior_'.$upload_data['file_name'];
							// upload success, insert to portfolio_album table
							$this->modelportfolio->insertPortfolioCarousel($newtitleinsert, $idportfolio);

							$output = json_encode(
								array(
									'message' => 'success',
									'upload_data' => $this->upload->data()
								)
							);
						}
					}
				}
			}else{
				$output = json_encode(
						array(
							'error' => $this->upload->display_errors(),
							'tmp_name' => $file['tmp_name'][0],
							'tmp_name_length' => sizeof($file['tmp_name']),
							'tmp_name_isArray' => is_array($file['tmp_name'])
						)
				);
			}
		}
		die($output);
	}

	/*
	 * function sluggify
	 * create URI slug
	 */ 
	public function sluggify($url){
		# Prep string with some basic normalization
		$url = strtolower($url);
		$url = strip_tags($url);
		$url = stripslashes($url);
		$url = html_entity_decode($url);

		# Remove quotes (can't, etc.)
		$url = str_replace('\'', '', $url);

		# Replace non-alpha numeric with hyphens
		$match = '/[^a-z0-9]+/';
		$replace = '-';
		$url = preg_replace($match, $replace, $url);

		$url = trim($url, '-');

		return $url;
	}

	/*
	 * function portfolioupdatesubmit
	 */
	public function portfolioupdatesubmit()
	{
		// configuration form validation
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		if($this->form_validation->run() == FALSE){
			// form validation false
			$formerror = array(
				'title' => form_error('title'),
				'description' => form_error('description')
			);
			$output = json_encode(
							array(
								'type'=>'error', 
								'validation_errors' => validation_errors(),
								'formerror' => $formerror
								)
							);
			die($output);
		}else{
			$idportfolio = $this->input->post('idportfolio');
			$title = $this->input->post('title');
			$location = $this->input->post('location');
			$description = $this->input->post('description');
			$slugtitle = $this->sluggify($title);
			$this->modelportfolio->updatePortfolio($idportfolio, $title, $location, $description, $slugtitle);
			$output = json_encode(array('type'=> 'message', 'text' => ucwords($title).' telah diubah dan tersimpan'));
			die($output);
		}
	}

	/* 
	 * function portfoliodelete
	 */
	public function portfoliodelete($id)
	{
		$idportfolio = $id;
		$thisPortfolio = $this->modelportfolio->loadOnePortfolio($id);
		$portfolioalbum = $this->modelportfolio->loadPortfolioAlbum($id);
		if(isset($portfolioalbum)){
			foreach ($portfolioalbum as $pa) {
				if($pa->photo!="" || $pa->photo==NULL){
					if(file_exists('./upload/portfolio/' . $pa->photo)){
						$do = unlink('./upload/portfolio/' . $pa->photo);
					}
				}
			}
			$this->modelportfolio->deletePortfolio($id);
			$this->modelportfolio->deletePortfolioAlbum($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success">'. $thisPortfolio->portfolio_title .' telah berhasil dihapus!</div>');
			redirect('administrator/portfolio');
		}else{
			$this->modelportfolio->deletePortfolio($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success">'. $thisPortfolio->portfolio_title .' telah berhasil dihapus!</div>');
			redirect('administrator/portfolio');
		}
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
