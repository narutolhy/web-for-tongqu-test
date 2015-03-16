<?php
/**
* author: cyy
* 20140510
*/
class Register extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$new_member_insert_data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'studentnumber' => $this->input->post('studentnumber'), 
            );

        $this->load->model('user/user_model');

        $result = $this->user_model->create_member($new_member_insert_data);

        if ($result['status']) {
            # create a member
            echo json_encode($result);
            return;
        }
        else{
            echo json_encode($result);
            return;
        }
	}

    function setAdministrator(){
        $new_administrator = array(
            'usertype' => $this->input->post('usertype'),
            'studentnumber' => $this->input->post('studentnumber')
            );
        $this->load->model('user/user_model');
        $query = $this->user_model->create_Administrator($new_administrator);

        if ($query) {
            echo json_encode(array(
                'status' => true,
                'response' => 'success'
                 )
            );
            return;
        }
        else{
            echo json_encode(array(
                'status' => false,
                 'response' => 'failed'
                 )
            );
            return;
        }
    }

    function delAdministrator(){
        $del_administrator = array(
            'usertype' => "0",
            'studentnumber' => $this->input->post('studentnumber')
            );
        $this->load->model('user/user_model');
        $query = $this->user_model->create_Administrator($del_administrator);

        if ($query) {
            echo json_encode(array(
                'status' => true,
                'response' => 'success'
                 )
            );
            return;
        }
        else{
            echo json_encode(array(
                'status' => false,
                 'response' => 'failed'
                 )
            );
            return;
        }
    }
}

?>