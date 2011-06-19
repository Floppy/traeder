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
  
  function testCreatePending() {
    $tr = Transaction::createPending($this->vendor, 5.0);
    $this->assertEquals(strlen($tr->code), 12);
    $this->assertEquals($tr->status, 0);
    $this->assertEquals($tr->amount, 5.0);
  }
  
  function testAccept() {
    //$tr2 = Transaction::find($tr->code);
    //$tr2->accept($this->client);
    // Check both transactions are now NOT pending
  }
  
  function testBalances() {
    //$this->assertEquals($this->vendor->balance(), 47.0);
    //$this->assertEquals($this->client->balance(), 37.0);
  }

  static function tearDownAfterClass() {
    self::$vendor->delete;
    self::$client->delete;
  }

}