<?php defined('SYSPATH') or die('No direct script access.');

?>
<html>
	</body>
<?php
echo '	<h1> Forgot Password? </h1>';

			echo form::open('accounts/secret_question',array('method'=>'post'));
			echo 'Enter email '.form::input('txtemail');
			echo form::submit('btnrecover','Submit');
			echo form::button('btnback',html::anchor('/index.php/mycardlist','back'));

?>
	</body>
</html>	

<?php




