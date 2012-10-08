<?php defined('SYSPATH') or die('No direct script access.');

?>
<html>
	<body>

<?php

		echo '<h1> Confirm Secret Question </h1>';

		foreach($secret as $row)
		{
		echo $row['question_name'];
		$email = $row['email'];
		}

		echo form::open('accounts/confirm_secret_question',array('method'=>'post'));
		echo form::input('txtsecret');
		echo form::submit('btnsecret','Submit');
		echo form::hidden('email',$email);
		echo form::button('btnback',html::anchor('index.php/mycardlist','back'));

?>
	</body>
</html>
<?php




