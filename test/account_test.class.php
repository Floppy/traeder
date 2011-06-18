<?php

require_once('test_helper.php');

class StackTest extends PHPUnit_Framework_TestCase
{
  
  protected $backupGlobals = FALSE;
  
  /* Check we can't create new accounts if password isn't confirmed */
  public function testCreateAccountFail() {
    $acct = Account::create(array("username" => "test", 
                                  "password" => "testpass",
                                  "password_confirmation" => "wrong"));
    $this->assertNull($acct);
  }

  /* Check we can create new accounts with an opening balance */
  public function testCreateAccount() {
    $acct = Account::create(array("username" => "test", 
                                  "password" => "testpass",
                                  "password_confirmation" => "testpass"));
    $this->assertEquals("test", $acct->name);
    $this->assertEquals(42.0, $acct->balance());
  }

  /* Check we can find without authenticating */
  public function testFind() {
    $acct = Account::find("test");
    $this->assertEquals("test", $acct->name);
  }

  /* Check we can authenticate users */
  public function testAuthenticate() {
    $acct = Account::authenticate("test", "testpass");
    $this->assertEquals("test", $acct->name);
  }

  /* Check that bad authentication details are handled */
  public function testAuthenticationFailure() {
    $acct = Account::authenticate("test", "wrong");
    $this->assertNull($acct);
  }

  /* Check we can delete accounts */
  public function testDeleteAccount() {
    /*$acct = Account::find("test");
    $acct->delete();
    $acct = Account::find("test");
    $this->assertNull($acct);*/
  }
  
}