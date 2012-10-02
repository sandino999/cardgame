<?php defined('SYSPATH') or die('No direct script access.');

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

    echo $cards['CardName'];
	echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;Strength:'.$cards['Strength'];
	echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;Defense:'.$cards['Defense'];
	echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;Owning:'.$cards['Owning'];
	echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspSkills:'.$cards['Skills'];
	echo '<br/><br/>';
}