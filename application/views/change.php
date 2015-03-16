<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>change</title>
</head>
<body>
	<h2> 修改!</h2>
     
    <p><?php
           echo form_open('text/alter/'.$id);
           echo form_input('due_date',$due_date);
           echo '<br>';
           $text = str_replace("%20"," ",$todo_text);
           $text = str_replace("%3Cbr%3E","\n",$text);
	       echo form_textarea('todo_text',$text);
	       echo '<br>';
	       echo form_submit('submit', '修改');

     ?></p>
	
</body>
</html>	