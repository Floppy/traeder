<?php
/**
 * index.php which will do all the URL handling on the API
 */

  include ('../../lib/fitzgerald.php');
  require_once('../../lib/config.inc.php');

  class TraederApi extends Fitzgerald {
    // Define your controller methods, remembering to return a value for the browser!
    function get_index()
    {
      return 'this is the home of the traeder-api';
    }

    function get_account($accountID)
    {
    	return 'you want to view an account '.$accountID;
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


  $app->get('/transaction/api/:issuecode', 'get_transaction');



  $app->run();
