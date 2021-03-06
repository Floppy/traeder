﻿<?php
/*
 * transaction.class.php
 *
 */

class Transaction
{

  public $id;
  public $code;
  public $amount;
  public $description;
  public $account_id;

	function __construct()
	{
		return true;
	}

	public static function create($acct, $amount, $pending, $code=null, $description='') {
	  // Make new object
	  $tr = new Transaction;
    // Generate shortcode
  	$characterList = "0123456789";
  	if ($code)
  	  $tr->code = $code;
	  else {
    	$tr->code = "";
    	do {
    		$tr->code .= $characterList[mt_rand(0,strlen($characterList) - 1)];
    	} while (strlen($tr->code) < 12);
  	}
  	// Store attributes
  	$tr->account_id = $acct->id;
  	$tr->amount = $amount;
  	$tr->status = $pending ? 0 : 1;
  	$tr->description = $description;
  	// Done
  	$tr->save();
  	return $tr;
	}

	public static function find($code) {
    // Fetch from DB
    global $db;
    $stmt = $db->prepare("SELECT transaction_id, amount, code, account_id, status, description FROM transactions WHERE code=?");
    $stmt->bind_param('s', $code);
    $stmt->execute();
    // Store attributes
    $tr = new Transaction();
    $stmt->bind_result($tr->id, $tr->amount,$tr->code,$tr->account_id,$tr->status, $tr->description);
    $stmt->fetch();
    $stmt->close();
    if($tr->id)
      return $tr;
    else
      return null;
	}

  function save() {
    global $db;
    if ($this->id) {
      $stmt = $db->prepare("UPDATE transactions SET amount=?, code=?, account_id=?, status=?, description=? WHERE transaction_id=?");
      $stmt->bind_param('dssisi', $this->amount, $this->code, $this->account_id, $this->status, $this->id);
      $stmt->execute();
      $stmt->close();
    }
    else {
      $stmt = $db->prepare("INSERT INTO transactions (amount, code, account_id, status,description) VALUES (?,?,?,?,?)");
      $stmt->bind_param('dssis', $this->amount, $this->code, $this->account_id, $this->status, $this->description);
      $stmt->execute();
      $stmt->close();
      $stmt = $db->prepare("SELECT LAST_INSERT_ID()");
      $stmt->execute();
      $stmt->bind_result($this->id);
      $stmt->fetch();
      $stmt->close();
    }
  }

  public function account() {
    return Account::findId($this->account_id);
  }

  public function accept($acct) {
    // Mark as no longer pending
    $this->status = 1;
    $this->save();
    // Create opposite transaction in client account
    return Transaction::create($acct, -$this->amount, false, $this->code);
  }

  function delete() {
    global $db;
    $stmt = $db->prepare("DELETE FROM transactions WHERE transaction_id=?");
    $stmt->bind_param('i', $this->id);
    $stmt->execute();
    $stmt->close();
  }

}