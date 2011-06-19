<?php

require_once('test_helper.php');

class TransactionTest extends PHPUnit_Framework_TestCase
{
  
  public static $vendor;
  public static $client;

  static function setUpBeforeClass() {
    self::$vendor = Account::create(array("username" => "vendor",
                                    "password" => "testpass",
                                    "password_confirmation" => "testpass",
                                    "phone_number" => "447507140643"));
    self::$client = Account::create(array("username" => "client",
                                    "password" => "testpass",
                                    "password_confirmation" => "testpass",
                                    "phone_number" => "67890"));
  }
  
  function testTransactions() {
    // Get a transaction request from the vendor
    $rcv_num = 
    // Create a transaction as the vendor
    $tr = Transaction::create(self::$vendor, 5.0, true);
    // Send code back to vendor
    SMSHelper::send(SMSHelper::smsUrl($tr));
    // Receive code from client

    $tr2 = Transaction::find($tr->code);
    // Accept the transaction on behalf of the client
    $tr2->accept(self::$client);
    // Check balances are updated OK
    $this->assertEquals(self::$vendor->balance(), 47.0);
    $this->assertEquals(self::$client->balance(), 37.0);
  }

  static function tearDownAfterClass() {
    self::$vendor->delete;
    self::$client->delete;
  }

}