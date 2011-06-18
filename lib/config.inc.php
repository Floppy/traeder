<?php
# some configuration
$_GLOBALS['db_name'] = 'db96975_traeder';
$_GLOBALS['db_user'] = 'db96975_traeder';
$_GLOBALS['db_password'] = 'traeder1';
$_GLOBALS['db_host'] = 'localhost';


$db = new mysqli($_GLOBALS['db_host'], $_GLOBALS['db_user'], $_GLOBALS['db_password'], $_GLOBALS['db_name']);
//mysqli_select_db();
if (! is_object($db))
{
	echo 'Sorry missing database';
	exit;
}

