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
	  $results = db::select()->from('card_owning')->execute();
	  
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
		$maildb = $this->check_if_email_exists($email);  // function for checking if email already exists
		
		if($fname == '' OR $mname =='' OR $lname == '' OR $user == '' OR $pass == '' OR $retype == '' 
		OR $secret  == '' OR $ans  == '' OR $contact  == '' OR $addr  == '' OR $email == '')  // if fields are missing
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
		else if($usernamedb == true)   //check if username exists
		{
		?>
			<script>
				alert('Username already exists in the database');
			</script>
		<?php
			return false;
		}
		else if($maildb == true)
		{
		?>
			<script>
				alert('email already exists in the database');
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
			
				DB::insert('accounts',array('username','password','secret_question','answer','firstname','middlename','surname','contact_no','address','email'))
				->values(array($user,$pass,$secret,$ans,$fname,$mname,$lname,$contact,$addr,$email))->execute();
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
		  return true;
		}		
	  }  
	}
	
	public function login($username,$passwd)
	{
		
		if($username == '' OR $passwd == '')   // check if username and password is blank
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
		   if($username==$result['username'] AND $passwd==$result['password'])   // check if username and password match
		   {	
			?>
				<script>	
					alert('You are now logged on');
				</script>
			<?php
			   return $result['account_id'];	
		   }
		   
		}
		
		?>  <script>
						alert('Invalid Username and Password');
						window.location='/cards/index.php/MyCardList';
					</script>
				<?php
		
	}
	
	public function send_password($email)
	{
		$to = $email;
		$from ='sandino.dolosa@beenest-tech.com';
		$subject='Subject';	
		$password = $this->get_password($email);
		$message='This is your password for your account: '.$password;
		
		$mailer = email::connect();
			
		email::send($to,$from,$subject,$message);	  			
	}
	
	public function get_password($email)
	{
		$query=db::select()->from('accounts')->where('email','=',$email)->execute();
		
		foreach($query as $row)
		{
			return $row['password'];
		}
	}
	
	public function check_if_email_exists($email)
	{
	  $query = db::select()->from('accounts')->execute(); 
	  foreach($query as $row)
	  {
		if($row['email'] == $email)
		{
		   return true;
		} 
	  }
	}
	
	public function get_secret_question($email)
	{
      $query=db::select('*','question_name')->from('accounts')->join('secret_question')
	  ->on('accounts.secret_question','=','secret_question.question_id')->where('email','=',$email)->execute();
	  return $query; 
	}
	
	public function confirm_secret_question_ans($ans,$email)
	{
		$query = db::select()->from('accounts')->where('email','=',$email)->execute();
		
		foreach($query as $row)
		{
			if($row['answer']== $ans)
			{ 
			  return true;
			}
		}
		
		return false;
	}

} 
