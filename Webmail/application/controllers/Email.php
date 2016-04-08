<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {

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
		$this->load->Model('Email_Model', 'EmailM', 'default');
		$emails = $this->EmailM->get_send();
		$emailArray = array('data' => $emails);
		$emailArray['message'] = $this->session->flashdata('message');
		$this->load->view('email/index',$emailArray);
	}

	function save() {

            $this->form_validation->set_rules('id', 'id', 'max_length[20]');
            $this->form_validation->set_rules('remitente', 'Remitente', 'required|max_length[150]');
            $this->form_validation->set_rules('destinatario', 'Destinatario', 'required|max_length[150]');
            $this->form_validation->set_rules('asunto', 'Asunto', 'required');
            $this->form_validation->set_rules('cuerpo', 'Cuerpo', 'max_length[150]');


 
            $data = array();
            $data['id'] = $this->input->post('id');
            $data['remitente'] = $this->input->post('remitente');
            $data['destinatario'] = $this->input->post('destinatario');
            $data['asunto'] = $this->input->post('asunto');
            $data['cuerpo'] = $this->input->post('cuerpo');
            $data['tipo'] = $this->input->post(1);



            $id_email=$this->input->post('id');

            if ($this->form_validation->run() == true)
            {
                $this->load->Model('Email_Model', 'EmailM', 'default');
                if($id_email==="")
                {
                $id = $this->EmailM->create($data);

                $this->session->set_flashdata('message', "Creado con éxito.");  
                }
                else
                {
                $id = $this->EmailM->update($id_email,$data);

                $this->session->set_flashdata('message', "Actualizado con éxito.");
                }
                redirect('email/index/' . $id, 'refresh');
                return;
            } 
            else 
            {
                $this->session->set_flashdata('dataP', $data);
                $this->session->set_flashdata('warning', validation_errors());
                redirect('email/index/', 'refresh');
                return;
            }

    }

    function delete($id) {



            $EmailData = array();

            $this->load->Model('Email_Model', 'EmailM', 'default');


                $Email = $this->EmailM->get($id);
                $this->EmailM->delete($id);
                $this->session->set_flashdata('message', "Eliminado con éxito.");
                redirect('Email/index/', 'refresh');
                return;

    }

}
?>