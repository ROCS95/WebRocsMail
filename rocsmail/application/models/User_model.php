<?php 

class User_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function user_authenticate($username, $password)
    {
        $query = $this->db->get_where('users', 
            array('username' => $username, 'password' => md5($password)));
        return $query->result _array();
    }

    function new_user($name, $username, $correo, $password)
    {
        $data= array(
            'name' => $name,
            'users-name' => $username,
            'mail' => $correo,
            'password' => md5($password));
        return $this->db->insert('users',$data);
    }
}