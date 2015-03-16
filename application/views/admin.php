<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>admin</title>
</head>
<body>
	<h2>欢迎回来, <?php echo $this->session->userdata('username'); ?>!</h2>
     <p><?php
         foreach($query->result() as $row)
		{
			$data = $row->usernr;
			echo $row->username;
            echo anchor('admin/remove/'.$data,'删除').'<br>';
			
		}
		echo $pagination;
       ?></p>

   
	<h4><?php echo anchor('login/logout', '退出'); ?></h4>
</body>
</html>	