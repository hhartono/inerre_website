<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('email');
		$this->load->library('email');
		$this->load->model(array('modelmessagecenter'));
	}

	public function index()
	{	
		$data = array(
				'title' => 'Inerre Interior - Administrator Main',
			);
		$this->load->view('administrator/administrator', $data);
	}

	public function messagecenter()
	{	
		$data = array(
				'title' => 'Inerre Interior - Administrator / Message Center'
				//'loadmessage' => $this->modelmessagecenter->loadMessageAll()
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
				</thead>
				<tbody>
				</tbody>
				</table>';
		}
	}
	
	// public function sendingMail()
	// {
	// 	$config = array(
	// 	 	'protocol' => 'sendmail',
	// 	 	'mailpath' => '/usr/sbin/sendmail',
	// 	 	'charset' => 'iso-8859-1',
	// 	 	'wordwrap' => TRUE
	// 	);
	// 	$this->email->initialize($config);  

	// 	$this->email->from('willi.ilmukomputer@gmail.com', 'Willi');
	// 	$this->email->to('willi@inerre.com');
	// 	//$this->email->cc('');
	// 	//$this->email->bcc('');
	// 	$this->email->subject('[subject] testing email from inerre website');
	// 	$this->email->message('[message] testing email from inerre website');
	// 	$this->email->send();
	// 	if(! $this->email->send()){
	// 		echo 'email not send';
	// 	}else{
	// 		echo $this->email->print_debugger();	
	// 	}
	// }

}

/* End of file administrator.php */
/* Location: ./application/controllers/administrator.php */