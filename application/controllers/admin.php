<?php

class Admin extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}

	function members_area($offset='')
	{
		$limit=10;

		$this->load->model('user_model');
		$query = $this->user_model->get_user();
		$paginate = $this->page($query->num_rows,$limit);
		$data['pagination'] = $paginate;
		$data['query']=$this->user_model->get_user_page($limit,$offset);
		$this->load->view('admin',$data);
	}
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo '请先登录 <a href="../login">登陆</a>';	
			die();		
		}		
	}
	function remove($id)
	{
		$data['if_delete'] = 0;
   	 	$this->db->where('usernr',$id);
        $this->db->update('todo_users',$data);        
         redirect('admin/members_area');
         
   	 
	}
	function page($num_row,$limit)
       {
         $this->load->library('pagination');
         $config['base_url'] = site_url('admin/members_area/');
         $config['total_rows'] = $num_row;
         $config['per_page'] = $limit;
         $config['first_link'] ='首页';
         $config['last_link'] ='尾页';
         $config['num_links'] = 1;
         $this->pagination->initialize($config);
         $page_link = $this->pagination->create_links();
         return $page_link;
       }
	


}
?>
