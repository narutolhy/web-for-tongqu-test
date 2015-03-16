<?php
   class Text extends CI_controller
   {
      function __construct()
   {
      parent::__construct();
      
   }
   	 function remove($id)
   	 {
   	 	$this->db->where('todo_id',$id);
         $this->db->delete('todo_todos');
         redirect('site/members_area');
         
   	 }

   	 function add_text()
   	 {
         $this->load->library('form_validation');
         $this->form_validation->set_rules('due_data','Due Data','trim|required');
         $this->form_validation->set_rules('todo_text','Todo Text','trim|required');
         if($this->form_validation->run()==FALSE)
         {
   	 	$data = array(
			'due_date' => $this->input->post('due_date'),
			'todo_text' => $this->input->post('todo_text'),
         'created_by'=> $this->session->userdata('id')  					
		   );


         $this->db->insert('todo_todos',$data);
         redirect('site/members_area');
         }
         else
         {
            redirect('site/members_area');
         }

   	 }
       function change($due_date,$todo_text,$id)
       {
         $data['main_content'] = 'change';
         $data['due_date']=$due_date;
         $data['todo_text'] = $todo_text;
         $data['id'] = $id;
         $this->load->view('includes/template', $data);  
    
         
       }
       function alter($id)
       {
         $data = array(
            'due_date' => $this->input->post('due_date'),
            'todo_text'=> $this->input->post('todo_text')
            );
         $this->db->where('todo_id',$id);
         $this->db->update('todo_todos',$data);
         redirect('site/members_area');
       }
       
      

       

   }
   ?>