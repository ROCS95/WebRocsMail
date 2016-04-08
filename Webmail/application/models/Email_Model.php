<?php if(! defined('BASEPATH')) exit ('No direct script access allowed');

class Email_Model extends CI_Model
{
  private $table="email";
  

  public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
	
	function get_send()
	{
		$tipo = 1;
		$this->db->where('estado', $tipo);
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
		return null;
	}

	function get($id) {

        $this->db->where('id', $id);
        return $this->db->get($this->table)->first_row();
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

