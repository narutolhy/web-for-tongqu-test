<?php

class User_model extends CI_Model {
function get_text()
	{
		$this->db->select('*');
		$this->db->from('todo_todos');       
		$this->db->where('created_by',$this->session->userdata('id'));
		$this->db->order_by('due_date');
		$query = $this->db->get();
		
		return $query;
	}
function get_user()
{
	$this->db->select('*');
	$this->db->from('todo_users');
	$this->db->where('if_delete',1);
	$query = $this->db->get();
	return $query;
}
function get_page($limit,$offset)
{
	    $this->db->select('*');
	    $this->db->from('todo_todos');       
		$this->db->where('created_by',$this->session->userdata('id'));
		$this->db->order_by('due_date');
		$this->db->limit($limit,$offset);
		$query = $this->db->get();
		return $query;
}
function get_user_page($limit,$offset)
{
	$this->db->select('*');
	$this->db->from('todo_users');
	$this->db->where('if_delete',1);
	$this->db->limit($limit,$offset);
	$query = $this->db->get();
	return $query;
}
}
?>	