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

        $data = $this->db->query('SELECT name, last_name FROM user WHERE email = '.'\''.$email.'\''.' && password = '.'\''.$password.'\'');
        //return $this->db->get($this->table)->first_row();
        if ($data > 0) {
        	return $data;
        }else{
        	return null;
        }
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

