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
    	$return = '['."\n";

    	$return .= '{ID: "'.$account->id.'",
    							 name: "'.$account->name.'",
    							 address: "'.$account->address_1."\n".$account->address_2."\n".$account->address_3.'",
    							 balance: "'.$account->balance().'}'."\n";
    	$return .= '  ]'."\n";
    	return $return;
    }

    function post_login()
    {
    	if (isset($_POST['username']) && isset($_POST['password']))
    	{

    	}
    }

    function create_account()
    {
    	return 'you want to create a new account ';
    }

    function get_transaction($issuecode)
    {
    	return 'view transaction: '.$issuecode;
    }

  }

  $app = new TraederApi();


  // Define your url mappings. Take advantage of placeholders and regexes for safety.
  $app->get('/api/', 'get_index');
  $app->get('/account/api/create', 'create_account');
  $app->get('/account/api/:accountID', 'get_account');
  $app->post('/account/authenticate/', 'post_login');


  $app->get('/transaction/api/:issuecode', 'get_transaction');



  $app->run();
