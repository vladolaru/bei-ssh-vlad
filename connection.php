<?php
require 'vendor/autoload.php';

use Medoo\Medoo;

$database = new Medoo([
	'database_type' => 'mysql',
	'database_name' => 'ssh_main',
	'server' => 'localhost',
	'username' => 'root',
	'password' => 'root',
	'port' => '4002'
]);