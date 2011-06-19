<?php

require_once('test_helper.php');

$vendor_num = ''; //format: 447715xxxxxx
$client_num = '';

Account::create(array("username" => "vendor",
  "password" => "testpass",
  "password_confirmation" => "testpass",
  "phone_number" => $vendor_num));
Account::create(array("username" => "client",
  "password" => "testpass",
  "password_confirmation" => "testpass",
  "phone_number" => $client_num));

// Get a transaction request from the vendor
printf("VENDOR: Enter vendor request (e.g. WANT 5.0)\n");
$cmd = trim(fgets(STDIN));
SMSHelper::handleCommand($cmd, $vendor_num);

// Get confirmation from client
printf("CLIENT: Enter transaction code to confirm\n");
$cmd = trim(fgets(STDIN));
SMSHelper::handleCommand($cmd, $client_num);