<?php defined('SYSPATH') or die('No direct script access.');

?>
<html>
	<body>
		<h1> MyCardList Login </h1>
<?php
		
	echo form::open('accounts/login',array('method'=>'post'));
	echo 'Username: '.form::input('txtuser').'<br/>';
	echo 'Password: '.form::password('txtpass').'<br/>';
	echo form::submit('btnlogin','Login');
	echo form::close();

	echo "<div style='position:relative; top:-42;height:0px;left:50'>";
	echo form::open('accounts/register',array('method'=>'post'));
	echo form::submit('btnregister','Register');
	echo form::close();
	echo '</div>';
	
	echo html::anchor('index.php/accounts/forgot_password','Forgot password?');

?>
	</body>
</html>

<?php



