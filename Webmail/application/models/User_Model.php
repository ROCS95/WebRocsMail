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

        $query=$this->db->select('email')
                        ->where('email',$email)
                        ->where('password',$password)
                        ->where('state',1)
                        ->get('user');
      
        if($query->num_rows()>0)
        {
          return $query;
       }
       else
        { return 'NO';}
    }
    

    function active($id,$token)
    {
      $data = array(
               'state' => 1
            );

      $this->db->where('id', $id);
      $this->db->where('token', $token);
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

     function search($id,$token)
    {
      //$this->load->helper('security');
      //$password = do_hash($password);
      $this->db->select('email');
      $this->db->where('id', $id);
        $this->db->where('token', $token);

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

