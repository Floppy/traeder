<?php
# some configuration
$_GLOBALS['db_name'] = 'db96975_traeder';
$_GLOBALS['db_user'] = 'db96975_traeder';
$_GLOBALS['db_password'] = 'traeder1';
$_GLOBALS['db_host'] = 'localhost';


$db = mysql_connect($_GLOBALS['db_host'], $_GLOBALS['db_user'], $_GLOBALS['db_password']);
mysql_select_db($_GLOBALS['db_name']);
if (!$db)
{
	echo 'Sorry missing database';
	exit;
}

