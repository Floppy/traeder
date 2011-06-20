<?php
# some configuration
require_once('config.local.php');
require_once('global_func.php');

$db = new mysqli($_GLOBALS['db_host'], $_GLOBALS['db_user'], $_GLOBALS['db_password'], $_GLOBALS['db_name']);
//mysqli_select_db();
if (! is_object($db))
{
	echo 'Sorry missing database';
	exit;
}
