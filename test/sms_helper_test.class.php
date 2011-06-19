<?php

require_once('test_helper.php');

class SMSHelperTest extends PHPUnit_Framework_TestCase
{

  public static $vendor;
  public static $client;

  static function setUpBeforeClass() {

    self::$vendor = Account::create(array(
      "username" => "vendor",
      "password" => "testpass",
      "password_confirmation" => "testpass",
      "phone_number" => "12345"));
    self::$client = Account::create(array(
      "username" => "client",
      "password" => "testpass",
      "password_confirmation" => "testpass",
      "phone_number" => "67890"));
  }

  function testSMSUrl() {
    // Create a transaction as the vendor
    $tr = Transaction::create(self::$vendor, 5.0, true);
    // Check that SMS URL is as expected
    $this->assertEquals(SMSHelper::smsUrl($tr),
      "http://www.txtlocal.com/sendsmspost.php?message=TRAEDER+".$tr->code."&uname=test@example.com&pword=pass&selectednums=12345&from=Traeder");
    $tr->delete();
  }

  function testSMSConfirmUrl() {
    // Create a confirmed transaction as the vendor
    //$tr = Transaction::create(self::$client, 5.0, false);
    // Check that SMS URL is as expected
    //$this->assertEquals(SMSHelper::smsUrl($tr),
    //  "http://www.txtlocal.com/sendsmspost.php?message=Transaction+ID+".$tr->code."+complete!&uname=test@example.com&pword=pass&selectednums=12345&from=Traeder");
    //$tr->delete();
  }

  static function tearDownAfterClass() {
    self::$vendor->delete;
    self::$client->delete;
  }

}