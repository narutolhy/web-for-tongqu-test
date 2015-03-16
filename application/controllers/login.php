<?php

class Login extends CI_Controller {
	
	function index()
	{
		$data['main_content'] = 'login_form';
		$this->load->view('includes/template', $data);		
	}
	function validate_credentials()
	{		
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();
		
		
		if($query) 
		{
			$row = $this->membership_model->get_id($this->input->post('username'));
			$query = $row->usernr;
			$live = $row->if_delete;
			if($live){
			if(!$row->admin){
				$data = array(
				'username' => $this->input->post('username'),
				'id' => $query,
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);



			redirect('site/members_area');
		    
				
			}
			else{
				$data = array(
				'username' => $this->input->post('username'),
				'id' => $query,
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('admin/members_area');
		    }
		                }
		 else
		{
			$this->index();
		} 
		 }
		else
		{
			$this->index();
		}
	
	}
	function signup()
	{
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	} 

	function create_member()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->signup();
		}
		
		else
		{			
			$this->load->model('membership_model');
			
			if($query = $this->membership_model->create_member())
			{
				$data['main_content'] = 'signup_successful';
				$this->load->view('includes/template', $data);
			}
			else
			{
				$this->load->view('signup_form');			
			}
		}

		
	}
		function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}
	   function add_text()
	{
		$data['main_content'] = 'change';
		$this->load->view('includes/template',$data);

	}
}
?>