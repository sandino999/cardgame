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
					</div>
				</div>	
			</div>
		</div>	
	</div>
	</body>
</html>	

 <?php