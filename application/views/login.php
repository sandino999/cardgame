<?php defined('SYSPATH') or die('No direct script access.');



echo '<h1> MyCardList Login </h1>';

echo form::open('submit',array('method'=>'post'));
echo 'Username: '.form::input('txtuser').'<br/>';
echo 'Password: '.form::password('txtpass').'<br/>';
echo form::submit('btnlogin','Login');
echo form::submit('btnregister','Register');
echo '<br/>'.html::anchor('index.php/recover','Forgot password?');
echo form::close();





