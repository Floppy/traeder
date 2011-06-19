<?php
/*
 * transaction.class.php
 *
 */

class Transaction
{
  
  public $code;
  public $amount;
  protected $account_id;
  
	function __construct()
	{
		return true;
	}

	public function createPending($acct, $amount) {
	  // Make new object
	  $tr = new Transaction;
    // Generate shortcode
  	$characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  	$i = 0;
  	$tr->code = "";
  	do {
  		$tr->code .= $characterList{mt_rand(0,strlen($characterList))};
  		$i++;
  	} while ($i < 12);
  	// Store attributes
  	$tr->account_id = $acct->id;
  	$tr->amount = $amount;
  	$tr->status = 0; // pending
  	// Done
  	$tr->save();
  	return $tr;
	}

  function save() {
    global $db;
    if ($id) {
      $stmt = $db->prepare("UPDATE transactions SET amount=?, code=?, account_id=?, status=? WHERE id=?");
      $stmt->bind_param('dssii', $this->amount, $this->code, $this->account_id, $this->status, $this->id);
      $stmt->execute();
      $stmt->close();
    }
    else {
      $stmt = $db->prepare("INSERT INTO transactions (amount, code, account_id, status) VALUES (?,?,?,?)");
      $stmt->bind_param('dssi', $this->amount, $this->code, $this->account_id, $this->status);
      $stmt->execute();
      $stmt->close();
    }
  }
  
  public function delete() {
    
  }

}