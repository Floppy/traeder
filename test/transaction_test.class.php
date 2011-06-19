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
                                    "phone_number" => "12345"));
    self::$client = Account::create(array("username" => "client",
                                    "password" => "testpass",
                                    "password_confirmation" => "testpass",
                                    "phone_number" => "67890"));
  }
  
  function testTransactions() {
    // Create a transaction as the vendor
    $tr = Transaction::create(self::$vendor, 5.0, true);
    $this->assertEquals($tr->account(), self::$vendor);
    $this->assertEquals(strlen($tr->code), 12);
    $this->assertEquals($tr->status, 0);
    $this->assertEquals($tr->account_id, self::$vendor->id);
    $this->assertEquals($tr->amount, 5.0);
    $tr = Transaction::find($tr->code);
    $this->assertEquals(strlen($tr->code), 12);
    // Accept the transaction on behalf of the client
    $tr->accept(self::$client);
    // Check balances are updated OK
    $this->assertEquals(self::$vendor->balance(), 47.0);
    $this->assertEquals(self::$client->balance(), 37.0);
  }

  static function tearDownAfterClass() {
    self::$vendor->delete;
    self::$client->delete;
  }

}