<?php defined('SYSPATH') or die('No direct script access.');

?>

<html>
	<head>
		<title>
			Card View
		</title>
		<link href="<?php echo url::base(); ?>bootstrap/css/bootstrap.css" rel="stylesheet">
	</head>
	<body>
	
<?php


echo 'Welcome <font color=green>'.session::instance()->get('username').'</font><br/>';
echo html::anchor('index.php/accounts/logout','[Logout]');

echo '<h1> My Card List </h1>'; 

  
  echo form::open('buy');
  echo '<b> You have 0 cards in your account. Would you like to buy one? </b>';
  echo form::submit('btnbuy','Buy');
  echo form::close();

?>

	</body>
</html>

<?php
