<?php if(! defined('BASEPATH')) exit ('No direct script access allowed');

class User_Model extends CI_Model
{
  private $table="user";
  

  public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
	
	function get_all()
	{
		$this->db->select('*');
		$query= $this->db->get($this->table);
			if($query->num_rows()>0)
			{
				$result=array();
				foreach($query->result_array() as $row)
				{
					array_push($result, $row);
				}
			return $result;
			}
		return NULL;
	}



	function autentificar($email, $password) {

        $data = $this->db->query('SELECT name, last_name FROM user WHERE email = '.'\''.$email.'\''.' AND password = '.'\''.$password.'\'');
        //$this->db->select('name');
        //$this->db->select(last_name);
        //$this->db->WHERE('email' , $email);
        //$this->db->WHERE('password' , $password);
        //$query = $this->db->get($this->table);
        if ($data != null/*$query->num_rows() === 1*/) {
        	return $data /*$query*/;
        }else{
        	return null;
        }
    }

    function active($id)
    {
      $data = array(
               'state' => 1
            );

      $this->db->where('id', $id);
      $query=$this->db->update($this->table, $data);
       if ($this->db->affected_rows() > 0)
      {
       return "Yes";
      }

      else
      {
          return "No";
      }
    }

     function search($id)
    {
      //$this->load->helper('security');
      //$password = do_hash($password);
      $this->db->select('username');
      $this->db->where('id', $id);

      $query = $this->db->get($this->table);
      return $query->username;
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

