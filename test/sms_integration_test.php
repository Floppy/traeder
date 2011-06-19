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
$amt = fgets(STDIN);
$rcv_num = $vendor_num;
// Create a transaction as the vendor
$acct1 = Account::findPhone($rcv_num); 
$tr = Transaction::create($acct1, $amt, true);
// Send SMS code
SMSHelper::send(SMSHelper::smsUrl($tr));

// Get confirmation from client
printf("CLIENT: Enter transaction code to confirm\n");
$code = trim(fgets(STDIN));
$rcv_num = $client_num
$tr = Transaction::find($code);
// Accept the transaction on behalf of the client
$acct2 = Account::findPhone($rcv_num); 
$tr2 = $tr->accept($acct2);

// Confirm
SMSHelper::send(SMSHelper::smsUrl($tr));
SMSHelper::send(SMSHelper::smsUrl($tr2));