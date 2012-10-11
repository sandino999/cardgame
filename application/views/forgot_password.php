<?php defined('SYSPATH') or die('No direct script access.');
include('header.php');
?>
<html>
	<head>
		<title>
			Forgot Password
		</title>
			<link href="<?php echo url::base(); ?>bootstrap/css/bootstrap.css" rel="stylesheet">
		</head>
	</body>
		<div style="position:relative; top:200;height:0px;left:700"> 
			<div class="container-fluid">  	
			  <div class="row-fluid"> .
				  <div class="span3">  
				    <div class="well sidebar-nav"> 
<?php
echo '	
		
		<h1> Forgot Password? </h1>';
			
			echo '<font color =red>'.$message.'</font>';
			
			echo form::open('accounts/secret_question',array('method'=>'post'));
			echo 'Enter email <br/> '.form::input('txtemail');
			echo "<div style='position:relative; top:-33;height:0px;left:215'>";
			?><input type='submit' name='btnrecover' value='submit' class='btn btn-primary'><?php
			echo '</div>';
			echo form::close();
			
			echo "<div style='position:relative; top:-53;height:0px;left:290'>";
			echo form::open('mycardlist',array('method'=>'post'));
			?> <input type='submit' name='btnback' value='Back' class='btn btn-primary'><?php
			echo form::close();
			echo '</div>
		';
		
?>			</div>
		</div>	
	</div>		
	</body>
</html>	

<?php




