<?php defined('SYSPATH') or die('No direct script access.');

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
<?php
		
		echo '<h1> Confirm Secret Question </h1>';
		
		echo '<font color =red>'.$message.'</font><br/>';
		foreach($secret as $row)
		{
		echo $row['question_name'];
		$email = $row['email'];
		}

		echo form::open('accounts/confirm_secret_question',array('method'=>'post'));
		echo form::input('txtsecret');
		echo "<div style='position:relative; top:-34;height:0px;left:210'>";
		echo form::submit('btnsecret','Submit');
		echo '</div>';
		echo form::hidden('email',$email);
		echo form::close();
		
		echo form::open('mycardlist',array('method'=>'post'));
		echo "<div style='position:relative; top:-54;height:0px;left:270'>";
		echo form::submit('btnback','back');
		echo '</div>';
		echo form::close();
?>
		</div>
	</body>
</html>
<?php




