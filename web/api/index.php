<?php
/**
 * index.php which will do all the URL handling on the API
 */

  include ('../../lib/fitzgerald.php');
  require_once('../../lib/config.inc.php');
  require_once('../../lib/account.class.php');
  require_once('../../lib/transaction.class.php');
  require_once('../../lib/sms_helper.class.php');


  class TraederApi extends Fitzgerald {
    // Define your controller methods, remembering to return a value for the browser!
    function get_index()
    {
      return 'this is the home of the traeder-api';
    }

    function get_account($accountID)
    {
			// call account.class and return details
			$account = new Account();
			$data = $account->find($accountID);
			if (is_object($data))
			{
				$address = $data->address_1 ? $data->address_1."\n" : '';
				$address .= $data->address_2 ? $data->address_2."\n" : '';
				$address .= $data->address_3 ? $data->address_3."\n" : '';
    		$return = '['."\n";
	    	$return .= '{ID: "'.$data->id.'", name: "'.$data->name.'", address: "'.$address.'", balance: "'.$data->balance().'"}'."\n";
    		$return .= '  ]'."\n";
    	}
    	else
    	{
    		$return = '['."\n".'{status: "User not on file"}'."\n".']';
    	}
    	return $return;
    }

    function post_login()
    {
    	if (isset($_POST['username']) && isset($_POST['password']))
    	{
				$data = Account::authenticate($_POST['username'], $_POST['password']);
				if (is_object($data))
				{
					$return = '['."\n";
	    		$return .= '{ID: "'.$data->id.'", name: "'.$data->name.'", address: "'.$address.'", balance: "'.$data->balance().'"}'."\n";
    			$return .= '  ]'."\n";
					return $return;
				}
				else
				{
					return '{status:"not logged in"}';
				}
    	}
    }

    function create_account()
    {
    	$params = array();
    	foreach($_POST as $key => $value)
    	{
    		$params[$key] = $value;
    	}
    	$newuser = Account::create($params);
			if (is_object($newuser))
				return $this->get_account($newuser->name);
			else
				return '[ status: "'.$newuser.'"]';
    }

    function post_transaction()
    {
			return 'posted';
    }

    function get_transaction($issuecode)
    {
    	return 'view transaction: '.$issuecode;
    }

    function transaction_receive ()
    {
    	writelog("API says: receiving");
    	foreach ($_REQUEST as $key=>$value)
    	{
    		writelog($key . " => ".$value);
    	}
    	$sender = isset($_REQUEST['sender']) ? $_REQUEST['sender'] : '';
    	$content = isset($_REQUEST['content']) ? $_REQUEST['content'] : '';
    	$cmd = isset($_REQUEST['comments']) ? $_REQUEST['comments'] : '';
    	SMSHelper::handleCommand($cmd, $sender);
    }

   } // end Class

   $app = new TraederApi();

   // Define your url mappings. Take advantage of placeholders and regexes for safety.
   $app->get('/api/', 'get_index');
   // account-stuff
   $app->post('/account/api/create', 'create_account');
   $app->get('/account/api/:accountID', 'get_account');
   $app->post('/account/api/authenticate', 'post_login');
   // transaction stuff
   $app->get('/transaction/api/receive', 'transaction_receive');
   $app->post('/transaction/api/receive', 'transaction_receive');
   $app->post('/transaction/api/create', 'post_transaction');
   $app->get('/transaction/api/:issuecode', 'get_transaction');

   // let's get this started!
   $app->run();