<?php

require_once('test_helper.php');

class StackTest extends PHPUnit_Framework_TestCase
{
    
  /* Check we can't create new accounts if password isn't confirmed */
  public function testCreateAccountFail() {
    $acct = Account::create(array("username" => "test", 
                                  "password" => "testpass",
                                  "password_confirmation" => "wrong"));
    $this->assertNull($acct);
  }

  /* Check we can create new accounts */
  public function testCreateAccount() {
    $acct = Account::create(array("username" => "test", 
                                  "password" => "testpass",
                                  "password_confirmation" => "testpass"));
    $this->assertEquals("test", $acct->name);
  }

  /* Check we can authenticate users */
  public function testFindByUserAndPassword() {
    $acct = Account::findByUserAndPassword("test", "testpass");
    $this->assertEquals("test", $acct->name);
  }

  /* Check that bad authentication details are handled */
  public function testFindByUserAndBadPassword() {
    $acct = Account::findByUserAndPassword("test", "wrong");
    $this->assertNull($acct);
  }
  
  /* Check we can find without authenticating */
  public function testFindById() {
    $acct = Account::findByUser("test");
    $this->assertEquals("test", $acct->name);    
  }

  /* Check we can delete accounts */
  public function testDeleteAccount() {
    $acct = Account::findByUser("test");
    $acct->delete();
    $acct = Account::findByUser("test");
    $this->assertNull($acct);
  }
  
}