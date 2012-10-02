<?php defined('SYSPATH') or die('No direct script access.');


echo '<h1> MyCardList Login </h1>';

echo form::open('submit',array('method'=>'get'));
echo 'Username: '.form::input('txtuser').'<br/>';
echo 'Password: '.form::input('txtpass').'<br/>';
echo form::submit('btnlogin','Login');
echo form::close();


echo html::anchor('/index.php/Register','Register');


