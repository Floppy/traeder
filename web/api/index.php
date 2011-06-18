<?php
/**
 * index.php which will do all the URL handling on the API
 */

  include ('../../lib/fitzgerald.php');

  class TraederApi extends Fitzgerald {
    // Define your controller methods, remembering to return a value for the browser!
    function get_index()
    {
      return 'this is the home of the traeder-api';
    }

    function get_account()
    {
    	return 'you want to view an account';
    }
  }

  $app = new TraederApi();


  // Define your url mappings. Take advantage of placeholders and regexes for safety.
  $app->get('/api/', 'get_index');
  $app->get('/account/\?.*', 'get_account');
  $app->get('/api/account/create', 'create_account');

  $app->get('/api/transaction/:issuecode', 'get_transaction');



  $app->run();
