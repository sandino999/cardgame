<?php defined('SYSPATH') or die('No direct script access.');
include('header.php');
?>
<html>
	<head>
		<title>
			Secret Question
		</title>
		<link href="<?php echo url::base(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head>	
	<body>
		<div style="position:relative; top:200;height:0px;left:700"> 
			<div class="container-fluid">  	
			  <div class="row-fluid"> .
				  <div class="span3">  
				    <div class="well sidebar-nav"> 
<?php
		
		echo '<h1> Confirm Secret Question </h1>';
		
		echo '<font color =red>'.$message.'</font><br/>';
		foreach($secret as $row)
		{
			echo $row['question_name'];
			//$email = $row['email'];		// commented code: 10/15/12		
		}

		echo form::open('accounts/confirm_secret_question',array('method'=>'post'));
		echo form::input('txtsecret');
		echo "<div style='position:relative; top:-34;height:0px;left:215'>";
		?><input type='submit' name='btnsecret' value='submit' class='btn btn-primary'><?php
		echo '</div>';
		echo form::hidden('email',$email);
		echo form::close();
		
		echo form::open('mycardlist',array('method'=>'post'));
		echo "<div style='position:relative; top:-54;height:0px;left:290'>";
		?><input type='submit' name='btnback' value='back' class='btn btn-primary'><?php
		echo '</div>';
		echo form::close();
?>

				</div>
			</div>
		</div>
	</body>
</html>
<?php




