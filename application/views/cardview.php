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

	echo form::open('buy',array('method'=>'post'));
	echo form::submit('btnbuy','Buy Cards');
	echo form::close();

		echo '<h1> My Card List </h1>'; 

		echo form::open('sort',array('method'=>'get'));

		 echo form::select('select_sort',array(
				 ''=>' ',
				 'Str Asc'=>'Strength Asc',
				 'Str Desc'=>'Strength Desc',
				 'Def Asc'=>'Defense Asc',
				 'Def Desc'=>'Defense Desc')
			 );
		
		echo "<div style='position:relative; top:-38;height:0px;left:230'>";
		echo form::submit('btnsort','Sort');				
		echo '<br/><br/>';
		echo '</div>';		

		foreach($card_list as $cards) 
		{  
			echo $cards['card_name'];
			echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;Strength:'.$cards['strength'];
			echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;Defense:'.$cards['defense'];
			echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;Owning:'.$cards['owning'];
			echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspSkills:'.$cards['skills'];
			echo '<br/><br/>';
		} 
 
 
 ?>
	</body>
</html>	

 <?php



