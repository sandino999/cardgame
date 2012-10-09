<?php defined('SYSPATH') or die('No direct script access.');

?>
<html>
	<head>
		<title>
			Forgot Password
		</title>
			<link href="<?php echo url::base(); ?>bootstrap/css/bootstrap.css" rel="stylesheet">
		</head>
	</body>
<?php
echo '	
		<div style="position:relative; top:200;height:0px;left:700"> 
		<h1> Forgot Password? </h1>';
			
			echo '<font color =red>'.$message.'</font>';
			
			echo form::open('accounts/secret_question',array('method'=>'post'));
			echo 'Enter email <br/> '.form::input('txtemail');
			echo "<div style='position:relative; top:-33;height:0px;left:210'>";
			echo form::submit('btnrecover','Submit');
			echo '</div>';
			echo form::close();
			
			echo "<div style='position:relative; top:-53;height:0px;left:270'>";
			echo form::open('mycardlist',array('method'=>'post'));
			echo form::submit('btnback','Back');
			echo form::close();
			echo '</div>
		</div>';
		
?>
	</body>
</html>	

<?php




