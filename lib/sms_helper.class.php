<?php

require_once('config.inc.php');

class SMSHelper {

  public static function handleCommand($command, $rcv_num) {
    $cmds = preg_split("/[\s,]+/", $command);
    if (strtolower($cmds[0]) == 'want') {
			writelog('handle-receive, sms helper');
      // Create a transaction as the vendor
      $acct = Account::findPhone($rcv_num);
      $tr = Transaction::create($acct, $cmds[1], true);
      // Send SMS code
      SMSHelper::send(SMSHelper::smsUrl($tr));
    }
    else {
			writelog('handle-confirm: '.$cmds[0]);
      $tr = Transaction::find($cmds[0]);
      if ($tr) {
        // Accept the transaction on behalf of the client
        $acct = Account::findPhone($rcv_num);
        $tr2 = $tr->accept($acct);
        // Confirm
        SMSHelper::send(SMSHelper::smsUrl($tr));
        SMSHelper::send(SMSHelper::smsUrl($tr2));
      }
    }
  }

  public static function smsUrl($tr) {
    global $_GLOBALS;
    if($tr->status == 0) {
      return "http://www.txtlocal.com/sendsmspost.php?" .
      "message=" . $_GLOBALS['txtlocal_id'] . "+" . $tr->code .
      "&uname=" . $_GLOBALS['txtlocal_user'] .
      "&pword=" . $_GLOBALS['txtlocal_pass'] .
      "&selectednums=" . $tr->account()->phone_number .
      "&from=" . $_GLOBALS['txtlocal_from'];
    }
    else {
      return "http://www.txtlocal.com/sendsmspost.php?" .
      "message=Transaction+ID+" . $tr->code . "+complete!" . //"+Balance:+" . $tr->account()->balance() .
      "&uname=" . $_GLOBALS['txtlocal_user'] .
      "&pword=" . $_GLOBALS['txtlocal_pass'] .
      "&selectednums=" . $tr->account()->phone_number .
      "&from=" . $_GLOBALS['txtlocal_from'];
    }
  }

  function send($url) {
    printf($url);
    $ch = curl_init($url);
    $result = curl_exec($ch);
    curl_close($ch);
  }

}
