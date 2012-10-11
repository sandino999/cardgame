<?php defined('SYSPATH') or die('No direct script access.');
include('header_main.php');	
?>

<html>
	<head>
		<title>
			Card View
		</title>
		<link href="<?php echo url::base(); ?>bootstrap/css/bootstrap.css" rel="stylesheet">
	</head>
	<body>
	
	<div style="position:relative; top:50;height:0px;left:0">	
		<div class="container-fluid">  	
			  <div class="row-fluid">
				  <div class="span 5">  
				    <div class="well sidebar-nav"> 
	
<?php

echo 'Welcome <font color=green>'.session::instance()->get('username').'</font><br/>';

echo '<h1> My Card List </h1>'; 

  
  echo form::open('buy');
  echo '<b> You have 0 cards in your account. Would you like to buy one? </b>';
  ?> <input type='submit' value='buy' class='btn btn-primary'> <?php
  echo form::close();

?>
					</div>
				</div>	
			</div>
		</div>	
	</div>
	</body>
</html>

<?php
