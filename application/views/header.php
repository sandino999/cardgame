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
						<li class="active"><a href="<?php echo session::instance()->get('server').url::site(); ?>mycardlist">Home</a></li>  
						<li><a href="#about">About</a></li>  
						<li><a href="#contact">Contact</a></li>  
						
						</ul>  
				</div>
			</div>  
		</div>  
	</div> 
	 
	</body>
</html>


