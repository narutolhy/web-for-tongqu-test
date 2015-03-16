<div id="login_form">
	<h1>登陆</h1>
	<?php

	echo form_open('login/validate_credentials');
	echo form_input('username','账号');
	echo form_password('password',"密码");
	echo form_submit('submit','登陆');
	echo anchor('login/signup','注册');


	?>

</div>