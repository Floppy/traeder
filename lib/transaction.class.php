<?php
/*
 * transaction.class.php
 *
 */

class Transaction
{
  
  public $id;
  public $code;
  public $amount;
  public $account_id;
  
	function __construct()
	{
		return true;
	}

	public static function create($acct, $amount, $pending, $code=null) {
	  // Make new object
	  $tr = new Transaction;
    // Generate shortcode
  	$characterList = "0123456789";
  	if ($code)
  	  $tr->code = $code;
	  else {
    	$tr->code = "";
    	do {
    		$tr->code .= $characterList[mt_rand(0,strlen($characterList))];
    	} while (strlen($tr->code) < 12);
  	}
  	// Store attributes
  	$tr->account_id = $acct->id;
  	$tr->amount = $amount;
  	$tr->status = $pending ? 0 : 1;
  	// Done
  	$tr->save();
  	return $tr;
	}
	
	public static function find($code) {
    // Fetch from DB
    global $db; 
    $stmt = $db->prepare("SELECT transaction_id, amount, code, account_id, status FROM transactions WHERE code=?");
    $stmt->bind_param('s', $code);
    $stmt->execute();
    // Store attributes
    $tr = new Transaction();
    $stmt->bind_result($tr->id, $tr->amount,$tr->code,$tr->account_id,$tr->status);
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
      $stmt = $db->prepare("UPDATE transactions SET amount=?, code=?, account_id=?, status=? WHERE transaction_id=?");
      $stmt->bind_param('dssii', $this->amount, $this->code, $this->account_id, $this->status, $this->id);
      $stmt->execute();
      $stmt->close();
    }
    else {
      $stmt = $db->prepare("INSERT INTO transactions (amount, code, account_id, status) VALUES (?,?,?,?)");
      $stmt->bind_param('dssi', $this->amount, $this->code, $this->account_id, $this->status);
      $stmt->execute();
      $stmt->close();
      $stmt = $db->prepare("SELECT LAST_INSERT_ID()");
      $stmt->execute();
      $stmt->bind_result($this->id);
      $stmt->fetch();
      $stmt->close();
    }
  }
  
  public function accept($acct) {
    // Mark as no longer pending
    $this->status = 1;
    $this->save();
    // Create opposite transaction in client account
    Transaction::create($acct, -$this->amount, false, $this->code);
    // Update balances on both accounts
  }

}