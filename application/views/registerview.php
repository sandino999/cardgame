<?php defined('SYSPATH') or die('No direct script access.');
include('header.php');
?>

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
				  <div class="span4">  
				    <div class="well sidebar-nav"> 
			
			<h1> Fill in the necessary fields </h1>
			<font color='red'><span id='return_error'></span></font>
			<font color ='red'><?php echo $message ?></font>
			<form action='confirm' method='post' id='register'>
				First Name 	<input type='text' name='txtfname' id='fname'>
							<font color='red'><span id='return_fname'></span></font><br/>
				Middle Name <input type='text' name='txtmname' id='mname'>
							<font color='red'><span id='return_mname'></span></font><br/>
				Last Name 	<input type='text' name='txtlname' id='lname'>
							<font color='red'><span id='return_lname'></span></font><br/>
				username 	<input type='text' name='txtuser' id='username'>
							<font color='red'><span id='return_username'></span></font><br/>
				password 	<input type='password' name='txtpass' id='password'>
							<font color='red'><span id='return_password'></span></font><br/>
				retype password<input type='password' name='txtretype' id='retype'>
								<font color='red'><span id='return_retype'></span></font><br/>		
				secret question <select name='secret_question' id='select'>
									<option>
										What is your pet's name
									</option>
									<option>
										What was your childhood nickname?
									</option>
									<option>
										What is your oldest cousin's first and last name?
									</option>
									<option>
										In what city or town was your first job?
									</option>
									<option>
										What is the name of a college you applied to but didn't attend?
									</option>
									<option>
										Who was your childhood hero?
									</option>
									<option>
										What was your favorite sport in high school?
									</option>
									<option>
										What is your spouse's mother's maiden name?
									</option>
								</select>
							<br/>
				answer 	<input type='text' name='txtans' id='ans'>
						<font color='red'><span id='return_ans'></span></font><br/>	
				Contact No 	<input type='text' name='txtcontact' id='contact'>
							<font color='red'><span id='return_contact'></span></font><br/>
				Address <input type='text' name='txtaddr' id='addr'>
						<font color='red'><span id='return_addr'></span></font><br/>
				Email Address 	<input type='text' name='txtemail' id='email'>
								<font color='red'><span id='return_email'></span></font><br/>
				<input type='submit' value='Register' name='btnregistertodatabase' class='btn btn-primary' id='btnreg'>
			</form>
			
		<?php
			echo "<div style='position:relative; top:-50;left:85'>";
			echo form::open('mycardlist',array('method'=>'post'));
			?><input type='submit' value='Back' name='btnback' class='btn btn-primary' ><?php
			echo form::close();
			echo '</div>';
			

?>	
				</div>
			</div>
		</div>
	  <script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="<?php echo url::base() ?>bootstrap/js/validate.js"></script>
	</body>
</html>
<?php	

