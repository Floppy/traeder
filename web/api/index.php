<?php
/**
 * index.php which will do all the URL handling on the API
 */

  include ('../../lib/fitzgerald.php');
  require_once('../../lib/config.inc.php');
  require_once('../../lib/account.class.php');
  require_once('../../lib/transaction.class.php');


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
    		$return = '['."\n";

	    	$return .= '{ID: "'.$data->id.'",
  	  							 name: "'.$data->name.'",
    								 address: "'.$data->address_1."\n".$data->address_2."\n".$data->address_3.'",
    								 balance: "'.$data->balance().'}'."\n";
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
				$account = Account::authenticate($_POST['username'], $_POST['password']);
				if ($account) {
					return get_account($accountID);
				}
				else
				{
					return '{status:"not logged in"}';
				}
    	}
    }

    function create_account()
    {
    	print_r($_POST);
    	$params = array();
    	foreach($_POST as $key => $value)
    	{
    		$params[$key] = $value;
    	}
    	$newuser = Account::create($params);
    	print_r($newuser);
    }

    function post_transaction()
    {

    }

    function get_transaction($issuecode)
    {
    	return 'view transaction: '.$issuecode;
    }

  }

  $app = new TraederApi();


  // Define your url mappings. Take advantage of placeholders and regexes for safety.
  $app->get('/api/', 'get_index');
  //$app->get('/account/api/create', 'create_account');
  $app->post('/account/api/create', 'create_account');
  $app->get('/account/api/:accountID', 'get_account');
  $app->post('/account/api/authenticate', 'post_login');

	$app->post('/transaction/api/create', 'post_transaction');
  $app->get('/transaction/api/:issuecode', 'get_transaction');




  $app->run();
