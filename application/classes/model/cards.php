<?php defined('SYSPATH') or die('No direct script access.');
   


class Model_cards extends Model_Database {
	
	public function get_list($id)
	{	
		$results=DB::select()->from('account_cards')->join('cards')
		->on('account_cards.card_owning_name','=','cards.card_name')
		->where('account_cards.account_owning_id','=',$id)->execute();
		
		return $results;	
	}
	
	public function get_cards()
	{
	  $result = db::select()->from('cards')->execute();
	  return $result;
	}
	
	public function check_card_owning($id)
	{
		$results = db::select()->from('account_cards')->execute();
	  
		foreach($results as $check)
		{
			if($check['account_owning_id']==$id)
			{
				return true;
			}
			
		}
		return false;
	}
		
	public function str_ascending($id)
	{
		$results=DB::select()->from('account_cards')->join('cards')
		->on('account_cards.card_owning_name','=','cards.card_name')
		->where('account_cards.account_owning_id','=',$id)->order_by('Strength','ASC')
		->execute();
	 
		return $results;
	}

	public function str_descending($id)
	{
		$results=DB::select()->from('account_cards')->join('cards')
		->on('account_cards.card_owning_name','=','cards.card_name')
		->where('account_cards.account_owning_id','=',$id)->order_by('Strength','DESC')
		->execute();
			
		return $results;
	}
	
	public function def_ascending($id)
	{
		$results=DB::select()->from('account_cards')->join('cards')
		->on('account_cards.card_owning_name','=','cards.card_name')
		->where('account_cards.account_owning_id','=',$id)->order_by('Defense','ASC')
		->execute();
	 
		return $results;
	}
	
	public function def_descending($id)
	{
		$results=DB::select()->from('account_cards')->join('cards')
		->on('account_cards.card_owning_name','=','cards.card_name')
		->where('account_cards.account_owning_id','=',$id)->order_by('Defense','DESC')
		->execute();
		
		return $results;
	}
	
	public function validate_register($fname,$mname,$lname,$user,$pass,$retype,$secret,$ans,$contact,$addr,$email)
	{
	 
		$usernamedb = $this->check_user_name_if_exists($user);  // function for checking if username exists
		$maildb = $this->validate_email($email);  // function for checking if email already exists
		
		if($fname == '' OR $mname =='' OR $lname == '' OR $user == '' OR $pass == '' OR $retype == '' 
		OR $secret  == '' OR $ans  == '' OR $contact  == '' OR $addr  == '' OR $email == '')  // if fields are missing
		{			
			$type=3;
			return  $this->message($type);	
		}
		else if($pass!=$retype)   // if password is not equal to retype password
		{
			$type=5;
			return $this->message($type);		
		}
		else if($usernamedb == true)   //check if username exists
		{
			$type=6;
			return $this->message($type);	
		}
		else if($maildb == true)		// check if email exists in the database
		{	
			$type=7;
			return $this->message($type);		
		}
		else
		{	
			return null;
		}	
	}
	
	public function register_to_db($fname,$mname,$lname,$user,$pass,$retype,$secret,$ans,$contact,$addr,$email)
	{		
		DB::insert('accounts',array('username','password','secret_question','answer','firstname','middlename','surname','contact_no','address','email'))
		->values(array($user,MD5($pass),$secret,$ans,$fname,$mname,$lname,$contact,$addr,$email))->execute();		
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
		$id = $this->confirm_username_password($username,$passwd);  //check if username and password match 
		
		if($username == '' OR $passwd == '')   // check if username and password is blank
		{
			$type=3;
			$this->message($type);
			return false;
		}
		else if($id > 0)	// compare variable id to zero, if greater than zero, means username and password match
		{
			return $id;
		}
		else				// else invalid usernae and password
		{
			$type=4;
			$this->message($type);
			
			return false;
		}		
	}
	
