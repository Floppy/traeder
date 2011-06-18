<?php
/*
 * account.php
 * Basic account information
 */

class Account {

  /* properties */
  public $name;

	function __construct()
	{
		return true;
	}

	function createAccount($data)
	{

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

  static function findByUserAndPassword($username, $password) {
    return new Account();
  }

  static function findByUser($username) {
    return new Account();
  }

}