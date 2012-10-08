<?php defined('SYSPATH') or die('No direct script access.');

?>

<html>
	<body>

<?php

	echo html::anchor('index.php/mycardlist','[Logout]');

	echo form::open('submit',array('method'=>'post'));
	echo form::submit('btnbuy','Buy Cards');
	echo form::close();

		echo '<h1> My Card List </h1>'; 

		echo form::open('sort',array('method'=>'get'));

		echo form::select('select_sort',array(
				 '0'=>' ',
				 '1'=>'Strength Asc',
				 '2'=>'Strength Desc',
				 '3'=>'Defense Asc',
				 '4'=>'Defense Desc')
			 );
		 
		echo form::submit('btnsort','Sort');				 

		echo '<br/><br/>';				 	

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



