<?php
# some configuration
$_GLOBALS['app_root']	 = substr(dirname(realpath(__FILE__)), 0, strlen(dirname(realpath(__FILE__))) - strlen('/lib'));
$_GLOBALS['kaywa_url'] = 'http://qrcode.kaywa.com/img.php?s=5';

require_once('config.local.php');
require_once('global_func.php');

$db = new mysqli($_GLOBALS['db_host'], $_GLOBALS['db_user'], $_GLOBALS['db_password'], $_GLOBALS['db_name']);
//mysqli_select_db();
if (! is_object($db))
{
	echo 'Sorry missing database';
	exit;
}
