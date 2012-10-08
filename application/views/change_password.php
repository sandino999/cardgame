<?php defined('SYSPATH') or die('No direct script access.');

?>
<html>
	<body>
		<h1> Change Password </h1>
<?php

	echo form::open('accounts/validate_password/'.$id,array('method'=>'post'));
	echo form::hidden('id',$id);
	echo 'Password: <br/> '.form::password('password').'<br/>';
	echo 'Confirm Password: <br/> '.form::password('confirmpassword').'<br/>';
	echo form::submit('btnchange','Change password');
	echo form::close();

?>
	</body>
</html>

<?php



