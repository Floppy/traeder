﻿<?php

require_once('config.inc.php');

/*
 * account.php
 * Basic account information
 */

class Account {

  /* properties */
  protected $id;
  public $name;
  protected $password;
  protected $salt;
  public $balance = 1.00;

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
    $stmt = $db->prepare("SELECT name, salt, password, account_id FROM accounts WHERE name=?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    // Store attributes
    $acct = new Account();
    $stmt->bind_result($acct->name,$acct->salt,$acct->password,$acct->id);
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
    return $this->balance;
  }

  function save() {
    global $db;
    if ($id) {
      $stmt = $db->prepare("UPDATE accounts SET name=?, salt=?, password=? WHERE id=?");
      $stmt->bind_param('sssi', $this->name, $this->salt, $this->password, $this->id);
      $stmt->execute();
      $stmt->close();
    }
    else {
      $stmt = $db->prepare("INSERT INTO accounts (name, salt, password) VALUES (?,?,?)");
      $stmt->bind_param('sss', $this->name, $this->salt, $this->password);
      $stmt->execute();
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