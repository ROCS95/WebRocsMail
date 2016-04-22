<?php if(! defined('BASEPATH')) exit ('No direct script access allowed');

class Email_Model extends CI_Model
{
  private $table="email";
  

  public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
	
	function get_all_emails($state,$username)
    {
      $this->db->select('*');
      $this->db->where('remitente', $username);
      $this->db->where('estado', $state);

      $query = $this->db->get($this->table);

        if ($query->num_rows() > 0)
        {
            $result = array();

            foreach($query->result_array() as $row)
            {

              array_push($result, $row);
            }
            return $result;
          }

       return NULL;
    }

    function get_all_email_pending($state)
    {
      $this->db->select('*');
      $this->db->where('estado', $state);

      $query = $this->db->get($this->table);

        if ($query->num_rows() > 0)
        {
            $result = array();

            foreach($query->result_array() as $row)
            {

              array_push($result, $row);
            }
            return $result;
          }

       return NULL;
    }

//trae solo los emails q se solicitan ya sean pendientes o enviados
    function get_emailSelection()
    {
      $this->db->select('*');
      $username = $session_id = $this->session->userdata('currentUser');
      $this->db->where('remitente', $username);

      $query = $this->db->get($this->table);

      if ($query->num_rows() > 0)
      {
          $result = array();

          foreach($query->result_array() as $row)
          {

            array_push($result, $row);
          }
          return $result;
        }

     return NULL;
     }

	function get($id) {

        $this->db->where('id', $id);
        return $this->db->get($this->table)->first_row();
    }

  function editarEstado($id, $estado)
        {
          $data = array
          (
          'estado' => $estado
         );

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

        }

	function create($data)
	{
		$this->db->insert($this->table,$data);
		return;
	}

	function delete($id)
	{
    $this->db->delete($this->table,array('id'=>$id));
	}

	function update($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data); 
	}

}
?>

