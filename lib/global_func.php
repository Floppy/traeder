<?php

function writelog($message)
{
	$fp = @fopen($_GLOBALE['logfile'], 'a+');
	if ($fp)
	{
		fputs($fp, strftime('%H:%M:$s ').$message."\n");
		fclose($fp);
	}
}