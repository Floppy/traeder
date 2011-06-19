<?php

require_once('config.inc.php');

/*
 * account.php
 * Basic account information
 */

class Account {

  /* properties */
  public $id;
  public $name;
  public $address_1;
  public $address_2;
  public $address_3;
  protected $password;
  protected $salt;

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
	  // Done
	  return $acct;
	}

  static function authenticate($username, $password) {
    // Find by username
    $acct = Account::find($username);
    if($acct == null)
      return null;
    // Check password
    if ($acct->checkPassword($password) == false)
      return null;
    // OK
    return $acct;
  }

  static function find($username) {
    // Fetch from DB
    global $db;
    $stmt = $db->prepare("SELECT name, salt, password, account_id, address_1, address_2, address_3 FROM accounts WHERE name=?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    // Store attributes
    $acct = new Account();
    $stmt->bind_result($acct->name,$acct->salt,$acct->password,$acct->id,$acct->address_1,$acct->address_2,$acct->address_3);
    $stmt->fetch();
    $stmt->close();
    if($acct->id)
      return $acct;
    else
      return null;
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
    $this->password = $this->cryptPassword($plaintext);
  }

  function checkPassword($plaintext) {
    return ($this->password == $this->cryptPassword($plaintext));
  }

  function cryptPassword($plaintext) {
    return sha1($this->salt . $plaintext);
  }

  function id() {
    return $this->id;
  }

  function balance() {
    global $db;
    $stmt = $db->prepare("SELECT SUM(amount) FROM transactions WHERE account_id=? AND status=1");
    $stmt->bind_param('s', $this->id);
    $stmt->execute();
    $stmt->bind_result($this->balance);
    $stmt->fetch();
    $stmt->close();
    $this->balance += 42.0; // Opening balance - everyone gets 42 free kittens. This will do for now, it's a hackday!!
    $this->save();
    return $this->balance;
  }

  function save() {
    global $db;
    if ($this->id) {
      $stmt = $db->prepare("UPDATE accounts SET name=?, salt=?, password=? WHERE account_id=?");
      $stmt->bind_param('sssi', $this->name, $this->salt, $this->password, $this->id);
      $stmt->execute();
      $stmt->close();
    }
    else {
      $stmt = $db->prepare("INSERT INTO accounts (name, salt, password) VALUES (?,?,?)");
      $stmt->bind_param('sss', $this->name, $this->salt, $this->password);
      $stmt->execute();
      $stmt->close();
      $stmt = $db->prepare("SELECT LAST_INSERT_ID()");
      $stmt->execute();
      $stmt->bind_result($this->id);
      $stmt->fetch();
      $stmt->close();
    }
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
    global $db;
    $stmt = $db->prepare("DELETE FROM accounts WHERE account_id=?");
    $stmt->bind_param('i', $this->id);
    $stmt->execute();
    $stmt->close();
  }

}