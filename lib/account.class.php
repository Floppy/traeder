<?php
/*
 * account.php
 * Basic account information
 */

class Account {

  /* properties */
  public $name;
  private $password;
  private $salt;
  public $balance;

	function __construct()
	{
		return true;
	}

	static function create($params)
	{
	  if ($params["password"] != $params["password_confirmation"]) {
	    return null;
	  }
	  // Create account
	  $acct = new Account;
	  // Store attributes
	  $acct->name = $params["username"];
	  $acct->storePassword($params["password"]);
	  // Save
	  $acct->save();
	  // Set up initial balance
	  $acct->balance = 42.0;
	  // Done
	  return $acct;
	}

  static function authenticate($username, $password) {
    return new Account();
  }

  static function find($username) {
    return new Account();
  }

  function storePassword($plaintext) {
    /* generate salt */
  	$characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  	$i = 0;
  	$this->salt = "";
  	do {
  		$this->salt .= $characterList{mt_rand(0,strlen($characterList))};
  		$i++;
  	} while ($i < 16);
    $this->password = sha1($this->salt . $plaintext);
  }

  function balance() {
    return $balance;
  }

  function save() {
    
  }

	function updateAccount($data)
	{

	}

	function addPhone($data)
	{

	}

	function updatePhone($data)
	{

	}

	function deletePhone($data)
	{

	}

  function delete() {
    
  }

}