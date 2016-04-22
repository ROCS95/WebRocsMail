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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
        parent::__construct();
        $this->load->database();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
      	//$this->load->library('security');
      	$this->load->library('session');
        
    }

	public function index()
	{
		$this->load->Model('User_Model', 'UserM', 'default');
		$users = $this->UserM->get_all();
		$userArray = array('data' => $users);
		$userArray['message'] = $this->session->flashdata('message');
		$this->load->view('user/index',$userArray);
	}
    
    public function active($id,$token)
    {
     $this->load->Model('User_Model', 'UserM', 'default');
     $answer=$this->UserM->active($id,$token);
     $username=$this->UserM->search($id,$token);
     if($answer=="Yes")
     {
      redirect('User/index');
     }
     

    }

	function save() {

            $this->form_validation->set_rules('id', 'id', 'max_length[20]');
            $this->form_validation->set_rules('name', 'Nombre', 'required|max_length[150]');
            $this->form_validation->set_rules('last_name', 'Apellidos', 'required|max_length[150]');
            $this->form_validation->set_rules('mail', 'Email', 'required');
            $this->form_validation->set_rules('omail', 'Otro Email', 'max_length[150]');
            $this->form_validation->set_rules('pass', 'Contraseña', 'required|max_length[20]');

 
            $data = array();
            $data['id'] = $this->input->post('id');
            $data['name'] = $this->input->post('name');
            $data['last_name'] = $this->input->post('last_name');
            $data['email'] = $this->input->post('mail');
            $data['other_email'] = $this->input->post('omail');
            $data['password'] = md5($this->input->post('pass'));
            $data['token']= bin2hex(openssl_random_pseudo_bytes(16));


            $id_user=$this->input->post('id');

            if ($this->form_validation->run() == true)
            {
                $this->load->Model('User_Model', 'UserM', 'default');
                if($id_user==="")
                {
                $id = $this->UserM->create($data);

                $this->session->set_flashdata('message', "Creado con éxito.");

                $this->session->set_userdata('currentDestinatario', $data['other_email']);
                $this->session->set_userdata('currentUser', $data['email']);
                $this->session->set_userdata('currentId', $id);
                $this->session->set_userdata('currentToken', $data['token']);
                redirect('email/sendLinkUsuario/');
                }
                else
                {
                $id = $this->UserM->update($id_user,$data);

                $this->session->set_flashdata('message', "Actualizado con éxito.");
                }
                redirect('user/index/' . $id, 'refresh');
                return;
            } 
            else 
            {
                $this->session->set_flashdata('dataP', $data);
                $this->session->set_flashdata('warning', validation_errors());
                redirect('user/index/', 'refresh');
                return;
            }
        
    }


    function login(){

        $this->form_validation->set_rules('email', 'email', 'required|max_length[200]');
        $this->form_validation->set_rules('password', 'password', 'required|max_length[200]');

            $mail = $this->input->post('email');
            $pass= md5($this->input->post('password'));

            $this->load->Model('User_Model', 'UserM', 'default');

            $user = $this->UserM->autentificar($mail, $pass);
            if ($user =='NO') {
               redirect('User/index/', 'refresh');
            }else{
               $this->session->set_userdata('email', $mail);
                redirect('Email/index/1', 'refresh');
               
                
            }

    }

    function logout(){
        $username =$this->session->userdata('currentUser');
        $this->session->unset_userdata($username);
     redirect('User/index');
    }

}
?>