<?php
/**
 * index.php which will do all the URL handling on the API
 */

  include ('../../lib/fitzgerald.php');

  class Application extends Fitzgerald {
    // Define your controller methods, remembering to return a value for the browser!
    function get_index() {
      return page('index');
    }
  }

  $app = new Application();


  // Define your url mappings. Take advantage of placeholders and regexes for safety.
  $app->get('/account/\?.*', 'get_account');
  $app->get('/account/create', 'create_account');

  $app->get('/api/transaction/:issuecode', 'get_transaction');



  $app->run();
