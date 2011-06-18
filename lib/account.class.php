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

	static function create($params)
	{
	  if ($params["password"] != $params["password_confirmation"]) {
	    return null;
	  }
	  return new Account;
	}

  static function findByUserAndPassword($username, $password) {
    return new Account();
  }

  static function findByUser($username) {
    return new Account();
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