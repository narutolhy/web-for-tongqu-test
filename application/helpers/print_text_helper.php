<?php


    	$this->db->select('*');
		$this->db->from('todo_todos');       
		$this->db->where('created_by',$this->session->userdata('id'));
		$query = $this->db->get();
		
        foreach($query->result() as $row)
		{
			echo $row->due_date;
			echo anchor('login/logout', '删除').'<br>';
			echo $row->todo_text.'<br>';
		}


?>