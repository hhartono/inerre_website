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
			//'loadAllMessage' => $this->modelmessagecenter->loadAllMessage()
			);
		$this->load->view('administrator/messagecenter', $data);
	}

	public function loadAllMessage()
	{
		$loadAll = $this->modelmessagecenter->loadMessageAll();
		if(isset($loadAll)){
			echo '<table class="table">
					<tr>
						<th>No</th>
						<th colspan="2">Message(s)</th>
					</tr>';
					$no = 1;
					foreach($loadAll as $lam){
			echo '<tbody>';
			echo '<tr>';
			echo '<td>'. $no .'</td>';
			echo '<td>From : '. $lam->name .'</td>';
			if($lam->status=="replied"){
				$label = "info";
			}else{
				$label = "warning";
			}
			echo '<td><span class="label label-'.$label.'">'. ucwords($lam->status ). '</span></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td></td>';
			echo '<td>Email: '. $lam->email .'</td>';
			echo '<td>'. $lam->date_in .'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td></td>';
			echo '<td>Message : '. $lam->message.'</td>';
			echo '<td><a href="">Delete</a> | <a href="">Reply</a></td>';
			echo '</tr>';
			echo '</tbody>';
						$no++;
					}
			echo '</table>';
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
			echo '<table class="table">
					<tr>
						<th>No</th>
						<th colspan="2">Message(s)</th>
					</tr>';
					$no = 1;
					foreach($loadUnreplied as $lam){
			echo '<tbody>';
			echo '<tr>';
			echo '<td>'. $no .'</td>';
			echo '<td>From : '. $lam->name .'</td>';
			echo '<td><span class="label label-warning">'. ucwords($lam->status ) . '</span></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td></td>';
			echo '<td>Email: '. $lam->email .'</td>';
			echo '<td>'. $lam->date_in .'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td></td>';
			echo '<td>Message : '. $lam->message.'</td>';
			echo '<td><a href="">Delete</a> | <a href="">Reply</a></td>';
			echo '</tr>';
			echo '</tbody>';
						$no++;
					}
			echo '</table>';
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
			echo '<table class="table">
					<tr>
						<th>No</th>
						<th colspan="2">Message(s)</th>
					</tr>';
					$no = 1;
					foreach($loadReplied as $lam){
			echo '<tbody>';
			echo '<tr>';
			echo '<td>'. $no .'</td>';
			echo '<td>From : '. $lam->name .'</td>';
			echo '<td><span class="label label-info">'. ucwords($lam->status) . '</span></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td></td>';
			echo '<td>Email: '. $lam->email .'</td>';
			echo '<td>'. $lam->date_in .'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td></td>';
			echo '<td>Message : '. $lam->message.'</td>';
			echo '<td><a href="">Delete</a> | <a href="">Reply</a></td>';
			echo '</tr>';
			echo '</tbody>';
						$no++;
					}
			echo '</table>';
		}else{
			echo "nothing";
		}
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */