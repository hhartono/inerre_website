<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->database();
        $this->load->library('input');
        $this->load->helper(array('form','html','url'));
        $this->load->model('modelcontact');
    }

	public function index()
	{
		$data = array(
				'title' => '&mdash; Contact',
				'contactactive' => 'active'
			);
		$this->load->view('contact', $data);
	}

	/*
	 * function submitMessage
	 * submit message from contact form
	 */
	public function submitMessage()
	{
		$name = $this->input->post('userName');
		$email = $this->input->post('userEmail');
		$message = $this->input->post('userMessage');
		
		if($_POST)
		{
			/*
			$to_Email   	= "support@bestlooker.pro"; //Replace with recipient email address
			$subject        = 'Message from my website'; //Subject line for emails
			*/

			//check if its an ajax request, exit if not
		    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
			
				//exit script outputting json data
				$output = json_encode(
				array(
					'type'=>'error', 
					'text' => 'Request must come from Ajax'
				));
				
				die($output);
		    } 
			
			//check $_POST vars are set, exit if any missing
			//if(!isset($_POST["userName"]) || !isset($_POST["userEmail"]) || !isset($_POST["userMessage"]))
			if(!isset($name) || !isset($email) || !isset($message))
			{
				$output = json_encode(array('type'=>'error', 'text' => 'Input fields are empty!'));
				die($output);
			}

			//Sanitize input data using PHP filter_var().
			$user_Name        = filter_var($name, FILTER_SANITIZE_STRING);
			$user_Email       = filter_var($email, FILTER_SANITIZE_EMAIL);
			$user_Message     = filter_var($message, FILTER_SANITIZE_STRING);
			
			$user_Message = str_replace("\&#39;", "'", $user_Message);
			$user_Message = str_replace("&#39;", "'", $user_Message);
			
			//additional php validation
			if(strlen($user_Name)<4) // If length is less than 4 it will throw an HTTP error.
			{
				$output = json_encode(array('type'=>'error', 'text' => 'Name is too short or empty!'));
				die($output);
			}
			if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) //email validation
			{
				$output = json_encode(array('type'=>'error', 'text' => 'Please enter a valid email!'));
				die($output);
			}
			if(strlen($user_Message)<5) //check emtpy message
			{
				$output = json_encode(array('type'=>'error', 'text' => 'Too short message! Please enter something.'));
				die($output);
			}
			
			if((strlen($user_Name)>=4) && (filter_var($user_Email, FILTER_VALIDATE_EMAIL)) && (strlen($user_Message)>=5)){
				$insertToDB = $this->modelcontact->insertContact($name, $email, $message);
				$output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_Name .'! Thank you for your email'));
				die($output);
			}
			
			/*
			//proceed with PHP email.
			$headers = 'From: '.$user_Email.'' . "\r\n" .
			'Reply-To: '.$user_Email.'' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			
			$sentMail = @mail($to_Email, $subject, $user_Message . "\r\n\n"  .'-- '.$user_Name. "\r\n" .'-- '.$user_Email, $headers);
			
			if(!$sentMail)
			{
				$output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
				die($output);
			}else{
				$output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_Name .'! Thank you for your email'));
				die($output);
			}
			*/
		}
	}
}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */