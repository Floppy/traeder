<?php

require_once('test_helper.php');

class TransactionTest extends PHPUnit_Framework_TestCase
{
  
  public static $vendor;
  public static $client;

  static function setUpBeforeClass() {
    self::$vendor = Account::create(array("username" => "vendor",
                                    "password" => "testpass",
                                    "password_confirmation" => "testpass"));
    self::$client = Account::create(array("username" => "client",
                                    "password" => "testpass",
                                    "password_confirmation" => "testpass"));
  }
  
  function testTransactions() {
    // Create a transaction as the vendor
    $tr = Transaction::createPending(self::$vendor, 5.0);
    $this->assertEquals(strlen($tr->code), 12);
    $this->assertEquals($tr->status, 0);
    $this->assertEquals($tr->account_id, self::$vendor->id);
    $this->assertEquals($tr->amount, 5.0);
    $tr = Transaction::find($tr->code);
    $this->assertEquals(strlen($tr->code), 12);
    // Accept the transaction on behalf of the client
    //$tr->accept(self::$client);
    // Check both transactions are now NOT pending
    //$this->assertEquals($tr->status, 1);
    //$this->assertEquals($tr2->status, 1);
    // Check balances
    //$this->assertEquals($this->vendor->balance(), 47.0);
    //$this->assertEquals($this->client->balance(), 37.0);
  }

  static function tearDownAfterClass() {
    self::$vendor->delete;
    self::$client->delete;
  }

}