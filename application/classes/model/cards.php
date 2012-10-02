<?php defined('SYSPATH') or die('No direct script access.');

class Model_cards extends Model_Database {
	
	public function get_list()
	{	
	$results=DB::select('*')->from('cardlist')->execute()->as_array();
	return $results;	
	}
	
	public function str_ascending()
	{
	 $results=DB::select('*')->from('cardlist')->order_by('Strength','ASC')
	 ->execute()->as_array();
	 return $results;
	}

	public function str_descending()
	{
	 $results=DB::select('*')->from('cardlist')->order_by('Strength','DESC')
	 ->execute()->as_array();
	 return $results;
	}
	
	public function def_ascending()
	{
	 $results=DB::select('*')->from('cardlist')->order_by('Defense','ASC')
	 ->execute()->as_array();
	 return $results;
	}
	
	public function def_descending()
	{
	 $results=DB::select('*')->from('cardlist')->order_by('Defense','DESC')
	 ->execute()->as_array();
	 return $results;
	}
	
	public function register($fname,$mname,$lname,$user,$pass,$contact,$addr,$email)
	{
	  	?>
		<script type='text/javascript'>
		
		var answer= confirm('Register?');
		
		if(answer)
		{
		<?php
			DB::insert('accounts',array('username','password','firstname','middlename','surname','contact_no','address','email'))
			->values(array($user,$pass,$fname,$mname,$lname,$contact,$addr,$email))->execute();
		?>
		alert('Record Added');
		window.location='/cards/index.php/MyCardList';
		}
		window.location='/cards/index.php/Register';
		</script>
		<?php
	}
	
	public function login($username,$passwd)
	{
		db::select('*')->from('accounts')->where('username','=',$username AND 'password','=',$passwd)->execute();
	}

} 
