<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>todolist</title>
</head>
<body>
	<h2>欢迎回来, <?php echo $this->session->userdata('username'); ?>!</h2>
     <p><?php

         
         foreach($query->result() as $row)
		{
			
			echo $row->due_date;
			$data=$row->todo_id;
			$segments = array(
				'text',
				'change',
				'due_date' => $row->due_date,
				'todo_text'=> $row->todo_text,
				'id' => $row->todo_id
				);
			//echo anchor('text/change/'.$data,'修改');
            echo anchor(site_url($segments),'编辑');
			echo anchor('text/remove/'.$data,'删除').'<br>';
			echo $row->todo_text.'<br>';
			
		}
		echo $pagination;
       ?></p>

    <p><?php

           echo form_open('text/add_text');
           echo form_input('due_date','2014-01-01');
           echo '<br>';
	       echo form_textarea('todo_text',"text");
	       echo '<br>';
	       echo form_submit('submit', '添加');
    ?></p>
	<h4><?php echo anchor('login/logout', '退出'); ?></h4>
</body>
</html>	