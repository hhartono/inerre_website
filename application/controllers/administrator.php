<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
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
		
		//$tgl = $this->input->post('tgl');	
		
		$loadAll = $this->modelmessagecenter->loadMessageAll();
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
			echo "nothing";
		}
	}

	public function loadUnrepliedMessage()
	{
		$status = 'unreplied';
		$loadUnreplied = $this->modelmessagecenter->loadMessageWithStatus($status);
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
			echo "nothing";
		}

	}

	public function loadRepliedMessage()
	{
		$status = 'replied';
		$loadReplied = $this->modelmessagecenter->loadMessageWithStatus($status);
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
			echo "nothing";
		}
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */