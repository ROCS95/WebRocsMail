<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('rocsmail/index');
	}

	public function __construct() {
        parent::__construct();
    }

	public function authenticate()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		
		// load the model and call the authenticate method
		$this->load->model('User_model');
		$result = $this->Session_model->user_authenticate($username, $password);
		// return 
		if ($result && sizeof($result) > 0 ) {
			//redirect a dashboard
			header('Content-Type: application/json');
    		echo json_encode( $result );
		} else {
			//cargar login con error
			header('Content-Type: application/json');
    		echo json_encode( array('status' => 'invalid', 'message' => 'User is invalid') );
		}
	}

	public function registroDatos()
	{	

		$name = $this->input->post('name', TRUE);
 		$lastname = $this->input->post('lastname', TRUE);
 		$username = $this->input->post('username', TRUE);
 		$email = $this->input->post('email', TRUE);
 		$password = $this->input->post('password', TRUE);
 		$rpassword = $this->input->post('rep-password',TRUE);
		 	$insert = $this->User_model-> new_user($name." ".$lastname, $username, $email, $password);
            $this->load->view('rocsmail/confirmar_registro');
        
 		
	}
}