<?php defined('SYSPATH') or die('No direct script access.');

echo '<h1> Forgot Password? </h1>';

echo form::open('recover',array('method'=>'post'));
echo 'Enter email '.form::input('txtemail');
echo form::submit('btnrecover','Recover password');


echo form::button('btnback',html::anchor('index.php/mycardlist','back'));





