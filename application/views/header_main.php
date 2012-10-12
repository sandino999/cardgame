<?php defined('SYSPATH') or die('No direct script access.');

?>

<html>
	<head>
	</head>
	<body>

		<div class="navbar navbar-fixed-top">  
			<div class="navbar-inner">  
				<div class="container">  
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">  
					<span class="icon-bar"></span>  
					<span class="icon-bar"></span>  
					<span class="icon-bar"></span>  
					</a>  
			<!--	<a class="brand" href="#"><img src="" width="111" height="30" alt="w3resource logo" /></a>  -->
					<div class="nav-collapse">  
						<ul class="nav">  
												<li><a><?php echo 'Welcome <font color=blue>'.session::instance()->get('username'); ?></font></a></li>	
						<li><?php echo html::anchor('index.php/user','Home') ?></li>  
						<!--<li><a href="#about">Buy Cards</a></li>  -->
						<li><?php echo html::anchor('index.php/buy','Buy Cards') ?></li>
						<li><?php echo html::anchor('index.php/accounts/logout','Logout') ?></li> 
					
						</ul>  
				</div>
			</div>  
		</div>  
	</div> 
	 
	</body>
</html>


