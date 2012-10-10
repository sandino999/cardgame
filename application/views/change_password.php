<?php defined('SYSPATH') or die('No direct script access.');

?>
<html>
	<head>
		<title>
			Change Password
		</title>
		<link href="http://localhost<?php echo url::base(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div style="position:relative; top:200;height:0px;left:700"> 
			<div class="container-fluid">  	
			  <div class="row-fluid"> .
				  <div class="span3">  
				    <div class="well sidebar-nav"> 
						<h1> Change Password </h1>
<?php
	echo '<font color =red>'.$message.'</font><br/>';
	echo form::open('accounts/validate_password/'.$id,array('method'=>'post'));
	echo form::hidden('id',$id);
	echo 'Password: <br/> '.form::password('password').'<br/>';
	echo 'Confirm Password: <br/> '.form::password('confirmpassword').'<br/>';
	?><input type='submit' value='Change Password' name='btnchange' class='btn btn-primary' ><?php
	echo form::close();

?>				</div>
			</div>
		</div> 
	</body>
</html>

<?php



