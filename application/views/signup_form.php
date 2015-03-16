
<h1>注册</h1>
<fieldset>
<legend>个人信息</legend>
<?php
   
echo form_open('login/create_member');

echo form_input('name', set_value('name', '名字'));
echo form_input('email_address', set_value('email_address', '邮箱'));
?>
</fieldset>

<fieldset>
<legend>注册信息</legend>
<?php
echo form_input('username', set_value('username', '账号名'));
echo form_input('password', set_value('password', '密码'));
echo form_input('password2', '密码确认');

echo form_submit('submit', '注册');
?>

<?php echo validation_errors('<p class="error">'); ?>
</fieldset>
