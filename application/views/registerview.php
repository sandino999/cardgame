<?php defined('SYSPATH') or die('No direct script access.');

?><html>
		<body>
<?php

		echo "	<h1> Fill in the necessary fields </h1>";

		echo form::open('accounts/confirm',array('method'=>'post'));
		echo 'First Name '.form::input('txtfname').'<br/>';
		echo 'Middle Name '.form::input('txtmname').'<br/>';
		echo 'Last Name '.form::input('txtlname').'<br/>';
		echo 'username '.form::input('txtuser').'<br/>';
		echo 'password '.form::password('txtpass').'<br/>';
		echo 'retype password'.form::password('txtretype').'<br/>';
		echo 'secret question'.form::select('secret_question',array('','What is your pet\'s name',
															'What was your childhood nickname?',
															'What is your oldest cousin\'s first and last name?',
															'In what city or town was your first job?',
															'What is the name of a college you applied to but didn\'t attend?',
															'Who was your childhood hero?',
															'What was your favorite sport in high school?',
															'What is your spouse\'s mother\'s maiden name?'
																)).'<br/>';
		echo 'answer'.form::input('txtans').'<br/>';
		echo 'Contact No '.form::input('txtcontact').'<br/>';
		echo 'Address '.form::input('txtaddr').'<br/>';
		echo 'Email Address '.form::input('txtemail').'<br/>';
		echo form::submit('btnregistertodatabase','Register');
		echo form::close();

		echo "<div style='position:relative; top:-42;left:75'>";
		echo form::open('mycardlist',array('method'=>'post'));
		echo form::submit('btnback','Back');
		echo form::close();
		echo '</div>';

?>
	</body>
</html>
<?php	

