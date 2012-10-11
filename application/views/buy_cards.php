<?php defined('SYSPATH') or die('No direct script access.');
	include('header_main.php');	
?>
<html>
	<head>
		<title>
			Buy Cards
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
			?> <td><input type='button' onclick="location.href='buy/choose_cards/<?php echo $card_list['card_name']; ?>'" class='btn btn-primary' value='buy'></td>	<?php			
			echo '</tr>';
		}
		
		echo '</table>';	
				
?>		
					</div>
				</div>	
			</div>
		</div>	
	</div>
	</body>
</html>
