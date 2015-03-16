<?php
/**
* author: cyy
* 20140510
*/
class Profile extends CI_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('user/user_model');
        $this->load->library('user');
        
        if (!$this->user->is_login()){
            echo json_encode (array('response' => "have not login"));
            exit;
        }else{
            $this->user_info = $this->user->get_user_info();
        }
        $this->load->model('record/record_model');
    }

    // 用户资料etc
    public function index()
    {
        $uid = $this->user_info['uid'];
        //简单粗暴的测试方法
        //$uid = 3;
        $user_info = $this->user_model->get_user_info($uid);
        $user_record = $this->record_model->get_record_by_uid($uid);
        echo json_encode(array(
            'user_info' =>$user_info,
            'user_record' => $user_record));
    }

    //管理员获取用户基本信息
    public function getUserInfoByAdmin()
    {
        $user_type = $this->user_info['usertype'];
        if($user_type == 0)//如果是普通用户则不能看
        {
            return false;
        }
        $uid = $this->input->get('uid');
        $user_info = $this->user_model->get_user_info($uid);
        echo json_encode($user_info);

    }

    public function changeinfo()
    {
        $uid = $this->user_info['uid'];
    	$new_userdata = array(
            'email' => $this->input->post('email'),
            'phonenumber' => $this->input->post('phonenumber'),
            'real_name'=> $this->input->post('real_name'),
            'username' => $this->input->post('username'),
            'uid' => $uid
            );

        if($query = $this->user_model->change_userdata($new_userdata)){
            echo json_encode(array(
                'status' => true,
                 'response' => 'success'
                 )
            );
        }
        else{
            echo json_encode(array(
                'status' => false,
                 'response' => 'failed'
                 )
            );

        }

    }

    public function changepw()
    {
        $uid = $this->user_info['uid'];
        $new_password = array(
            'password' => md5($this->input->post('password')),
            'uid' => $uid
            );

        if($query = $this->user_model->change_password($new_password)){
            echo json_encode(array(
                'status' => true,
                 'response' => 'success'
                 )
            );
        }
        else{
            echo json_encode(array(
                'status' => false,
                 'response' => 'failed'
                 )
            );

        }
    }
}
?>