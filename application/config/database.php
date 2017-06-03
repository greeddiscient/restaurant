<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

mysql://bd19b211e7f6a8:42d64e75@us-cdbr-iron-east-03.cleardb.net/heroku_4b8db98f9951299?reconnect=true

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'us-cdbr-iron-east-03.cleardb.net',
	'username' => 'bd19b211e7f6a8',
	'password' => '42d64e75',
	'database' => 'heroku_4b8db98f9951299',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => TRUE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
