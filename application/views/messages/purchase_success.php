<?php defined('SYSPATH') or die('No direct script access.');

?>

<html>   
	<head>   
		<link href="<?php echo url::base(); ?>bootstrap/css/bootstrap.css" rel="stylesheet">
		<meta charset="utf-8">   
		<title>Register Success</title>   
		<meta name="description" content="Creating basic alerts with Twitter Bootstrap. Examples of alerts and errors with Twitter Bootstrap">   
		<link href="/twitter-bootstrap/twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">   
		<style type="text/css">  
		body {  
		padding: 50px;  
		}  
		</style>  
	</head>  
	<body>  
		<div class="container" style='position:relative; top:200;height:0px;left:210'>  
		<div class="row">  
		<div class="span4">  
		<div class="alert alert-success">  
		<a class="close" data-dismiss="alert"></a>  
		<strong>Purchase Success!</strong> Cards has been added in your Card List
		</div>  
		<input class='btn btn-primary' onclick="parent.location='../../accounts/user'" type='button' value='Click to Go to your Account'></input>
		</div>  
		</div>  
		</div>  
		
		<script src="twitter-bootstrap-v2/docs/assets/js/jquery.js"></script>  
		<script src="twitter-bootstrap-v2/docs/assets/js/bootstrap-alert.js"></script>  
	</body>  
</html> 

<?php











