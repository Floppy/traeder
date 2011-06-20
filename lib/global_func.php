<?php

function writelog($message)
{
	global $_GLOBALS;
	$fp = fopen($_GLOBALS['logfile'], 'a+');
	if ($fp)
	{
		fputs($fp, strftime('%H:%M:%S ').$message."\n");
		fclose($fp);
	}
}