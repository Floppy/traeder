<?php
/* fetches the QR codes,
 * currently we use kaywa which is plain simple to use,
 * even without API-key
 */

Class QRCode
{
	__construct()
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
		switch($mode)
		{
			case 'sms':
				// http://qrcode.kaywa.com/img.php?s=5&d=SMSTO%3A%2B447786200690%3ATRAEDER%20889113205868
				break;
			case 'url':
				// http://qrcode.kaywa.com/img.php?s=5&d=http%3A%2F%2Ftraeder.cooljapan.nl%2Ftransaction%2Fapi%2Fconfirm%2F889113205868
				break;
		}
	}
}