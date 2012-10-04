<?php defined('SYSPATH') or die('No direct script access.');

echo '<h1> Forgot Password? </h1>';

echo form::open('forgot',array('method'=>'post'));
echo 'Enter email '.form::input('txtemail');
echo form::submit('btnrecover','Submit');

echo form::button('btnback',html::anchor('index.php/mycardlist','back'));






