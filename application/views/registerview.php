

<html>
	<head>
		<title>
			Register 
		</title>
		<link href="<?php echo url::base(); ?>bootstrap/css/bootstrap.css" rel="stylesheet">
	</head>
	<body>
		<div style="position:relative; top:200;height:0px;left:700">
			<div class="container-fluid">  	
			  <div class="row-fluid"> .
				  <div class="span3">  
				    <div class="well sidebar-nav"> 
<?php
			
			echo "	<h1> Fill in the necessary fields </h1>";
			echo '<font color =red>'.$message.'</font>';
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
			?><input type='submit' value='Register' name='btnregistertodatabase' class='btn btn-primary' ><?php
			echo form::close();
		
			echo "<div style='position:relative; top:-50;left:85'>";
			echo form::open('mycardlist',array('method'=>'post'));
			?><input type='submit' value='Back' name='btnback' class='btn btn-primary' ><?php
			echo form::close();
			echo '</div>';
			

?>	
				</div>
			</div>
		</div>
	</body>
</html>
<?php	

