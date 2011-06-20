<?php
/* fetches the QR codes,
 * currently we use kaywa which is plain simple to use,
 * even without API-key
 */
require_once('config.inc.php');

class QRCode
{
	function __construct()
	{
		return true;
	}

	/* generates confirmation QR-codes
	   the SMS-mode creates an image containing the reply-sms
	   the URL version creates a URL which will display the transaction with a confirm button. This version will need the customer to log in to the service
	 */
	public function get_QR_image($mode, $code)
	{
		global $_GLOBALS;
		$local_cache = $_GLOBALS['qr_cache'].'/'.$mode.'/'.$code.'.png';
		$local_url = $_GLOBALS['qr_url'].'/'.$mode.'/'.$code.'.png';

		if ($mode == 'sms')
		{
			$url = $_GLOBALS['kaywa_url'].'&d=SMSTO%3A%2B447786200690%3ATRAEDER%20'.$code;
		}
		elseif ($mode == 'url')
		{
			$url = $_GLOBALS['kaywa_url'] .'&d=http%3A%2F%2Ftraeder.cooljapan.nl%2Ftransaction%2Fapi%2Fconfirm%2F'.$code;
		}
		if (!is_file($local_cache))
		{
			writelog('Fetching fresh QR-code');
			$local = QRCode::_cache_file($local_cache, $url);
		}
		return $local_url;
	}

	public function _cache_file($local_cache, $url)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$contents = curl_exec($ch);
		if ($contents)
		{
			$fp = fopen($local_cache, 'w');
			fputs($fp, $contents);
			fclose($fp);
			return true;
		}
		return false;
	}
}