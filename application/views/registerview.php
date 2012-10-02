<?php defined('SYSPATH') or die('No direct script access.');

echo "<h1> Fill in the necessary fields </h1>";

echo form::open('submit',array('method'=>'get'));
echo 'First Name '.form::input('txtfname').'<br/>';
echo 'Middle Name '.form::input('txtmname').'<br/>';
echo 'Last Name '.form::input('txtlname').'<br/>';
echo 'username '.form::input('txtuser').'<br/>';
echo 'password '.form::input('txtpass').'<br/>';
echo 'Contact No '.form::input('txtcontact').'<br/>';
echo 'Address '.form::input('txtaddr').'<br/>';
echo 'Email Address '.form::input('txtemail').'<br/>';
echo form::submit('btnreg','Register');


echo form::close();

