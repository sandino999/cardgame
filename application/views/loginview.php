<?php	include('header.php');	 ?>

<html>
	<head>
		<title>
			My Card List
		</title>
		<link href="<?php echo url::base(); ?>bootstrap/css/bootstrap.css" rel="stylesheet">		
	</head>	
	<body>	
	
	
	
		<div style='position:relative; top:250;height:0px;left:700'> 			
			<div class="container-fluid">  	
				<div class="row-fluid"> 
					<div class="span3">  
						<div class="well sidebar-nav"> 
							<h1> MyCardList Login </h1>
						
			
<?php	
	
		echo '<font color =red>'.$message.'</font>';
		echo form::open('accounts/login',array('method'=>'post'));
		echo 'Username: '.form::input('txtuser').'<br/>';
		echo 'Password: '.form::password('txtpass').'<br/>';
		?> 
		<input type='submit' name='btnlogin' value='Login' class='btn btn-primary'> <?php
		echo form::close();
	
		
		?><div style='position:relative; top:-50;height:0px;left:70'><?php
		echo form::open('accounts/register',array('method'=>'post'));
		?><input type='submit' name='btnregister' value='Register' class='btn btn-primary'> <?php	
		echo form::close();
		echo '</div>';
		
		echo "<div style='position:relative; top:-15;height:0px;left:0'>";
		echo html::anchor('index.php/accounts/forgot_password','Forgot password?');
		echo '</div>';
		
		
?>									
						</div>
					</div>
				</div>	
			</div>	
		</div>
	
	
		
	</body>
</html>








