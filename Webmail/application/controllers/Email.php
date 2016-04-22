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
      	$this->load->library('email');
      	$this->load->library('session');
        
    }

	public function index($state)
	{
     //$this->load->library('session');
     $username = $this->session->userdata('email');
       
      $this->load->Model('Email_Model', 'EmailM', 'default');
      //$username = "rtchacon@gmail.com";
      if($state==1||$state==2||$state==3)
      { 
        $envioArray= array();
        $envioArray['emails']=$this->EmailM->get_all_emails($state,$username);
        $envioArray['username']=$username;
        $envioArray['state']=$state;
        $this->load->view('email/index',$envioArray);
      }
      else
      {
        $emails = $this->EmailM->get_emailSelection();
        $envioArray= array('data' => $emails);
        $this->load->view('email/index',$envioArray);
        return;
      }
	}

    public function sendLinkUsuario()
      {
      $this->load->library('email');

      //$username = $session_id = $this->session->userdata('currentUser');
      $destinatario =$this->session->userdata('currentDestinatario');
      $id = $this->session->userdata('currentId');
      $token = $this->session->userdata('currentToken');

      $informacion="http://[::1]/WebRocsMail/Webmail/index.php/User/active/".$id."/".$token;

      $this->email->from("agiita2010@gmail.com", "CorreoRocks"); // correo sin espacio
      $this->email->to($destinatario); // correo sin espacio
      $this->email->subject("Activar usuario");
      $this->email->message($informacion);
      if($this->email->send())
      {
        redirect('email/index/1');
        return;
      }
      else
      {
      show_error($this->email->print_debugger());
      }
         redirect('../../Email/index/0/');
         return;
       }
//envia por el cronjob o tareas 
      public function enviar()
      {
      $this->load->Model('Email_Model', 'EmailM', 'default');

      $arrayEmails = $this->EmailM->get_all_email_pending(2);
if( !empty($arrayEmails) ) {
      foreach ($arrayEmails as $email) {

        $this->load->library('email','','correo');
        $this->correo->from($email['remitente'], $email['remitente']); // correo sin espacio
        $this->correo->to($email['destinatario']); // correo sin espacio
        $this->correo->subject($email['asunto']);
        $this->correo->message($email['cuerpo']);

        if($this->correo->send())
        {
          $this->EmailM->editarEstado($email['id'], 1);

        }
      }
    }
    else{ echo "muerase";}

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
            $data['estado'] = $this->input->post('state');;


            $id_email=$this->input->post('id');

            if ($this->form_validation->run() == true)
            {
                $this->load->Model('Email_Model', 'EmailM', 'default');
                if($id_email==0)
                {
                $id = $this->EmailM->create($data);

                $this->session->set_flashdata('message', "Creado con éxito.");  
                

                }
                else
                {
                $id = $this->EmailM->update($id_email,$data);

                $this->session->set_flashdata('message', "Actualizado con éxito.");
                }
                redirect('email/index/1' . $id, 'refresh');
                return;
            } 
            else 
            {
                $this->session->set_flashdata('dataP', $data);
                $this->session->set_flashdata('warning', validation_errors());
                redirect('email/index/2', 'refresh');
                return;
            }

    }

    function delete($id) {



            $EmailData = array();

            $this->load->Model('Email_Model', 'EmailM', 'default');


                $Email = $this->EmailM->get($id);
                $this->EmailM->delete($id);
                $this->session->set_flashdata('message', "Eliminado con éxito.");
                redirect('Email/index/1', 'refresh');
                return;

    }
      
}
?>