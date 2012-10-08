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
			else
			{
				return false;
			}
	  }
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
	
	public function register($fname,$mname,$lname,$user,$pass,$retype,$secret,$ans,$contact,$addr,$email)
	{
	 
		$usernamedb = $this->check_user_name_if_exists($user);  // function for checking if username exists
		$maildb = $this->check_if_email_exists($email);  // function for checking if email already exists
		
		if($fname == '' OR $mname =='' OR $lname == '' OR $user == '' OR $pass == '' OR $retype == '' 
		OR $secret  == '' OR $ans  == '' OR $contact  == '' OR $addr  == '' OR $email == '')  // if fields are missing
		{	
			$type=3;
			$this->message($type);
			
			return false;
		}
		else if($pass!=$retype)   // if password is not equal to retype password
		{
			$type=5;
			$this->message($type);
			
			return false;
		}
		else if($usernamedb == true)   //check if username exists
		{
			$type=6;
			$this->message($type);
			
			return false;
		}
		else if($maildb == true)		// check if email exists in the database
		{	
			$type=7;
			$this->message($type);
			
			return false;
		}
		else
		{
			?>
			<script type='text/javascript'>
			
			var answer = confirm('Register?');
		
			if(answer)
			{
			<?php
			
				DB::insert('accounts',array('username','password','secret_question','answer','firstname','middlename','surname','contact_no','address','email'))
				->values(array($user,MD5($pass),$secret,$ans,$fname,$mname,$lname,$contact,$addr,$email))->execute();
			?>
				alert('Record Added');
				window.location = '../mycardlist';
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
		$from ='sandino.dolosa@beenest-tech.com';
		$subject='Subject';	
		
		$id = $this->get_account_id($email);
		$server_name = $this->get_server_name();
		
		
		$link = $server_name.url::site().'accounts/change_password/'.$id;
		$message='Click the link to this account to reset your password: '.$link;
		
		$mailer = email::connect();
			
		email::send($to,$from,$subject,$message);	 

		$type=8;
		$this->message($type);
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
			$this->message($type);
			return false;
		}
		elseif($password == '' OR $new_password == '' )
		{
			$type=3;
			$this->message($type);
			return false;
		}
		else
		{
		
			DB::update('accounts')->set (array('password'=>md5($password)))
			->where('id','=',$id)->execute();
			
			$type=9;
			$this->message($type);
			
			return true;
		}
	}
	
	public function message($type)
	{
		switch($type)
		{
			case 1:
				echo '<font color =red>'.'Email does not exists'.'</font>';
				break;
				
			case 2:	
				echo '<font color =red>'.'Answer to secret question does not match in the database'.'</font>';
				break;
				
			case 3:	
				echo '<font color =red>'.'Fill in Missing Fields'.'</font>';
				break;
			
			case 4:
				echo '<font color =red>'.'Invalid Username and Password'.'</font>';
				break;
			
			case 5:
				echo '<font color =red>'.'Password does not match'.'</font>';
				break;
				
			case 6:
				echo '<font color =red>'.'Username already exists in the database'.'</font>';
				break;	
			
			case 7:
				echo '<font color =red>'.'Email already exists in the database'.'</font>';
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
		}
	}

} 
