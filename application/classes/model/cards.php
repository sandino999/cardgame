<?php defined('SYSPATH') or die('No direct script access.');

class Model_cards extends Model_Database {
	
	public function get_list($id)
	{	
		$results=DB::select()->from('card_owning')->join('card_info')
		->on('card_owning.card_owning_name','=','card_info.card_name')
		->where('card_owning.account_owning_id','=',$id)->execute();
		
		return $results;	
	}
	
	public function get_card_info()
	{
	  $result = db::select()->from('card_info')->execute();
	  return $result;
	}
	
	public function check_card_owning($id)
	{	  
	  foreach($results as $check)
	  {
	    if($check['account_owning_id']==$id)
		{
		   return true;
		}
		else
		{
		  return false;
		}
	  }
	  
	}
		
	public function str_ascending($id)
	{
		$results=DB::select()->from('card_owning')->join('card_info')
		->on('card_owning.card_owning_name','=','card_info.card_name')
		->where('card_owning.account_owning_id','=',$id)->order_by('Strength','ASC')
		->execute();
	 
		return $results;
	}

	public function str_descending($id)
	{
		$results=DB::select()->from('card_owning')->join('card_info')
		->on('card_owning.card_owning_name','=','card_info.card_name')
		->where('card_owning.account_owning_id','=',$id)->order_by('Strength','DESC')
		->execute();
			
		return $results;
	}
	
	public function def_ascending($id)
	{
		$results=DB::select()->from('card_owning')->join('card_info')
		->on('card_owning.card_owning_name','=','card_info.card_name')
		->where('card_owning.account_owning_id','=',$id)->order_by('Defense','ASC')
		->execute();
	 
		return $results;
	}
	
	public function def_descending($id)
	{
		$results=DB::select()->from('card_owning')->join('card_info')
		->on('card_owning.card_owning_name','=','card_info.card_name')
		->where('card_owning.account_owning_id','=',$id)->order_by('Defense','DESC')
		->execute();
		
		return $results;
	}
	
	public function register($fname,$mname,$lname,$user,$pass,$retype,$secret,$ans,$contact,$addr,$email)
	{
		$usernamedb = $this->check_user_name_if_exists($user);  // function for checking if username exists
				
		if($fname == '' OR $mname =='' OR $lname == '' OR $user == '' OR $pass == '' OR $retype == '' 
		OR $secret  == '' OR $ans  == '' OR $contact  = '' OR $addr  = '' OR $email == '')  // if fields are missing
		{	
		?>
			<script>
				alert('Fill in missing fields');
			</script>
		<?php
			return false;
		}
		else if($pass!=$retype)   // if password is equal to retype password
		{
		?>
			<script>
				alert('Password does not match!');
			</script>
		<?php
			return false;
		}
		else if($usernamedb == $user)   //check if username exists
		{
		?>
			<script>
				alert('Username already exists in the database');
			</script>
		<?php
			return false;
		}
		else
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
			else
			{
			window.location='/cards/index.php/Register';
			}
			</script>
			<?php
		}	
	}
	
	public function check_user_name_if_exists($user)
	{
	  $query = db::select()->from('accounts')->execute();
	  
	  foreach($query as $row)
	  {
	    if($row['username']==$user)
		{
		  return $row['username'];
		}		
	  }  
	}
	
	public function login($username,$passwd)
	{
		
		if($username == ' ' OR $passwd == ' ')
		{
		  ?>
			<script>
				alert('Fill in missing fields');
			</script>
		  <?php
		  return false;
		}
		
		
		$query=db::select('*')->from('accounts')->execute();
		
		foreach($query as $result)
		{
		   if($username==$result['username'] AND $passwd==$result['password'])
		   {			   
			   return $result['account_id'];	
		   }
		   
		}
		
		?>  <script>
						alert('Invalid Username and Password');
						window.location='/cards/index.php/MyCardList';
					</script>
				<?php
		
	}
	
	public function recover($to)
	{
		if(valid::email($to))
		{
		  //$mail = email::factory()->subject('Email subject')
		  //->to($email)->from('no-reply@email.com','MyName')->message('hello')->send();
		  
		 // $mailer = email::connect();
		 
		   //$mail = email::compose()->to($to)->from('no-reply@mysite.com')
			//		->subject('Welcome')->send();
			
			
		 
		//	$subject = ' : Message to Leet Street';
		//	$from = array('Clarence', 'ratnaraju.java@gmail.com');
		//	email::send($email, $from , $subject, 'hi how r u Brother ');
	
			
		 
		}
		else
		{
		  ?>
		  <script>
			alert('Not a valid email');
		    window.location='/cards/index.php/recover';
		  </script>	  
		  <?php
		}
	}

} 
