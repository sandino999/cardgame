<?php defined('SYSPATH') or die('No direct script access.');

echo '<h1> My Card List </h1>'; 

  
  echo form::open('submit');
  echo '<b> You have 0 cards in your account. Would you like to buy one? </b>';
  echo form::submit('btnbuy','Buy');
  echo form::close();

