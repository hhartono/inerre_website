<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('email', 'url'));
		$this->load->library(array('email', 'tank_auth'));
		$this->is_logged_in();
		$this->load->model(array('modelmessagecenter'));
		
	}

	public function index()
	{	
		/*$data = array(
			'title' => 'Inerre Interior - Administrator Main',
		);
		$this->load->view('administrator/administrator', $data);*/
		redirect('administrator/messagecenter/');	
	}

	/*
	 * check if user is logged in
	 */
	public function is_logged_in(){
		if(!$this->tank_auth->is_logged_in()){
			redirect('/auth/login');
		}
	}

	public function messagecenter()
	{	
		$data = array(
			'title' => 'INERRE Interior - Administrator / Message Center',
			//'loadmessage' => $this->modelmessagecenter->loadMessageAll()
			'username' => $this->tank_auth->get_username()
		);
		$this->load->view('administrator/messagecenter', $data);
	}

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
			echo '<td>'. ($row->status == 'unreplied' ? '<button type="button" data-name="'.$row->name.'" data-email="'.$row->email.'" class="btn btn-danger" data-toggle="modal" data-target="#replyModal"><i class="fa fa-mail-reply"></i></button>' : '<button class="btn btn-success" disabled><i class="fa fa-check"></i></button>' ) .'</td>';
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
			echo '<td><button type="button" data-name="'.$row->name.'" data-email="'.$row->email.'" class="btn btn-danger" data-toggle="modal" data-target="#replyModal" >';
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

		$this->email->from('willi@inerre.com', 'Willi');
		$this->email->to('willi.ilmukomputer@gmail.com');
		//$this->email->cc('');
		//$this->email->bcc('');
		$this->email->subject('[subject] testing email from inerre website, sakali deui da si nunu teu percanten');
		$this->email->message('[message] testing email from inerre website');
		$this->email->send();
		//if(! $this->email->send()){
		//	echo 'email not send';
		//}else{
		echo $this->email->print_debugger();	
		//}
	}

	/*function tosha1(){
		echo sha1('INERREInteriorBandung');
	}*/

}

/* End of file administrator.php */
/* Location: ./application/controllers/administrator.php */
