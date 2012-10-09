

<html>
	<head>
		<title>
			My Card List
		</title>
		<link href="<?php echo url::base(); ?>bootstrap/css/bootstrap.css" rel="stylesheet">		
	</head>
	
	<body>
		<div style='position:relative; top:200;height:0px;left:700'> 
		<h1> MyCardList Login </h1>
		
<?php
		echo '<font color =red>'.$message.'</font>';
		echo form::open('accounts/login',array('method'=>'post'));
		echo 'Username: '.form::input('txtuser').'<br/>';
		echo 'Password: '.form::password('txtpass').'<br/>';
		echo form::submit('btnlogin','Login');
	
		echo form::close();
	
		echo "<div style='position:relative; top:-46;height:0px;left:55'>";
		echo form::open('accounts/register',array('method'=>'post'));
		echo form::submit('btnregister','Register');
		echo form::close();
		echo '</div>';
		
		echo "<div style='position:relative; top:-15;height:0px;left:0'>";
		echo html::anchor('index.php/accounts/forgot_password','Forgot password?');
		echo '</div>';
		
		
?>		
	
		</div>	

		
	</body>
</html>








