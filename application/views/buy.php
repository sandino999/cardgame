<?php defined('SYSPATH') or die('No direct script access.');

echo '<h1> Card Store </h1>'; 

echo '<table border=1>';
echo ' <tr>
			<td align=center>
				Card Name
			</td >
			<td align=center>
				Strength
			</td>
			<td align=center>
				Defense
			</td>
			<td align=center>
				Skills
			</td>
			<td align=center> 
				Price
			</td>
	   </tr>';
foreach($card_info as $card_list)
{
    echo '<tr>';
    echo '<td>'.$card_list['card_name'].'</td>';
	echo '<td>'.$card_list['strength'].'</td>';
	echo '<td>'.$card_list['defense'].'</td>';
	echo '<td>'.$card_list['skills'].'</td>';
	echo '<td>'.$card_list['price'].'</td>';
	echo '</tr>';
}

echo '</table>';
  
 