	public function get_error_message_for_login($username,$passwd)
	{
		$id = $this->confirm_username_password($username,$passwd);
		
		if($username == '' OR $passwd == '')   
		{
			$type=3;
			return $this->message($type);
			
		}
		else if($id > 0)	
		{
			return null;
		}
		else			
		{
			$type=4;
			return $this->message($type);		
		}	
		
	}
	
	public function confirm_username_password($user,$pass)
	{
		$query=db::select()->from('accounts')->execute();
		
		foreach($query as $result)
		{
		   if($user==$result['username'] AND md5($pass) == $result['password'])   // check if username and password match
		   {	
			   return $result['id'];	
		   }
		   
		}
	}
	
	public function send_password($email)
	{
		$to = $email;
		$from ='mycardlist.email@gmail.com';
		$subject='Password Reset';	
		
		$id = $this->get_account_id($email);
		$server_name = $this->get_server_name();
		
		
		$link = $server_name.url::site().'accounts/change_password/'.$id;
		$message='Click the link to this account to reset your password: '.$link;
		
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
	
	public function validate_email($email)
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
		->on('accounts.secret_question','=','secret_question.id')->where('email','=',$email)->execute();
	  
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
	
	public function get_account_id($email)
	{
		$query = db::select()->from('accounts')->where('email','=',$email)->execute();
		
		foreach($query as $row)
		{
		  return $row['id'];
		}
	}
	
	public function get_server_name()
	{
		$protocol = 'http';
		if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') 
		{
		$protocol = 'https';
		}
	
		$host = $_SERVER['HTTP_HOST'];
		$baseUrl = $protocol . '://' . $host;
		if (substr($baseUrl, -1)=='/') 
		{
			$baseUrl = substr($baseUrl, 0, strlen($baseUrl)-1);
		}
	
	return $baseUrl;
	}
	
	public function validate_new_password($password,$new_password,$id)
	{
		if($password != $new_password)
		{
			$type=5;
			return $this->message($type);
			
		}
		elseif($password == '' OR $new_password == '' )
		{
			$type=3;
			return $this->message($type);
		
		}
		else
		{
			return null;
		}
	}
	
	public function reset_password($id,$password)
	{
		DB::update('accounts')->set (array('password'=>md5($password)))
		->where('id','=',$id)->execute();
			
		$type=9;
		$this->message($type);
	}
	
	public function validate_id_if_logged($id)
	{
		if($id==null)
		{
		  return false;
		}
		else
		{
		  return true;
		}
	}
	
	public function buy_cards($card_name,$id)
	{
		$query = db::select()->from('account_cards')
		->where('account_owning_id','=',$id)->where('card_owning_name','=',$card_name)
		->execute();
				
		if(count($query)==0)	// check if there is query
		{
			db::insert('account_cards',array('account_owning_id','card_owning_name','owning'))
			->values(array($id,$card_name,1))->execute();	// add new type of card for the account
		}
		else
		{
			foreach($query as $row)
			{	
				$row['owning']++;		
				db::update('account_cards')->set(array('owning'=>$row['owning']))
				->where('account_owning_id','=',$id)->where('card_owning_name','=',$card_name)
				->execute();		// add + 1 card to previous card owning
			}
		}		
	}
	
	public function message($type)
	{
		switch($type)
		{
			case 1:
				return 'Email does not exists';
				break;
				
			case 2:	
				return 'Answer to secret question does not match in the database';
				break;
				
			case 3:	
				
				return 'Fill in Missing Fields';
				break;
			
			case 4:
				return 'Invalid Username and Password';
				break;
			
			case 5:
				return 'Password does not match';
				break;
				
			case 6:
				return 'Username already exists in the database';
				break;	
			
			case 7:
				return 'Email already exists in the database';
				break;	
				
			case 8:
				?>
					<script>
						alert('An mail is sent to your email address');
						window.location = '../mycardlist';
					</script>
				<?php
				break;	

			case 9:
				echo 'Password changed successfully, please sign in.';
				break;	

			case 10:
				return 'You are not logged in, please log in to continue';
				break;			
		}
	}

} 
