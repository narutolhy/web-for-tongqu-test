<?php

class Membership_model extends CI_Model {

    function validate()
	{
		
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('todo_users');
		
		if($query->num_rows == 1)
		{
			return true;
		}
		
	}
	function create_member()
	{
		
		$new_member_insert_data = array(
			'name' => $this->input->post('name'),
			'email_address' => $this->input->post('email_address'),			
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))						
		);
		
		$insert = $this->db->insert('todo_users', $new_member_insert_data);
		return $insert;
	}
	function get_id($username)
	{
		$this->db->select('*');
		$this->db->from('todo_users');       
		$this->db->where('username',$username);
		$query = $this->db->get();
		$row = $query->row();


		return $row;

	}
	
}
?>