<?php

require_once('config.inc.php');

class SMSHelper {
  
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
    $ch = curl_init($url);
    $result = curl_exec($ch);
    curl_close($ch);    
  }
  
}